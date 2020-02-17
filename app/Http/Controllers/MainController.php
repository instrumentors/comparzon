<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

  use Goutte;
  use Symfony\Component\DomCrawler\Crawler;



class MainController extends Controller
{
    //

    public function getProducts(Request $request)
    {
    	$step=0;
    	if($request->input("search")!=null)
    	{
    		if($request->input("step")!=null)
    			$step = $request->input("step");
	    	
	    	return ($this->fetchProductsBySearchQuery($request->input("search"),$step));
	    }	
	    else
	    	return("not working");

    }

    public function getCurlResponse($url)
    {
    	$user_agent_list = array(
    'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36',
    'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36',
    'Mozilla/5.0 (Windows NT 5.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36',
    'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36',
    'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36',
    'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36',
    'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
    'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
    'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36',
    'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36',
    'Mozilla/4.0 (compatible; MSIE 9.0; Windows NT 6.1)',
    'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko',
    'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0)',
    'Mozilla/5.0 (Windows NT 6.1; Trident/7.0; rv:11.0) like Gecko',
    'Mozilla/5.0 (Windows NT 6.2; WOW64; Trident/7.0; rv:11.0) like Gecko',
    'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',
    'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)',
    'Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; rv:11.0) like Gecko',
    'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)',
    'Mozilla/5.0 (Windows NT 6.1; Win64; x64; Trident/7.0; rv:11.0) like Gecko',
    'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0)',
    'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)',
    'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)'
);
    	$useragentIndex = rand(0, count($user_agent_list)-1);
    	$config['useragent'] = $user_agent_list[$useragentIndex];
    	
    	 $curl=curl_init();
		curl_setopt($curl, CURLOPT_USERAGENT, $config['useragent']);
		curl_setopt($curl, CURLOPT_REFERER, 'https://www.amazon.com/');
		$dir = dirname(__FILE__);
		$config['cookie_file'] = $dir . '/cookies/' . md5($_SERVER['REMOTE_ADDR']) . '.txt';

		curl_setopt($curl, CURLOPT_COOKIEFILE, $config['cookie_file']);
		curl_setopt($curl, CURLOPT_COOKIEJAR, $config['cookie_file']);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_ENCODING, '');

		curl_setopt($curl, CURLOPT_URL, $url); 
		
		
		$result = curl_exec($curl); 
		
  		return $result;


    }

    
    public function debug($str)
    {
    	if(is_array($str))
    	{
    		echo("<pre>");
    		print_r($str);
    		echo("</pre>");
    	}
    	else{
    		echo($str);
    	}
    	echo("<hr>");
    }


    public function fetchProductsBySearchQuery($search_query,$step=0)
    {
    	Global $product_data;
	    		$product_data=array();

    	$countries_array=array(
    		array("ae"=>array("https://www.amazon.ae",0.27)),
    		array("gb"=>array("https://www.amazon.co.uk",1.31)),
    		array("us"=>array("https://www.amazon.com",1)),
    		array("ca"=>array("https://www.amazon.ca",0.77)),
    	);

    	$countries_array=array(
    		array("ae"=>array("https://www.amazon.ae",0.27)),
    		array("gb"=>array("https://www.amazon.co.uk",1.31)),
    		array("us"=>array("https://www.amazon.com",1)),
    		
    	);

    	$countries_array=array(
    		"ae"=>array("https://www.amazon.ae",0.27),
    		"gb"=>array("https://www.amazon.co.uk",1.31),
    		"us"=>array("https://www.amazon.com",1),
    		
    	);
    	

    	/*
    	$countries_array_chosen=array();
    	$arrindex=0;
    	//echo("here".count($countries_array).$step);
    	if($step<count($countries_array))
    	{

    		
    		$countries_array_chosen = $countries_array[$step];
    	}
    	*/
    	
    	//print(count($countries_array_chosen));


    	//if(count($countries_array_chosen)==0)
    	//	return array("no results");


    	//foreach($countries_array_chosen as $country_data1=>$country_url1)	
    	foreach($countries_array as $country_data1=>$country_url1)	
	    {

	    		Global $multiplier;

	    		Global $country_data;
	    		Global $country_url;

	    		
	    		
	    		$country_url=$country_url1;
	    		$multiplier = $country_url[1];
	    		$country_data = $country_data1;
	    		$prod_url=$country_url[0]."/s?k=".urlencode($search_query);
	    		
				$crawler =  new Crawler($this->getCurlResponse($prod_url));
				

				$crawler->filter('.s-result-item')->each(function ($node)
				//$res=$crawler->filter('.s-result-item');
				//foreach($res as $node)
				{	
					
				
					global $multiplier;
	    			global $product_data;
	    			global $country_data;
	    			global $country_url;
					

					$price="";
					$price_symbol="";
					$price_fraction="";
					$link="";
					$rating = "1 out of 5";

					$asin = "";
					 $title = trim($node->filter('h2')->text());
					 
					 $img = ($node->filter('img')->attr("src"));
					
					

					if($node->filter(".a-price-whole")->count() !== 0)
						$price  = $node->filter(".a-price-whole")->text();

					if($node->filter(".a-price-symbol")->count() !== 0)
						$price_symbol  = $node->filter(".a-price-symbol")->text();

					if($node->filter(".a-link-normal")->count() !== 0)
						$link = $node->filter(".a-link-normal")->attr("href");

					if($node->filter(".a-icon-star-small")->count() !== 0)
						$rating = $node->filter(".a-icon-star-small")->text();
					
					
					if(strlen($rating)>2)
					{
						
						$ratingarr = explode(" ",$rating);
						$rating = $ratingarr[0];
						
					}			
					$price=str_replace(",", "", $price);
					$price=str_replace(".", "", $price);


					$asin_arr = array();
					preg_match('/(?:dp|o|gp|-|dp\/product|gp\/product)\/(B[0-9]{2}[0-9A-Z]{7}|[0-9]{9}(?:X|[0-9]))/', $link, $asin_arr);
					
					if(count($asin_arr)>1)
						$asin = $asin_arr[1];

					if(strlen($title)>90)
						$title=substr($title,0,90)."..";

					
					if(count($asin_arr)>1 && $price>0)
					{
						$product_data[$asin]["title"]=$title;
						$product_data[$asin]["asin"]=$asin;
						$product_data[$asin]["img"]=$img;

						$product_data[$asin]["countryID"]=$country_data;

						$product_data[$asin]["country"][$country_data]["seller"]="not fetched";

						$product_data[$asin]["country"][$country_data]["price"]=$price;


						$price_dollar=round((float)$price*$multiplier,2);

						$product_data[$asin]["country"][$country_data]["price_dollar"]=$price_dollar;

						$product_data[$asin]["country"][$country_data]["rating"]=$rating;
						$product_data[$asin]["country"][$country_data]["currency"]=$price_symbol;
						$product_data[$asin]["country"][$country_data]["baseurl"]=$country_url[0];
						$product_data[$asin]["country"][$country_data]["link"]=$link;

						
						//$this->debug($product_data);
						
					}	
				}); 		
	    	}

	    	return json_encode($product_data);

    }

    public function showSearch(Request $request)
    {

    	return view("search");
    }


    public function showSearchList(Request $request)
    {
    	$results = array("sa");
    	//return response()->json('{"as","ad","ab"}');
    	if($request->input("query")!=null)
    		return $this->getAmazonResponse($request->input("query"));


    }

    public function showSearchBySlug($product_slug)
    {


    	$product_data = $this->fetchProductsBySearchQuery($product_slug);

    	return view("search",compact('product_data'));
    }

//https://docs.developer.amazonservices.com/en_US/dev_guide/DG_Endpoints.html

    public function getAmazonResponse($query)
    {
    	$market_ids=array(

    	"UAE"=>array("A2VIGQ35RCS4UG","https://completion.amazon.co.uk/api/2017/suggestions"),
    	"UK"=>array("A1F83G8C2ARO7P","https://completion.amazon.co.uk/api/2017/suggestions"),
    	"IN"=>array("A21TJRUUN4KGV","https://completion.amazon.co.uk/api/2017/suggestions"),
    	"US"=>array("ATVPDKIKX0DER","https://completion.amazon.com/api/2017/suggestions"),
    	"CA"=>array("A2EUQ1WTGCTBG2","https://completion.amazon.com/api/2017/suggestions"),


    );

    	


    	$countries_array = array("UAE");

    	$results =  array();
    	foreach($countries_array as $country)
    	{
	    	
	    	$mid = trim($market_ids[$country][0]);
	    	$baseurl=$market_ids[$country][1];

	    	$url=urldecode($baseurl."?mid=".$mid."&prefix=".$query."&limit=20&alias=aps&b2b=0");
	    	//echo($url);
			$json = json_decode(file_get_contents($url));

			if(isset($json->suggestions))
			{
				
				foreach($json->suggestions as $suggestion)
				{
					array_push($results,$suggestion->value);
				}
			}
		}
		return ($results);
		
    }//end of getAmazonResponse


    public function getSellersFromAmazon($asin1,$country_data)
    {
    	GLOBAL $baseurl;
    	GLOBAL $asin;

    	$asin=$asin1;

    	$baseurl="https://www.amazon.ae";

    	

    	$country_data= trim($country_data);

    	$countries_array=array(
    		"ae"=>array("https://www.amazon.ae",0.27),
    		"gb"=>array("https://www.amazon.co.uk",1.31),
    		"us"=>array("https://www.amazon.com",1),
    		"ca"=>array("https://www.amazon.ca",1),    		
    	);
    	$baseurl=$countries_array[$country_data][0];

    	

    	$url = $baseurl.'/gp/offer-listing/'.$asin."/";
		$array = get_headers($url);
		$string = $array[0];

		GLOBAL $sellerarray;

		$sellerarray=array();
		if(strpos($string,"200"))
		{
			
			$crawler =  new Crawler($this->getCurlResponse($url));
			$crawler->filter('.olpOffer')->each(function ($node)
			{
				global $sellerarray;
				$sellerlink="";
				$offerPrice = $node->filter('.olpOfferPrice')->text();
				$condition = $node->filter(".olpCondition")->text();
				$sellerID="";

				if($node->filter('.olpSellerName')->filter("a")->count() !== 0)
				{
					global $baseurl;
					global $asin;

					$sellerlink = $node->filter('.olpSellerName')->filter("a")->attr("href");
					//$sellerlink_array = explode("&", $sellerlink);

					parse_str($sellerlink , $output);

					
					if(isset($output["seller"]))
					{
						$sellerID=$output["seller"];
						$prod_url=$baseurl."/gp/product/".$asin."/?smid=".$sellerID;
					}
				}	

				if(strlen($sellerID)>0)
				{
					$prod_url_link = "<a href='".$prod_url."' target='_new'>check</a>";
					//$this->debug($offerPrice." | ".$condition." | ".$prod_url_link);

					
					array_push($sellerarray,array($offerPrice,$condition,$prod_url));
					//$this->debug($prod_url);


				}		
			});

		}
		
			return json_encode($sellerarray);

    }//end of fucntion getSellersFromAmazon


    public function AmazonMarketPlaceCard()
    {
    	return view("test");

    }


}




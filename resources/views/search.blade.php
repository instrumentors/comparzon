<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Search products</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.3/css/flag-icon.css" integrity="sha256-jrNAqq4Gy0Gg2b6G6l0n57dPr6N1twCn+JMqY8x3l88=" crossorigin="anonymous" />


  
  

  <link rel="stylesheet" href="/stylesheets/style.css">

  <meta name="csrf-token" content="{{ csrf_token() }}">


 <style>

  
/* Style the search field */
form.searchform input[type=text] {
  padding: 10px;
  font-size: 17px;
  
  float: left;
  width: 70%;
  background: #ffffff;
  color:#2B4A4E;
  font-weight: 800;
}

/* Style the submit button */
form.searchform button {
  float: left;
  width: 10%;
  padding: 10px;
  background: #F9EE63;
  color: black;
  font-size: 17px;
  
  
  cursor: pointer;
}

form.searchform button:hover {
  background: #F9EE63;
}

/* Clear floats */
form.searchform::after {
  content: "";
  clear: both;
  display: table;
}


 </style>
</head>
<body>
@php
$search_q="";
@endphp


@if(isset($search_query)) 
  <?php
  $search_q=$search_query;
  ?>
@endif

<script>    
    var query_data = '';
  </script>

@if(isset($product_data))
  

  <script>    
    var query_data = <?=$product_data?>;
  </script>

@endif

<div class="container-fluid">
    
    <div class="row" style="background-color: #2B4A4E; color: #ffffff;padding:30px;">
        <div class="col-12" style="margin:auto;text-align: center;">
          <a href="/"><img src="/logo.png" style="width:30%;min-width:300px;"/></a>
          <h3>Find the best prices on Amazon</h3><br></div>
          <div class="col-2"></div>
        <div class="col-10">
          <form class="searchform" id="form_product_Search" method="get">
            @csrf
            <div id="custom-search-input">
                <div class="input-group">
                

                    <input type="text" autocomplete="off" name="search" data-provide="typeahead" id="search" maxlength="250" value="{{$search_q}}">
                    <button id="search_products"><i class="fa fa-search"></i></button>


                </div>

            </div>
            </form>
        </div>
    </div>

<div class="fixed-bottom" id="watchlist_button" style="display: none">
    <button type="button" class="btn btn-success" style="background-color: #E25212;" onclick="showWatchist();"><span class="glyphicon glyphicon-star" ></span> Watchlist <span class="badge badge-light" id="watchlist_notification_number">0</span></button>
</div>



<div class="fixed-bottom" id="back_to_search_button" style="display: none">
    <button type="button" class="btn btn-info" onclick="showWatchist();">
    Back to search 
    </button>
</div>


    



   </div>
    
    @if(isset($product_data11))
        <?php


        echo("<pre>");
          print_r($product_data);
          echo("</pre>");

        foreach($product_data as $asin => $prod_data)  
        {
          echo("<pre>");
          print_r($prod_data);
          echo("</pre>");
        }

        ?>
     @endif   
<div class="container" style="padding:20px;">


<div id="watchlistmain" style="display: none">
  <h3>Watchlist</h3>
  
    <div id="watchlist" class="row">
      watchlist
    </div>

</div>

<div id="typingtext" class="align-items-center" style="width:100%;text-shadow: 2px;text-align: center;">
  <h1>
  <a href="" class="typewrite" data-period="1000" data-type='[ "Please hold on..", "We are cooking something awesome to help you..", "Do try the watchlist to easily identify what you want.." ]' style="text-decoration: none;color:#dc3545;">
    <span class="wrap" styte="color:#dc3545;"></span>
  </a>
  </h1>
</div>



<div id="results" style="margin:auto;">


      
<h2> How to find the best prices for your products </h2>

<ul>
<li>Search for a product by its name</li>
<li>Add the selected ones to your watch list</li>
<li>Now visually compare which listing or which country offers you the best prices and start saving up</li>
<li>Please note : kjashj ashjdas asdhgajs asads</li>

</ul>



    
</div><!--end of results-->


<div id="watchlistmain" style="">
  <h3>Watchlist</h3>
  
    <div id="watchlist" class="row"><div class="col-4"><div><div class="card row"><img class="bd-placeholder-img card-img-top" width="100%" height="180" src="https://m.media-amazon.com/images/I/81KWXzZ2iOL._AC_UL320_ML3_.jpg" preserveaspectratio="xMidYMid slice" role="img"><div class="card-body"><h5 class="card-title">Samsung Original Galaxy Note 10+ Clear View Cover Case - Blue</h5></div><ul class="list-group"><li class="list-group-item" style="border:0px;background: #FFF8E2;margin: 5px;color:#000;border:dotted 1px;"><div class="media"><span class="flag-icon flag-icon-ae flag-icon-squared" style="margin:8px;width:24px;height:24px;"></span><div class="media-body mb-0 small lh-125"><div class="d-flex justify-content-between align-items-center w-100"><div><strong class="text-gray-dark">AED159</strong><br><span class="d-block">$42.93</span></div><i class="fa fa-star" aria-hidden="true" style="color:#FFA500;"><span style="color:black">4.5</span></i><a href="https://www.amazon.ae/Samsung-EF-ZN975C-Note-Clear-Cover/dp/B07VC4QKNN/ref=sr_1_18?keywords=samsung+note+10+plus&amp;qid=1579949451&amp;sr=8-18"><button class="btn" style="background: #FEBD6A;"><span class="isvg loaded"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>shopping-cart</title><path d="M11 21c0-0.552-0.225-1.053-0.586-1.414s-0.862-0.586-1.414-0.586-1.053 0.225-1.414 0.586-0.586 0.862-0.586 1.414 0.225 1.053 0.586 1.414 0.862 0.586 1.414 0.586 1.053-0.225 1.414-0.586 0.586-0.862 0.586-1.414zM22 21c0-0.552-0.225-1.053-0.586-1.414s-0.862-0.586-1.414-0.586-1.053 0.225-1.414 0.586-0.586 0.862-0.586 1.414 0.225 1.053 0.586 1.414 0.862 0.586 1.414 0.586 1.053-0.225 1.414-0.586 0.586-0.862 0.586-1.414zM7.221 7h14.57l-1.371 7.191c-0.046 0.228-0.166 0.425-0.332 0.568-0.18 0.156-0.413 0.246-0.688 0.241h-9.734c-0.232 0.003-0.451-0.071-0.626-0.203-0.19-0.143-0.329-0.351-0.379-0.603zM1 2h3.18l0.848 4.239c0.108 0.437 0.502 0.761 0.972 0.761h1.221l-0.4-2h-0.821c-0.552 0-1 0.448-1 1 0 0.053 0.004 0.105 0.012 0.155 0.004 0.028 0.010 0.057 0.017 0.084l1.671 8.347c0.149 0.751 0.569 1.383 1.14 1.811 0.521 0.392 1.17 0.613 1.854 0.603h9.706c0.748 0.015 1.455-0.261 1.995-0.727 0.494-0.426 0.848-1.013 0.985-1.683l1.602-8.402c0.103-0.543-0.252-1.066-0.795-1.17-0.065-0.013-0.13-0.019-0.187-0.018h-16.18l-0.84-4.196c-0.094-0.462-0.497-0.804-0.98-0.804h-4c-0.552 0-1 0.448-1 1s0.448 1 1 1z"></path></svg></span></button></a></div><span class="d-block"></span></div></div></li><li>AED 159.00</li><li>AED 155.20</li><li class="list-group-item" style="border:0px;background: #FFF8E2;margin: 5px;color:#000;border:dotted 1px;"><div class="media"><span class="flag-icon flag-icon-gb flag-icon-squared" style="margin:8px;width:24px;height:24px;"></span><div class="media-body mb-0 small lh-125"><div class="d-flex justify-content-between align-items-center w-100"><div><strong class="text-gray-dark">£36</strong><br><span class="d-block">$47.16</span></div><i class="fa fa-star" aria-hidden="true" style="color:#FFA500;"><span style="color:black">4.5</span></i><a href="https://www.amazon.co.uk/Samsung-Original-Galaxy-Clear-Cover-Blue/dp/B07VC4QKNN/ref=sr_1_17?keywords=samsung+note+10+plus&amp;qid=1579949452&amp;sr=8-17"><button class="btn" style="background: #FEBD6A;"><span class="isvg loaded"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>shopping-cart</title><path d="M11 21c0-0.552-0.225-1.053-0.586-1.414s-0.862-0.586-1.414-0.586-1.053 0.225-1.414 0.586-0.586 0.862-0.586 1.414 0.225 1.053 0.586 1.414 0.862 0.586 1.414 0.586 1.053-0.225 1.414-0.586 0.586-0.862 0.586-1.414zM22 21c0-0.552-0.225-1.053-0.586-1.414s-0.862-0.586-1.414-0.586-1.053 0.225-1.414 0.586-0.586 0.862-0.586 1.414 0.225 1.053 0.586 1.414 0.862 0.586 1.414 0.586 1.053-0.225 1.414-0.586 0.586-0.862 0.586-1.414zM7.221 7h14.57l-1.371 7.191c-0.046 0.228-0.166 0.425-0.332 0.568-0.18 0.156-0.413 0.246-0.688 0.241h-9.734c-0.232 0.003-0.451-0.071-0.626-0.203-0.19-0.143-0.329-0.351-0.379-0.603zM1 2h3.18l0.848 4.239c0.108 0.437 0.502 0.761 0.972 0.761h1.221l-0.4-2h-0.821c-0.552 0-1 0.448-1 1 0 0.053 0.004 0.105 0.012 0.155 0.004 0.028 0.010 0.057 0.017 0.084l1.671 8.347c0.149 0.751 0.569 1.383 1.14 1.811 0.521 0.392 1.17 0.613 1.854 0.603h9.706c0.748 0.015 1.455-0.261 1.995-0.727 0.494-0.426 0.848-1.013 0.985-1.683l1.602-8.402c0.103-0.543-0.252-1.066-0.795-1.17-0.065-0.013-0.13-0.019-0.187-0.018h-16.18l-0.84-4.196c-0.094-0.462-0.497-0.804-0.98-0.804h-4c-0.552 0-1 0.448-1 1s0.448 1 1 1z"></path></svg></span></button></a></div><span class="d-block"></span></div></div></li><li>£36.25</li><li>£48.34</li><li>£42.00</li><li>£49.99</li></ul></div></div></div></div>

</div>



   

  </div>



 
<script type="text/javascript">

    var searchdata;
    var watchlist=[];


    var route = "{{ url('autocomplete') }}";
    $('#search').typeahead({
        
        minLength: 3,
        source:  function (query, process) {
        return $.get(route,{ query: query }, function (data) {
                console.log(data);
                
                //$('#results').html(data);
                return process(data);
                
            });
        },
        limit: 20
    });


$(document).ready(function(){

    var cart=[];

    var cartname_local="comparizon_00";

    


$('#search_products').click(function(e){
   e.preventDefault();
   /*Ajax Request Header setup*/
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

   var search_text=$('#search').val();
   if(search_text.length>=3)
   {
     var html=prepareLoadingData();
      $('#results').html(html);
      fetchResults(0,search_text);
   
    }
   
   });


  if(query_data!='')
    {

      //console.log(query_data);
      
      searchdata = query_data;
      loadPageFromResponse();
    }

});


    function fetchResults(step,search_text)
    {
      $.ajax({
      url: "/searchapi",
      method: 'get',
      data: $('#form_product_Search').serialize(),
      data: { 
        step: step, 
        search: search_text
     },
      success: function(response){

        $('#typingtext').hide();
         searchdata = $.parseJSON(response);
        loadPageFromResponse();
        /*if(step<2)
        {
          step++;
          fetchResults(step,search_text);
         //--------------------------
        }
        */
      },
      error:function(){

      }
      });
    }


    function loadPageFromResponse()
    {

            var prodHtml = '<div class="row">';
            $.each(searchdata, function(i){
              console.log(i);
              prodHtml+=prepareProductCard(searchdata[i],false);
            });
            prodHtml+="</div>";


            $('#results').html(prodHtml);
    }


    function loadWatchListPageFromResponse()
    {

            var prodHtml = '<div class="row">';
            $.each(watchlist, function(i){
              console.log(i);
              prodHtml+=prepareProductCard(watchlist[i],true);
             
            });
            prodHtml+="</div>";

            
            $('#watchlist').html(prodHtml);
    }


    function prepareLoadingData()
    {
      startTyping();
      var html='<div class="row">';
      for(i=0;i<12;i++)
      {

          html+= '<div class="col-lg-3 col-md-3 mb-4">';
            html+= '<div class="card">';
          html+= '<img class="bd-placeholder-img card-img-top" width="100%" height="180" src="/placeholder.jpg" preserveAspectRatio="xMidYMid slice" role="img">';


              html+= '<div class="card-body">';

              html+= '<div class="align-items-center">';
              html+= '<strong>Loading...</strong>';
              html+= '<div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>';
              html+= '</div>';

              
              html+= '</div>';
            html+= '</div>';
          html+= '</div>';

      }
      html+="</div>";

      return html;
    }




  function prepareProductCard(data,isWatchList)
  {
      var html="";
      var asin_string="'"+data['asin']+"'";

      html+= '<div class="col-lg-4 col-md-4 mb-4 sm-3">';
      html+= '<div class="card">';

html+= '<img class="bd-placeholder-img card-img-top" width="100%" height="180" src="'+data['img']+'" preserveAspectRatio="xMidYMid slice" role="img">';
html+= '<div class="card-body">';
html+= '<h5 class="card-title">'+data['title']+'</h5>';
if(!isWatchList)
{
html+= '<button class="btn btn-info" style="background-color:#09A19F;color:#ffffff;" onclick="addtowatchlist('+asin_string+');"><span class="isvg loaded"><i class="fa fa-star"> </i></span><span> Add to watchlist</span></button>';
}

html+= '</div>';
html+= '<ul class="list-group">';
$.each(data['country'], function(i){
html+= '<li class="list-group-item" style="border:0px;background: #FFF8E2;margin: 5px;color:#000;border:dotted 1px;">';
html+= '<div class="media">';
html+= '<span class="flag-icon flag-icon-'+i+' flag-icon-squared" style="margin:8px;width:24px;height:24px;"></span>';
html+= '<div class="media-body mb-0 small lh-125">';
html+= '<div class="d-flex justify-content-between align-items-center w-100">';
html+= '<div><strong class="text-gray-dark">'+data['country'][i]['currency']+data['country'][i]['price']+'</strong>';
html+= '<br><span class="d-block">$'+data['country'][i]["price_dollar"]+'</span>';
html+= '</div>';
html+= '<i class="fa fa-star" aria-hidden="true" style="color:#FFA500;"><span style="color:black">'+data['country'][i]["rating"]+'</span></i>';
html+= '<a href="'+data['country'][i]['baseurl']+data['country'][i]['link']+'"><button class="btn" style="background: #FEBD6A;"><span class="isvg loaded"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>shopping-cart</title><path d="M11 21c0-0.552-0.225-1.053-0.586-1.414s-0.862-0.586-1.414-0.586-1.053 0.225-1.414 0.586-0.586 0.862-0.586 1.414 0.225 1.053 0.586 1.414 0.862 0.586 1.414 0.586 1.053-0.225 1.414-0.586 0.586-0.862 0.586-1.414zM22 21c0-0.552-0.225-1.053-0.586-1.414s-0.862-0.586-1.414-0.586-1.053 0.225-1.414 0.586-0.586 0.862-0.586 1.414 0.225 1.053 0.586 1.414 0.862 0.586 1.414 0.586 1.053-0.225 1.414-0.586 0.586-0.862 0.586-1.414zM7.221 7h14.57l-1.371 7.191c-0.046 0.228-0.166 0.425-0.332 0.568-0.18 0.156-0.413 0.246-0.688 0.241h-9.734c-0.232 0.003-0.451-0.071-0.626-0.203-0.19-0.143-0.329-0.351-0.379-0.603zM1 2h3.18l0.848 4.239c0.108 0.437 0.502 0.761 0.972 0.761h1.221l-0.4-2h-0.821c-0.552 0-1 0.448-1 1 0 0.053 0.004 0.105 0.012 0.155 0.004 0.028 0.010 0.057 0.017 0.084l1.671 8.347c0.149 0.751 0.569 1.383 1.14 1.811 0.521 0.392 1.17 0.613 1.854 0.603h9.706c0.748 0.015 1.455-0.261 1.995-0.727 0.494-0.426 0.848-1.013 0.985-1.683l1.602-8.402c0.103-0.543-0.252-1.066-0.795-1.17-0.065-0.013-0.13-0.019-0.187-0.018h-16.18l-0.84-4.196c-0.094-0.462-0.497-0.804-0.98-0.804h-4c-0.552 0-1 0.448-1 1s0.448 1 1 1z"></path>\</svg></span></button></a></div>';
html+= '<span class="d-block"></span>';
html+= '</div>';
html+= '</div>';
html+= '</li>';

 if(Array.isArray(data['country'][i]["seller"]))
 {
    $.each(data['country'][i]["seller"], function(j){
          html+= '<li>'+data['country'][i]["seller"][j][0]+'</li>';
    });
 } 

});
html+= '</ul>';
html+= '</div>';
html+= '</div>';

      return html;
  } 

 


  function saveCartToLocal(cartdata)
  {
      console.log("json data");
      //console.log(JSON.stringify(cartdata));

      localStorage.setItem(cartname_local,JSON.stringify(cartdata));

  }

  function getCartFromLocal()
  {
      cartdata=JSON.parse(localStorage.getItem(cartname_local));
      return (cartdata);
  }


  function showWatchist()
  {
      $('#watchlistmain').toggle();
      $('#results').toggle();
      loadWatchListPageFromResponse();
      if($('#watchlistmain').is(":visible"))
      {
          $('#watchlist_button').hide();
          $('#back_to_search_button').show();  

          //console.log(watchlist);  
      }
      else
      {

          $('#watchlist_button').show();
          $('#back_to_search_button').hide(); 
      }

  }


  function addSellerstoWatchList(asin)
  {

      var index=0;
      var isASINAdded = false;
      var country_data;

      

      $.each(watchlist, function(i){

        $.each(watchlist[i]["country"], function(j){
        var country_data=j;
      if(watchlist[i]["country"][country_data]["seller"]=="not fetched")
      {
        
      $.ajax({
      url: "/sellers/"+asin+"/"+country_data,
      method: 'get',
      
      success: function(response){

       
         sellerdata = $.parseJSON(response);
         watchlist[i]["country"][country_data]["seller"]=sellerdata;
         console.log("added to index"+i+" -- " +country_data);
      },
      error:function(){

      }
      });

      }

    });

    });

  }
  

  function addtowatchlist(asin)
  {
    //alert(asin);


    //var prodHtml=prepareProductCard(searchdata[asin]);

    
    if(watchlist.length==0)
    {

      $('#watchlist_button').toggle();


    }

    watchlist.push(searchdata[asin]);
    addSellerstoWatchList(asin);
    

    $('#watchlist_notification_number').html(watchlist.length);

  }





  var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 1000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 150 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };



    function startTyping() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
        
    };


    function stopTyping()
    {

    }


    function setDataFromQuery(resultsArray)
    {
      searchdata =  resultsArray;
      
    }

</script>
   
</body>
</html>
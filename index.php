<?php require_once 'product-link/process.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Barlow:600|Rasa:300,500" rel="stylesheet">
        <link href="main.css" rel="stylesheet">
        <link href="product-link/product-style.css" rel="stylesheet">
        <title>Bili na | Homepage</title>
        
<!--    my pallete
        #000000 - black
        #FFFFFF
        #D9E3DA
        #A7BEA9  darkestgray -->
        <style>
            
            header {
                background:  url(images/hero-bg.jpg) no-repeat;
                background-size: cover;
                background-position: center;
                height: 400px;
                overflow: hidden;
            }
            
            .hero {
                padding: 1rem 1.5rem;
                height: 100%;
                display: flex;
                flex-flow: column;
            }
            
            h1 {
                color: #ffffff;
                font-size: 20vw;
                margin-top: -4vw;
                text-align: left;
            }
            h3{
                color: #ffffff;
                font-size: 4.5vw;
                text-align: left;
                letter-spacing: 0.2rem;
                margin-top: 2rem;
                margin-left: 1vw;
            }
            
            .buttons {
                margin-top: 1rem;
                display: flex;
                flex-flow: row;
            }
            
            .buttons a {
                text-decoration: none;
            }
            
            h6{
                cursor: pointer;
            }
            
            
            .story {
                text-align: center;
                background-color: #d9e3da;
                color: #152620;
                padding: 0.5rem 3vw;
                margin: 0.5rem 0rem;
                transition: ease-in-out 350ms;
            }
            
            .story:hover,
            .shop:hover{
                background-color:#025928;
                color: #ffffff;
            }
            
            .shop {
                text-align: center;
                background-color:#66ff66;
                color: #152620;
                padding: 0.5rem 3vw;
                margin: 0.5rem 0.1rem;
                transition: ease-in-out 350ms;
            }
            

            .container {
                background-color:#ffffff;
                padding: 1rem 1rem;
                margin-top: 2vw;
                
            }
            
            #listContainer {
                width: 100%;
                height: auto;
            }
            
            
            .panel-body {
                margin: 1rem 0;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(110px, 110px));
                grid-gap: 0.5rem;
                align-items: center;
                padding: 0rem 0rem;
            }
            
            .panel-body div {
                border: rgba(0,0,0,0.2) solid 1px;
                min-height: 200px;
                min-width: 110px;
                max-height: 200px;
                max-width: 110px;
                border-radius: 0.5rem;
                display: flex;
            }
            
            .panel-body div:hover {
                box-shadow: 1px 3px 5px 3px rgba(0,0,0,0.2);
            }
            
            .panel-body img {
                position: relative;
                width: 100%;
                position: relative; 
                overflow: hidden;
                border-radius: 0.5rem 0.5rem 0 0;
            }
            
            .panel-body h5 {
                text-transform: none;
                text-align: center;
                font-size: 0.8rem;
                width: 100%;
            }
            
            .panel-body a{
                text-decoration: none;
                color: #333333;
                position: relative;
                width: 100%;
                height: auto;
                border-radius: 0.5rem 0.5rem 0 0;
            }
           
            .panel h6 {
                margin-left: 1vw;
            }
            
            
            @media only screen and (min-width: 600px) {
                
                .panel-body div {
                    border: rgba(0,0,0,0.1) solid 1px;
                    min-height: 300px;
                    min-width: 210px;
                    max-height: 300px;
                    max-width: 210px;
                    border-radius: 0.5rem;
                }    
                
                .panel-body {
                grid-template-columns: repeat(auto-fit, minmax(210px, 210px));
                }
                .panel-body h5 {
                font-size: 1rem; 
                }
                
                
                .buttons {
                    flex-direction: row;
                    margin-left: 1vw;
                    margin-top: -3vw;
                }
                .shop, 
                .story {
                    width: 8rem;
                    padding: 1rem 1rem;
                    margin: 0.5rem 0.5rem;
                    letter-spacing: 0.2rem;
                    font-weight: 900;
                }
                
                h1 {
                    font-size: 18vw;
                }
                
                h3 {
                    font-size: 3vw;
                }
            }
 
        </style>

    </head>
    <body>
        
        <header class="container-fluid">
            <div class="hero">
                <h3 class="text-muted">Best Shop Retailer</h3>
                <h1>Bili Na!</h1>
                <div class="buttons">
                    <a href="more-info.php"><h6 class="story">Our Story</h6></a>
                    <a href="#listContainer"><h6 class="shop"
                        onclick="">Shop Now</h6></a>
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
            <a class="navbar-brand" href="/PointOfSale/index.php">Bili Na!</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item" >
                  <a class="nav-link" href="/PointOfSale/index.php">Home</a>
                  <a class="nav-link" href="more-info.php#find-us">Contact Seller</a>
                  <a class="nav-link" href="#listContainer">Buy Now</a>
                  <a class="nav-link" href="http://localhost/PointOfSale/product-link/seller-data/itemInventory.php">Be a Seller</a>
                </li>
              </ul>
                <form action="product-link/process.php" class="form-inline" method="GET">
                <input class="form-control" type="search" placeholder="Search" 
                       aria-label="Search" name="searchbar">
                <button class="btn btn-outline-success" type="submit" 
                        name="search-button">Search</button>
              </form>
            </div>
        </nav>
        <form name="myform" action="product-link/process.php" method="GET">
        <div id="listContainer" class="container">
                <div class="panel-body">
                    <!--this part the items from database will be put-->
               </div>
        </div>
            <input  id="hide" type="hidden" name="n" value=0>
        </form>
        
        <script>
        
        var parent = document.getElementsByClassName("panel-body")[0];
        var index = 0;
        var productTitle = <?php echo json_encode($title); ?>;
        var productPrice = <?php echo json_encode($price);?>;
        var productImgId = <?php echo json_encode($id); ?>;
        function insert_divs() {
            productTitle.forEach(function(e){
             var sp = document.createElement('h5');
             var h4 = document.createElement('h6');
             var img = document.createElement('img'); 
             var installment = document.createElement('div');
             var anchor = document.createElement('a');
             var span_text = document.createTextNode(e);
             var price_text = document.createTextNode("₱"+productPrice[index]);
             h4.appendChild(price_text);
             sp.appendChild(span_text);
             img.setAttribute('src', "product-link/item-image/"+productImgId[index]+"s0.jpg");
             installment.className = "panel";
             installment.id = "id" + productImgId[index];
             anchor.setAttribute('href', "http://localhost/PointOfSale/product-link/process.php?n="+productImgId[index] );
             anchor.setAttribute('onclick',"document.myform.submit()" );
             anchor.appendChild(img);
             anchor.appendChild(h4);
             anchor.appendChild(sp);
             
             installment.appendChild(anchor);
             parent.appendChild(installment);
             index++;
            });
          }
          
          window.onload =  insert_divs();
          
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>    
    </body>
</html>

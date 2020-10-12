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
        <title>Bili na | More info</title>

    </head>
    <body>
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
                  <a class="nav-link" href="/PointOfSale/index.php#listContainer">Buy Now</a>
                  <a class="nav-link" href="more-info.php">Find more</a>
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
        <div class="container">
            <div class="best-seller">
                <a href="index.php" class="seller-1">
                    <ion-icon name="cart-outline"></ion-icon>
                </a>
                <a href="images/seller2.jpg" class="seller-2">
                    <ion-icon name="expand"></ion-icon>
                </a>
                <a href="images/seller3.jpg" class="seller-3">
                    <ion-icon name="expand"></ion-icon>
                </a>
                <a href="images/seller5.jpg" class="seller-5">
                    <ion-icon name="expand"></ion-icon>
                </a>
                <a href="index.php" class="seller-6">
                    <ion-icon name="cart-outline"></ion-icon>
                </a>
            </div>
            <div class="pricing">
                <img src="images/banner-pricing.jpg" alt="banner of pricing">
            </div>
            <div class="centered-container">
            <div class="location" id="find-us">
                <h4>Find Us <ion-icon name="location-outline"></ion-icon></h4>
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="612" height="277" id="gmap_canvas" src="https://maps.google.com/maps?q=platinum%20ville%2C%20chormium%20street&t=&z=17&ie=UTF8&iwloc=&output=embed" 
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                        </iframe>
                        <a href="https://www.whatismyip-address.com/divi-discount/"></a>
                    </div>
                    <style>
                        
                    </style>
                </div>
                <div class="seller-info" id="seller-info">
                    <h6>seller detail</h6>
                    Metro Manila~Quezon City, Quezon City, Project CHANGE
                    Standard Delivery
                    3 - 7 day(s)
                    ₱42.00
                    Cash on Delivery Available	
                    Return & Warranty	
                    7 days return to seller
                    Change of mind is not applicable
                    7 Days Lazada refund warranty only
                </div>
            </div>
            <div class="order">
                <h4>Order online <ion-icon name="cart-outline"></ion-icon></h4>
                <div class="order-card">
                    <img src="images/website-thumbnail.jpg" alt="web thumnail">
                    <a href="index.php"><button type="button" 
                        class="btn btn-success">Visit Shop</button></a>
                    <p>Visit our website to find the best for you. We offer Cash
                        on delivery.</p>    
                </div>
            </div>
        </div>
        </div>    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>    
<!--    ion icons-->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    </body>
</html>

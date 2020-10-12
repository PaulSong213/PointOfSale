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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
               crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Barlow:600|Rasa:300,500" rel="stylesheet">
        <link href="product-style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Items</title>
    </head>
    <body>
        <?php require_once 'process.php'; ?>
        <?php
        // put your code here
        ?>
        <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
            <a class="navbar-brand" href="/PointOfSale/index.php">Bili Na!</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/PointOfSale/index.php" >Home</a>
                  <a class="nav-link" href="/PointOfSale/more-info.php#find-us"> Contact Seller</a>
                  <a class="nav-link" href="/PointOfSale/index.php#listContainer">Buy Now</a>
                  <a class="nav-link" href="/PointOfSale/more-info.php">Find more</a>
                </li>
              </ul>
                <form action="process.php" class="form-inline" method="GET">
                <input class="form-control" type="search" placeholder="Search" 
                       aria-label="Search" name="searchbar">
                <button class="btn btn-outline-success" type="submit" 
                        name="search-button">Search</button>
              </form>
            </div>
          </nav>
        <main class="container">
            <div class="product-small-details">
                <div class="product-details-images">
                    <div class="img-preview">
                        <img src="<?php echo $currentViewImg ?>" alt="item preview"
                             id="item-preview">
                    </div>
                    <div class="img-navigator">
<!--                        gallery thumbnail will be placed here-->
                    </div>
                       
                </div>
                <div class="product-details-buy">
                    <h4><?php echo $currentViewTitle;?></h4>
                    <div class="ratings">
                        <p class="brand"><span>Brand:</span> </p>
                    </div>
                    <div class="buy">
                        <h2>₱ <?php echo $currentViewPrice;?></h2>
                        <div class="quantity-div">
                            <span>
                                <p>Quantity</p>
                                <button class="minus-button" onclick="minusQuantity()">-</button>
                                <input type="number" id="currentQuantity" value="1">
                                <button id="plus" class="plus-button" onclick="plusQuantity()">+</button>
                            </span>
                            <p>Available: <?php echo $currentViewQuantity;?></p>
                        </div>
                        <a href="#buying-section" onclick="setMessage()"><button 
                            class="buy-button btn btn-success" id="buy-button">Buy Now</button></a>
                    </div>
                </div>
                <div class="product-details-delivery">
                    <h6>Description</h6>
                    <p><?php echo $currentViewDescription;?></p>
                </div>
            </div>
            <div class="buying-section row" id="buying-section">
                <div class="col-sm-12 col-md-8" style="padding: 0;">
                    <div class="navigation-purchase col-12 ">
                        <a class="cod"><img src="item-image/payment-mode/pay-cod.png"
                             alt="cash on delivery" ></a>
                        <a><img src="item-image/payment-mode/pay-online-paymaya.png"
                                alt="paymaya"><a>
                        <a><img src="item-image/payment-mode/pay-online-gcash.png"
                                alt="gcash"></a>
                        <a><img src="item-image/payment-mode/pay-online-visa.png"
                                alt="visa"></a>
                    </div>
                    <div class="order-field col-12">
                        <h4 style="text-align: center">Cash On Delivery</h4>
                        <form action="process.php" method="POST" id="CODform" class="CODform">
                            <input type="hidden" name="user-product-name" 
                                   id="user-product-name" value="<?php echo $userProductName;?>">
                            <input type="hidden" name="user-product-quantity" 
                                   id="user-product-quantity" value="<?php echo $userProductQuantity;?>">
                            <input type="hidden" name="user-product-price" 
                                   id="user-product-price" value="<?php echo $userProductPrice;?>">
                            <label>Name: <span class="error-message">
                                <?php echo $nameError; ?><span> </label>  
                            <input type="text" name="user-name" id="user-name" 
                                   value="<?php echo htmlspecialchars($userName); ?>"/>
                            <label>Mobile Number: <span class="error-message">
                                <?php echo $numberError; ?><span></label>
                            <input type="text" name="user-number" id="user-number" 
                                   placeholder="09"  value="<?php echo $userNumber; ?>" />
                            <label>Address: <span class="error-message">
                                <?php echo $addressError; ?><span></label>
                            <input type="text" name="user-address" id="user-address" 
                                   value="<?php echo htmlspecialchars($userAddress); ?>" />
                            <label>Message: <span class="error-message">
                                <?php echo $messageError; ?><span></label>
                            <textarea readonly id="user-message" name="user-message" rows="5" cols="50"
                                      placeholder="Please click 'buy now'  to generate message to seller."
                                      form="CODform" >
                            </textarea>
                            <label>Add Note:</label>
                            <input type="text" name="user-note"  id="user-note"
                                   value="<?php echo $userNote;?>"/>
                            <input type="submit" name="user-save" id="submit-button"
                                   class="btn btn-primary"  />
                        </form>
                        
                    </div>    
                </div>
                <div class="col-sm-12 col-md-4" style="padding: 0;background: #ffffff">
                    <div class="navigation-social col">
                        <a class="loc"><img src="item-image/social-logo/social-location.png" 
                                alt="location" ></a>
                        <a href="https://web.facebook.com/" target="_blank">
                            <img src="item-image/social-logo/social-fb.png" alt="fb page"></a>
                        <a href="https://www.instagram.com/" target="_blank">
                            <img src="item-image/social-logo/social-insta.png" alt="instagram"></a>
                    </div>
                    <div class="seller-info col" id="seller-info">
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
            </div>
        </main>
        <script>
           var imgArray = <?php echo $currentViewSecImages; ?>;
           var parent = document.getElementsByClassName("img-navigator")[0];
           var currentId = <?php echo $currentViewId;?>;
           var maxQuantity = <?php echo $currentViewQuantity;?>;
           var buyerMessage = ""; 
           var itemTotalPrice = <?php echo $currentViewPrice;?>;
           var itemBasePrice = <?php echo $currentViewPrice;?>;
           var completeEmailbody = "";
           document.getElementById('user-message').value = buyerMessage;
           function setMessage(){
              itemTotalPrice = itemBasePrice * document.getElementById('currentQuantity').value;
               buyerMessage = "Hi I would like to buy "+ 
                   "<?php echo $currentViewTitle;?>, " + 
                   document.getElementById('currentQuantity').value + " piece(s)"+
                   " which has a total price of ₱" + itemTotalPrice;
               document.getElementById('user-product-name').value = "<?php echo $currentViewTitle;?> ";   
               document.getElementById('user-product-quantity').value = document.getElementById('currentQuantity').value;   
               document.getElementById('user-product-price').value = itemTotalPrice;   
               document.getElementById('user-message').value = buyerMessage;
           }
           if(document.getElementById('user-message').value === ""){
                 document.getElementById('user-message').value ="<?php echo $userMessage;?>";
           }  
           function openEmailWindow(){
                var nameField = document.getElementById('user-name').value;
                var numberField = document.getElementById('user-number').value;
                var addressField = document.getElementById('user-address').value;
                var messageField = document.getElementById('user-message').value;
                var noteField = document.getElementById('user-note').value;
                
                if(nameField !== "" & numberField !== "" & addressField !== "" & 
                        messageField !== "" & noteField  !== "" ){
                    completeEmailbody = "Name: " +document.getElementById('user-name').value + "          "+
                                "Address: " +document.getElementById('user-address').value + "          "+
                                "Mobile Number: " +document.getElementById('user-number').value + "          "+
                                "Note: "+document.getElementById('user-note').value + "          "+
                                "Item/Price/Quantity: " + document.getElementById('user-message').value ;
                    window.open('mailto:greatpaul321@gmail.com?subject=Bili Na!|Buyer&body=' + completeEmailbody);
                }
           }
           
            function plusQuantity(){
                if(document.getElementById("currentQuantity").value < maxQuantity){
                    document.getElementById("currentQuantity").value++;
                }
            }
            
            function minusQuantity(){
                if(document.getElementById("currentQuantity").value > 1){
                    document.getElementById("currentQuantity").value--; 
                }
            }
            
            function createImageGallery(){
                for (i = 0; i <= imgArray; i++) {
                    var sp = document.createElement('span');
                    var img = document.createElement('img');
                    img.setAttribute('src', "item-image/" +currentId +"s"+i+".jpg");
                    img.setAttribute('alt', "secondary images");
                    img.className = "img-navigator-s"+i;
                    img.id = "s"+i;
                    sp.appendChild(img);
                    parent.appendChild(sp);
                }
            }
            
            window.onload = createImageGallery();
           
            $(document).ready(function(){
                for (i = 0; i <= imgArray; i++) {
                    $(".img-navigator-s"+i).click(function(){
                        
                        for (j = 0; j <= imgArray; j++) {
                        $(".img-navigator-s"+ j).css("opacity", "1");
                        }
                        $("#item-preview").attr("src","item-image/" +currentId +
                                $(this).attr('id')+".jpg");
                         $(this).css("opacity", 0.8);
                    });
                    $(".img-navigator-s"+i).hover(function(){
                         
                        for (j = 0; j <= imgArray; j++) {
                        $(".img-navigator-s"+ j).css("opacity", "1");
                        }
                        $("#item-preview").attr("src","item-image/" +currentId +
                                $(this).attr('id')+".jpg");
                       $(this).css("opacity", 0.8);
                    });
                }
            });
        </script>
        
        
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>    
<!--    ion icons-->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
    </body>
</html>

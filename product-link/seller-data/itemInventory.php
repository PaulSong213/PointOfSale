<?php
    require_once '../process.php';
    if(!isset($_SESSION['login'])){ //if login in session is not set
        header("Location: ../seller.php");
    }
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="../../main.css" rel="stylesheet">
        <link href="./seller-data-style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title> Items | Dashboard</title>
        <style>
            .list-nav li:first-child {
                background-color: #007BFF;  
            }
            .form-group {
                display: flex;
                flex-flow: column;
                
            }
            .edit{
                background-color: #ffffff;
                margin: 2rem 0;
                border: 1px rgba(0,0,0,0.2) solid;
                border-radius: 1rem;
                height: auto;
            }
            
            .edit-form {
                padding: 2rem 1rem;
            }
            .button-group {
                width: 100%;
                display: flex;
                flex-direction: row;
                justify-content: center;
            }
            
            .button-group button {
                margin: 0 0.5rem;
                padding: 0.5rem 1.5rem;
            }
            
            .button-group a{
                background-color: rgba(51, 51, 51,0.9);
                margin: 0 0.5rem;
                padding: 0.5rem 1.5rem;
                border-radius: 0.3rem;
                text-decoration: none;
                color: #ffffff;
                text-align: center;
            }
            
            .button-group a:hover {
                 background-color: rgba(51, 51, 51,1);
            }
            
            .button-group button {
                text-align: center;
            }
            
            
            
            .form-group small {
                color: rgba(0,0,0,0.5);
            }
            
            .autocomplete {
                /*the container must be positioned relative:*/
                position: relative;
                display: inline-block;
              }
            
            .autocomplete-items {
                position: absolute;
                border: 1px solid #d4d4d4;
                border-bottom: none;
                border-top: none;
                z-index: 99;
                /*position the autocomplete items to be the same width as the container:*/
                top: 100%;
                left: 0;
                right: 0;
              }
              .autocomplete-items div {
                padding: 10px;
                cursor: pointer;
                background-color: #fff;
                border-bottom: 1px solid #d4d4d4;
              }
              .autocomplete-items div:hover {
                /*when hovering an item:*/
                background-color: #e9e9e9;
              }
              .autocomplete-active {
                /*when navigating through the items using the arrow keys:*/
                background-color: DodgerBlue !important;
                color: #ffffff;
              }
              
              
              
        </style>
    </head>
    <body>
        <?php include './navigationForAllSeller.php';?> 
        <div class="container-seller">
            <?php
            if(isset($_SESSION['message'])):?> 
            <div class="change-indicator <?php echo 'bg-'.$_SESSION['msg_type'];?>">
                <span>
                <ion-icon style="font-size:2rem" name="information-circle-outline"></ion-icon>
                <?php
                 echo $_SESSION['message'];
                 unset($_SESSION['message']);
                ?>
                </span>
                <ion-icon name="close-outline" id="exit-indicator"></ion-icon>
            </div>
            <?php endif ?>   
            <div class="row" >
                <div class="sidebar col-sm-12 col-md-2 bg-white">
                    <ul class="list-nav">
                        <li id='all-items'><a href="#">All items</a></li>
                        <li id='pending-buyer'><a href="pendingBuyer.php">Pending Buyer</a></li>
                        <li id='on-delivery'><a href="onDelivery.php">On delivery</a></li> 
                     </ul>
                </div>
                
                <div class="main-content col-sm-12 col-md-10">
                    <table class="table table-bordered">
                        <div class="table-top bg-primary sticky-top">
                            <h5>Item Inventory</h5> 
                            <!-- Search form -->
                            <div class="search-form">
                                <!--Make sure the form has the autocomplete function switched off:-->
                                    <form autocomplete="off" action="../process.php"
                                          method="GET">
                                      <div class="autocomplete">
                                        <input id="myInput" type="text" 
                                        name="all-item-search-bar" placeholder="Search..."
                                        class="bg-primary table-nav">
                                      </div>
                                        <button type="submit" class="bg-primary table-nav"
                                             name="all-item-search-button">
                                            <ion-icon name="search-outline"></ion-icon>
                                        </button> 
                                    </form>
                            </div>
                        </div>
                        
                            <thead>
                              <tr>
                                <th>Action</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th>Secondary Images</th>
                              </tr>
                            </thead>
                        <tbody class="table-body">
            <!--                  items of table will be put here-->
                        </tbody>
                    </table>
                </div>
                <div class="edit">
                    <form action="../process.php" method="POST" class="edit-form" 
                          name="edit-items" id="edit-form" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden"  name="inventory-product-secImg"
                                   value="<?php echo $editSecCount;?>" />    
                        <div class="form-group col-sm-12 col-md-2">
                         <label for="inventory-product-id">Product ID</label>
                         <input readonly type="number" name="inventory-product-id"
                                placeholder="Autocomplete" value="<?php echo $editItemId;?>"/>
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                          <label for="inventory-product-name">Product Name</label>
                          <input type="text" name="inventory-product-name" 
                                 value="<?php echo $editItemName;?>"/>
                        </div>
                        <div class="form-group col-sm-12 col-md-2">
                          <label for="inventory-product-price">Price</label>
                          <input type="number" name="inventory-product-price"
                                 value="<?php echo $editItemPrice;?>"/>
                        </div>
                        <div class="form-group col-sm-12 col-md-2">
                          <label for="inventory-product-quantity"> Quantity</label>
                          <input type="number" name="inventory-product-quantity"
                                 value="<?php echo $editItemQuantity;?>"/>
                        </div>
                        <div class="form-group col-sm-12 col-md-8">
                          <label for="inventory-product-description">Product Description</label>
                          <textarea name="inventory-product-description" 
                              id="inventory-product-description" rows="5" ><?php echo $editItemDescription;?></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            <label for="inventory-product-img">Product Main Image<small> Recommended: 300px X 300px</small></label>
                            
                            <small>Main Image (thumbnail)</small>
                            <input type="file" id="inventory-product-img" 
                                   name="inventory-product-img" >
                            <small>Secondary Image (Choose up to 5 images)</small>
                            <input type="file" id="inventory-product-sec-img" 
                                   name="inventory-product-sec-img[]" multiple>
                        </div>
                        <div class="button-group col-sm-12">
                            <button type="submit" class="btn btn-primary" name="updateAllItems">
                                <?php echo $actionMode;?></button>
                            <a  href="./itemInventory.php#edit-form">Clear Form</a>
                            <button type="submit" class="btn btn-danger"
                                    name="deleteAllitems">Delete Item</button>
                        </div>
                     </div>
                    </form>
                </div>
            </div>
            
        </div>
        <script>
            
           var productTitle = "";
            $("#inventory-product-img").prop('disabled', <?php echo $converted_res;?>);
            $("#inventory-product-sec-img").prop('disabled', <?php echo $converted_res;?>);
                   
            $('.main-content').scroll(function() {
               var div = $(this);
                    if (div.scrollTop() != 0)
                    {
                       $(".table-top").css("opacity", "0.6");
                       
                    }
                    else if(div.scrollTop() == 0)
                    {
                        $(".table-top").css("opacity", "1");
                    }
            });
            
            $('.table-top').hover(function() {
                $(this).css("opacity", "1");
            });
            $('.table-top').click(function() {
                $(this).css("opacity", "1");
            });
             
            function insert_divs() {
                var parent = document.getElementsByClassName("table-body")[0];
                productTitle = <?php echo json_encode($title); ?>;
                var productPrice = <?php echo json_encode($price);?>;
                var productId = <?php echo json_encode($id); ?>;
                var productQuantity = <?php echo json_encode($quantity); ?>;
                var productDescription = <?php echo json_encode($decription); ?>;
                var productSecImages = <?php echo json_encode($secImages); ?>;
                var index = 0;
                productTitle.forEach(function(e){
                 var tr = document.createElement('tr');
                 
                 var editTd = document.createElement('td');
                 var nameTd = document.createElement('td');
                 var idTd = document.createElement('td');
                 var priceTd = document.createElement('td');
                 var quantityTd = document.createElement('td');
                 var descriptionTd = document.createElement('td');
                 var secImagesTd = document.createElement('td');
                 var editAnchor = document.createElement('a');
                 editAnchor.setAttribute("href","itemInventory.php?edit="+productId[index]+"#edit-form");
                 var nameText = document.createTextNode(e);
                 var idText = document.createTextNode(productId[index]); 
                 var priceText = document.createTextNode("₱"+productPrice[index]);
                 var quantityText = document.createTextNode(productQuantity[index]); 
                 var descriptionText = document.createTextNode(productDescription[index]); 
                 var secImagesText = document.createTextNode(productSecImages[index]); 
                 var editText  = document.createTextNode("Edit");
                 
                 nameTd.appendChild(nameText);
                 idTd.appendChild(idText);
                 priceTd.appendChild(priceText);
                 quantityTd.appendChild(quantityText);
                 descriptionTd.appendChild(descriptionText);
                 secImagesTd.appendChild(secImagesText);
                 
                 editAnchor.appendChild(editText);
                 editTd.appendChild(editAnchor);
                 
                 tr.appendChild(editTd);
                 tr.appendChild(idTd);
                 tr.appendChild(nameTd);
                 tr.appendChild(priceTd);
                 tr.appendChild(quantityTd);
                 tr.appendChild(descriptionTd);
                 tr.appendChild(secImagesTd);
                 
                 parent.appendChild(tr);
                 index++;
                });
              }
              window.onload =  insert_divs();
              
              //code by https://www.w3schools.com/howto/howto_js_autocomplete.asp
              function autocomplete(inp, arr) {
                /*the autocomplete function takes two arguments,
                the text field element and an array of possible autocompleted values:*/
                var currentFocus;
                /*execute a function when someone writes in the text field:*/
                inp.addEventListener("input", function(e) {
                  var a, b, i, val = this.value;
                  /*close any already open lists of autocompleted values*/
                  closeAllLists();
                  if (!val) { return false;}
                  currentFocus = -1;
                  /*create a DIV element that will contain the items (values):*/
                  a = document.createElement("DIV");
                  a.setAttribute("id", this.id + "autocomplete-list");
                  a.setAttribute("class", "autocomplete-items");
                  /*append the DIV element as a child of the autocomplete container:*/
                  this.parentNode.appendChild(a);
                  /*for each item in the array...*/
                  for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                      /*create a DIV element for each matching element:*/
                      b = document.createElement("DIV");
                      /*make the matching letters bold:*/
                      b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                      b.innerHTML += arr[i].substr(val.length);
                      /*insert a input field that will hold the current array item's value:*/
                      b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                      /*execute a function when someone clicks on the item value (DIV element):*/
                          b.addEventListener("click", function(e) {
                          /*insert the value for the autocomplete text field:*/
                          inp.value = this.getElementsByTagName("input")[0].value;
                          /*close the list of autocompleted values,
                          (or any other open lists of autocompleted values:*/
                          closeAllLists();
                      });
                      a.appendChild(b);
                    }
                  }
              });
              /*execute a function presses a key on the keyboard:*/
              inp.addEventListener("keydown", function(e) {
                  var x = document.getElementById(this.id + "autocomplete-list");
                  if (x) x = x.getElementsByTagName("div");
                  if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                  } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                  } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                      /*and simulate a click on the "active" item:*/
                      if (x) x[currentFocus].click();
                    }
                  }
              });
              function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
              }
              function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                  x[i].classList.remove("autocomplete-active");
                }
              }
              function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                  if (elmnt != x[i] && elmnt != inp) {
                  x[i].parentNode.removeChild(x[i]);
                }
              }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function (e) {
                closeAllLists(e.target);
            });
            }
            autocomplete(document.getElementById("myInput"), productTitle);       
            
            $('#exit-indicator').click(function() {
                $('.change-indicator').remove();
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

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
        <link href="../main.css" rel="stylesheet">
        <link href="./seller-data-style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>On Delivery | Dashboard</title>
        <style>
            #on-delivery {
                background-color: #007BFF;  
            }
        </style>
    </head>
    <body>
        <?php
        require_once '../process.php';
        if(!isset($_SESSION['login'])){ //if login in session is not set
            header("Location: ../seller.php");
        }
        ?>
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
                        <li id='all-items'><a href="itemInventory.php">All items</a></li>
                        <li id='pending-buyer'><a href="pendingBuyer.php">Pending Buyer</a></li>
                        <li id='on-delivery'><a href="#">On delivery</a></li> 
                     </ul>
                </div>
                
                <div class="main-content col-sm-12 col-md-10">
                    <table class="table table-bordered">
                        <div class="table-top bg-success">
                        <h5>On Delivery</h5>
                        </div>    
                            <thead>
                              <tr>
                                <th>Action</th>
                                <th>Delivery ID</th>
                                <th>Delivery start date</th>
                                <th>Delivery end date</th>
                                <th>Buyer ID</th>
                                <th>Date ordered</th>
                                <th>Buyer Name</th>
                                <th>Buyer Number</th>
                                <th>Product Name</th>
                                <th>Product Quantity</th>
                                <th>Product Price</th>
                                <th>Buyer Address</th>
                                <th>Buyer Note</th>
                              </tr>
                            </thead>
                        <tbody class="table-body">
            <!--                  items of table will be put here-->
                        </tbody>
                        <form action="../process.php" method="POST" id="on-delivery-form" >
                            <input type="hidden" name="on-delivery-edit-id"
                                   id="on-delivery-edit-id">
                        </form>
                    </table>
                </div>
            </div>    
        </div>
        <script>
              function insert_divs() {
                var parent = document.getElementsByClassName("table-body")[0];
                var onDeliveryId = <?php echo json_encode($onDeliveryID); ?>;
                var onDeliveryStartDate = <?php echo json_encode( $onDeliveryStartDate); ?>;
                var onDeliveryEndDate = <?php echo json_encode($onDeliveryEndDate); ?>;
                var onDeliveryBuyerId = <?php echo json_encode($onDeliveryBuyerId); ?>;
                var onDeliveryOrderDate = <?php echo json_encode($onDeliveryOrderDate); ?>;
                var onDeliveryBuyerName = <?php echo json_encode($onDeliveryBuyerName ); ?>;
                var onDeliveryBuyerNumber = <?php echo json_encode($onDeliveryBuyerNumber ); ?>;
                var onDeliveryProductName = <?php echo json_encode($onDeliveryProductName ); ?>;
                var onDeliveryProductQuantity = <?php echo json_encode($onDeliveryProductQuantity); ?>;
                var onDeliveryProductPrice = <?php echo json_encode($onDeliveryProductPrice ); ?>;
                var onDeliveryBuyerAddress = <?php echo json_encode($onDeliveryBuyerAddress  ); ?>;
                var onDeliveryBuyerNote = <?php echo json_encode($onDeliveryBuyerNote ); ?>;
                
                var index = 0;
                onDeliveryId.forEach(function(e){
                 var tr = document.createElement('tr');
                 var editTd = document.createElement('td');
                 var deliveryIdTd = document.createElement('td');
                 var deliveryStartDateTd = document.createElement('td');
                 var deliveryEndDateTd = document.createElement('td');
                 var idTd = document.createElement('td');
                 var orderDateTd = document.createElement('td');
                 var nameTd = document.createElement('td');
                 var numberTd = document.createElement('td');
                 var orderNameTd = document.createElement('td');
                 var orderQuantityTd = document.createElement('td');
                 var orderPriceTd = document.createElement('td');
                 var addressTd = document.createElement('td');
                 var noteTd = document.createElement('td');
                 var editAnchor = document.createElement('a');
                 editAnchor.setAttribute("href","#");
                 editAnchor.setAttribute("id", onDeliveryId[index]);
                 editAnchor.setAttribute("class", "edit-delivered");
                 
                 var deliveryIdText = document.createTextNode(e);
                 var deliveryStartDateText = document.createTextNode(onDeliveryStartDate[index]); 
                 var deliveryEndDateText = document.createTextNode(onDeliveryEndDate[index]); 
                 var idText = document.createTextNode(onDeliveryBuyerId[index]);
                 var orderDateText = document.createTextNode(onDeliveryOrderDate[index]);
                 var nameText = document.createTextNode(onDeliveryBuyerName[index]);  
                 var numberText = document.createTextNode(onDeliveryBuyerNumber[index]);  
                 var orderNameText = document.createTextNode(onDeliveryProductName[index]);  
                 var orderQuantityText = document.createTextNode(onDeliveryProductQuantity[index]);  
                 var orderPriceText = document.createTextNode("₱"+ onDeliveryProductPrice[index]);  
                 var addressText = document.createTextNode(onDeliveryBuyerAddress[index]);  
                 var noteText = document.createTextNode(onDeliveryBuyerNote[index]);   
                 var editText  = document.createTextNode("Delivered");
                 
                 deliveryIdTd.appendChild(deliveryIdText);
                 deliveryStartDateTd.appendChild(deliveryStartDateText);
                 deliveryEndDateTd.appendChild(deliveryEndDateText );
                 idTd.appendChild( idText);
                 orderDateTd.appendChild(orderDateText );
                 nameTd.appendChild(nameText );
                 numberTd.appendChild(numberText );
                 orderNameTd.appendChild(orderNameText );
                 orderQuantityTd.appendChild(orderQuantityText );
                 orderPriceTd.appendChild(orderPriceText );
                 addressTd.appendChild(addressText );
                 noteTd.appendChild(noteText );
                 
                 editAnchor.appendChild(editText);
                 editTd.appendChild(editAnchor);
                 
                 tr.appendChild(editTd);
                 tr.appendChild(deliveryIdTd);
                 tr.appendChild(deliveryStartDateTd);
                 tr.appendChild(deliveryEndDateTd );
                 tr.appendChild(idTd );
                 tr.appendChild(orderDateTd);
                 tr.appendChild(nameTd);
                 tr.appendChild(numberTd);
                 tr.appendChild(orderNameTd);
                 tr.appendChild(orderQuantityTd);
                 tr.appendChild(orderPriceTd);
                 tr.appendChild(addressTd);
                 tr.appendChild(noteTd);
                 
                 parent.appendChild(tr);
                 index++;
                });
              }
              window.onload =  insert_divs();
              
               $(document).ready(function(){
                  
                  $('.edit-delivered').click(function (){
                     var currentEditId = $(this).attr('id'); 
                     $('#on-delivery-edit-id').attr('value',currentEditId);
                     $('#on-delivery-form').submit();
                  });
                  
                  $('#exit-indicator').click(function() {
                    $('.change-indicator').remove();
                  });
                  
                });
              
        </script>
        
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>    
    </body>
</html>

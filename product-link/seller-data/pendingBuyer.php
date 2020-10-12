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
        <script type="text/javascript" src="/query-1.6.3.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Pending Buyer | Dashboard</title>
        
        <style>
            #pending-buyer {
                background-color: #007BFF;  
            }
            #pending-buyer-total {
                color: #ffffff;
                text-transform: none;
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
                        <li id='all-items'><a href="itemInventory.php">All items</a></li>
                        <li id='pending-buyer'><a href="#">Pending Buyer</a></li>
                        <li id='on-delivery'><a href="onDelivery.php">On delivery</a></li> 
                     </ul>
                </div>
                
                <div class="main-content col-sm-12 col-md-10">
                    <table class="table table-bordered" id="pending-table">
                        <div class="table-top bg-danger">
                        <h5>Pending Buyer</h5>
                        <h6 id="pending-buyer-total">Total Pending: 
                            <?php echo $totalPendingBuyer;?></h6>
                        </div>    
                            <thead>
                              <tr>
                                <th>Action</th>
                                <th>ID</th>
                                <th>Date Ordered</th>
                                <th>Name</th>
                                <th>Mobile No.</th>
                                <th>Order Name</th>
                                <th>Order Quantity</th>
                                <th>Order Price</th>
                                <th>Address</th>
                                <th>Note</th>
                              </tr>
                            </thead>
                        <tbody class="table-body">
            <!--                  items of table will be put here-->
                        </tbody>
                        <form action="../process.php" method="POST" 
                              id="pending-edit-form"> 
                            <input type="hidden" name="pending-edit-id"
                                    id="pending-edit-id">
                            <input type="hidden" name="pending-edit-date"
                                    id="pending-edit-date">
                            <input type="hidden" name="pending-edit-name"
                                    id="pending-edit-name">
                            <input type="hidden" name="pending-edit-num"
                                    id="pending-edit-num">
                            <input type="hidden" name="pending-edit-order-name"
                                    id="pending-edit-order-name">
                            <input type="hidden" name="pending-edit-order-quantity"
                                    id="pending-edit-order-quantity">
                            <input type="hidden" name="pending-edit-order-price"
                                    id="pending-edit-order-price">
                            <input type="hidden" name="pending-edit-address"
                                    id="pending-edit-address">
                            <input type="hidden" name="pending-edit-note"
                                    id="pending-edit-note">
                            
                            
                            <input type="hidden" name="pending-del-id"
                                    id="pending-del-id">
                        </form>
                    </table>
                </div>
            </div>    
        </div>
        <script>

            
              function insert_divs() {
                var parent = document.getElementsByClassName("table-body")[0];
                var buyerID = <?php echo json_encode($buyerId); ?>;
                var buyerOrderDate = <?php echo json_encode($buyerOrderDate); ?>;
                var buyerName = <?php echo json_encode($buyerName); ?>;
                var buyerNumber = <?php echo json_encode($buyerNumber); ?>;
                var orderName = <?php echo json_encode($buyerProductName); ?>;
                var orderQuantity = <?php echo json_encode($buyerProductQuantity); ?>;
                var orderPrice = <?php echo json_encode($buyerProductPrice); ?>;
                var buyerAddress = <?php echo json_encode($buyerAddress); ?>;
                var buyerNote = <?php echo json_encode($buyerNote); ?>;
                
                var index = 0;
                 buyerID.forEach(function(e){
                 var tr = document.createElement('tr');
                 
                 var editTd = document.createElement('td');
                 var idTd = document.createElement('td');
                 var orderDateTd = document.createElement('td');
                 var nameTd = document.createElement('td');
                 var numberTd = document.createElement('td');
                 var orderNameTd = document.createElement('td');
                 var orderQuantityTd = document.createElement('td');
                 var orderPriceTd = document.createElement('td');
                 var addressTd = document.createElement('td');
                 var noteTd = document.createElement('td');
                 var doneAnchor  = document.createElement('a');
                 var delAnchor  = document.createElement('a');
                 
                 var idText = document.createTextNode(e);
                 var orderDateText = document.createTextNode(buyerOrderDate[index]);
                 var nameText = document.createTextNode(buyerName[index]);  
                 var numberText = document.createTextNode(buyerNumber[index]);  
                 var orderNameText = document.createTextNode(orderName[index]);  
                 var orderQuantityText = document.createTextNode(orderQuantity[index]);  
                 var orderPriceText = document.createTextNode("₱"+orderPrice[index]);  
                 var addressText = document.createTextNode(buyerAddress[index]);  
                 var noteText = document.createTextNode(buyerNote[index]);  
                 var doneText = document.createTextNode('Accept');
                 var delText = document.createTextNode('Reject');

                 doneAnchor.appendChild(doneText);
                 delAnchor.appendChild(delText);
                 editTd.appendChild(doneAnchor);
                 editTd.appendChild(delAnchor);
                 doneAnchor.setAttribute('href','#');
                 delAnchor.setAttribute('href','#');
                 doneAnchor.setAttribute('class', 'pending-done-button bg-primary');
                 delAnchor.setAttribute('class', 'pending-del-button bg-secondary');
                 doneAnchor.setAttribute('id',  e);
                 delAnchor.setAttribute('id', "i" + e);
                 idTd.appendChild(idText);
                 orderDateTd.appendChild(orderDateText);
                 nameTd.appendChild(nameText);
                 numberTd.appendChild(numberText);
                 orderNameTd.appendChild(orderNameText);
                 orderQuantityTd.appendChild(orderQuantityText);
                 orderPriceTd.appendChild(orderPriceText);
                 addressTd.appendChild(addressText);
                 noteTd.appendChild(noteText);
                
                
                 tr.appendChild(editTd);
                 tr.appendChild(idTd);
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

            $('.pending-done-button').css('border-radius',' 0.5rem 0rem 0rem 0.5rem ');
            $('.pending-del-button').css('border-radius',' 0rem 0.5rem 0.5rem 0rem ');  
            
            $('.pending-done-button').click(function() {
                var tableRowLength = document.getElementById("pending-table").rows.length;
                var selectedPendingId = $(this).attr('id');
                var selectedPendingDate = "";
                var selectedPendingName = "";
                var selectedPendingNum = "";
                var selectedPendingOrderName = "";
                var selectedPendingOrderQuantity = "";
                var selectedPendingOrderPrice = "";
                var selectedPendingAddress = "";
                var selectedPendingNote = "";
                //alert(document.getElementById("pending-table").rows[1].cells.item(1).innerHTML);

                for(var i = 0; i < tableRowLength;i++){
                    var idRow = document.getElementById("pending-table").rows[i].cells.item(1).innerHTML;
                    var dateRow = document.getElementById("pending-table").rows[i].cells.item(2).innerHTML;
                    var nameRow = document.getElementById("pending-table").rows[i].cells.item(3).innerHTML;
                    var numRow = document.getElementById("pending-table").rows[i].cells.item(4).innerHTML;
                    var orderNameRow = document.getElementById("pending-table").rows[i].cells.item(5).innerHTML;
                    var orderQuantityRow = document.getElementById("pending-table").rows[i].cells.item(6).innerHTML;
                    var orderPriceRow = document.getElementById("pending-table").rows[i].cells.item(7).innerHTML;
                    var addressRow = document.getElementById("pending-table").rows[i].cells.item(8).innerHTML;
                    var noteRow = document.getElementById("pending-table").rows[i].cells.item(9).innerHTML;
                    if(idRow === selectedPendingId){
                        selectedPendingDate = dateRow;
                        selectedPendingName = nameRow;
                        selectedPendingNum = numRow;
                        selectedPendingOrderName = orderNameRow;
                        selectedPendingOrderQuantity = orderQuantityRow;
                        selectedPendingOrderPrice = orderPriceRow;
                        selectedPendingAddress = addressRow;
                        selectedPendingNote = noteRow;
                       
                        break;
                    }    
                }
                $('#pending-edit-id').attr('value', selectedPendingId);
                $('#pending-edit-date').attr('value', selectedPendingDate);
                $('#pending-edit-name').attr('value', selectedPendingName);
                $('#pending-edit-num').attr('value', selectedPendingNum);
                $('#pending-edit-order-name').attr('value', selectedPendingOrderName);
                $('#pending-edit-order-quantity').attr('value', selectedPendingOrderQuantity);
                $('#pending-edit-order-price').attr('value', selectedPendingOrderPrice.substring(1));
                $('#pending-edit-address').attr('value', selectedPendingAddress);
                $('#pending-edit-note').attr('value', selectedPendingNote);
                $('#pending-edit-form').submit();
            });
            
           
            
            $('.pending-del-button').click(function() {
                var selectedPendingId = $(this).attr('id');
                var editedId = selectedPendingId.substring(1);
                $('#pending-del-id').attr('value', editedId);
                $('#pending-edit-form').submit();
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
    <!--    ion icons-->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    </body>
</html>

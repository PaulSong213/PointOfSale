  
<?php
    session_start();
   //Database data
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbName = 'ecom_bili_na_shop'; 
   date_default_timezone_set('Asia/Manila');
   //edit data in item inventory
   $editItemId = "";
   $editItemName = "";
   $editItemPrice = "";
   $editItemQuantity = "";
   $editItemDescription = "";
   $actionMode = "Add item";
   $update = false;
   $editSecCount = 0;
   $converted_res = "false";
   //pending buyer data
   $buyerId = array();
   $buyerOrderDate = array();
   $buyerName = array();
   $buyerNumber = array();
   $buyerProductName = array();
   $buyerProductQuantity = array();
   $buyerProductPrice = array();
   $buyerAddress = array();
   $buyerNote = array();
   
   //on-delivery data
   $onDeliveryID = array();
   $onDeliveryStartDate = array();
   $onDeliveryEndDate = array();
   $onDeliveryBuyerId = array();
   $onDeliveryOrderDate = array();
   $onDeliveryBuyerName = array();
   $onDeliveryBuyerNumber = array();
   $onDeliveryProductName = array();
   $onDeliveryProductQuantity = array();
   $onDeliveryProductPrice = array();
   $onDeliveryBuyerAddress = array();
   $onDeliveryBuyerNote = array();
   
   //pending buyer data to be deleted or submitted to on-delivery
   $totalPendingBuyer = 0; 
   $editPendingId = 0;
   $editPendingDate = "";
   $editPendingName = "";
   $editPendingNum = "";
   $editPendingOrderName = "";
   $editPendingOrderQuantity = 0;
   $editPendingOrderPrice = 0;
   $editPendingAddress = "";
   $editPendingNote = "";
   
   //database search
   $searchItem = filter_input(INPUT_GET, 'searchbar');
   $searchedItemName = array();
   $searchedItemId = array();
   $searchedItemPrice = array();
   //data from database 'items'
   $title = array();
   $id = array();
   $price = array();
   $secImages = array();
   $quantity = array();
   $decription = array();
   $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbName) or die(mysqli_error($conn));
   $currentViewTitle = "";
   $currentViewSecImages = 0;
   $currentViewImg = "";
   $currentViewPrice = 0;
   $currentViewQuantity = 0;
   $currentViewDescription = "";
   $currentViewId = 0;
   
  
   $nextAvailableProductId = 0;
   $nextAvailableDeliveryId = 0;
   //COD FORM DATA
    $userName = filter_input(INPUT_POST, 'user-name');
    $userNumber = filter_input(INPUT_POST, 'user-number');
    $userAddress = filter_input(INPUT_POST, 'user-address');
    $userMessage = filter_input(INPUT_POST, 'user-message');
    $userNote = filter_input(INPUT_POST, 'user-note');
    $nameError = $numberError = $addressError = $messageError  = "";
    $userProductName = filter_input(INPUT_POST, 'user-product-name');
    $userProductQuantity = filter_input(INPUT_POST, 'user-product-quantity');
    $userProductPrice = filter_input(INPUT_POST, 'user-product-price');

    //Logging in data
    $loginName = filter_input(INPUT_POST, 'login-name');
    $loginPass = filter_input(INPUT_POST, 'login-pass');
    
    //create list of item in homepage
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }else {   
    //   echo 'Connected to db <br>' ;
    //$sql = 'SELECT id , title FROM items';
    $result = $conn->query("SELECT * FROM items") or die($conn->error());
    $index = 0;
    while ($row = $result->fetch_array()) {
     $title[] = $row['item_title'];
     $id[] = $row['id'];
     $price[] = $row['item_price'];
     $secImages[] = $row['secondary_images'];
     $quantity[] = $row['item_quantity'];
     $decription[] = $row['item_description'];
     //     echo $title[$index]." | ".$id[$index]." | ".$price[$index] .
     //             " | ".$secImages[$index]. " | ".$quantity[$index] ;
     //     echo "Fetched data successfully <br>";
     $index++;
     }
    $nextAvailableProductId = end($id) + 1;
   
    //on delivery datas
    $getOnDelivery =   $conn->query("SELECT * FROM `on-delivery`") or die($conn->error());
     while ($rowDev = $getOnDelivery->fetch_array()) {
        $onDeliveryID[] = $rowDev['delivery-id'];
        $onDeliveryStartDate[] = $rowDev['delivery-start'];
        $onDeliveryEndDate[] = $rowDev['delivery-end'];
        $onDeliveryBuyerId[] = $rowDev['buyer-id'];
        $onDeliveryOrderDate[] = $rowDev['date-order'];
        $onDeliveryBuyerName[] = $rowDev['buyer-name'];
        $onDeliveryBuyerNumber[] = $rowDev['buyer-number'];
        $onDeliveryProductName[] = $rowDev['product-name'];
        $onDeliveryProductQuantity[] = $rowDev['product-quantity'];
        $onDeliveryProductPrice[] = $rowDev['product-price'];
        $onDeliveryBuyerAddress[] = $rowDev['buyer-address'];
        $onDeliveryBuyerNote[] = $rowDev['buyer-note'];
     }
     $nextAvailableDeliveryId = end($onDeliveryID) + 1;
   }
    
    
    
    
    //update items in item inventory
    //important! use qoute on variables when you put it query stmt 
    //inventory items data getting data to be put in form
    if(! $conn ) {
        die('Could not connect: ' . mysql_error());
    }else {
        if(isset($_GET['edit'])){
            $converted_res = "true";
            $actionMode = "Update Item";
            $editItemId = filter_input(INPUT_GET, 'edit');
            $getEdit = $conn->query("SELECT * FROM `items` WHERE id= $editItemId")
                    or die($conn->error());
            while($editResult=$getEdit->fetch_assoc()){
                 $editItemName = $editResult['item_title'];
                 $editItemPrice = $editResult['item_price'];
                 $editItemQuantity = $editResult['item_quantity'];
                 $editItemDescription = $editResult['item_description'];
                 $editSecCount = $editResult['secondary_images'];
            }
        } else {
            $actionMode = "Add Item";
            $converted_res = "false";
        }
        
        if(isset($_POST['inventory-product-id'])){
            $update = true;
        }else{
            $update = false;
        }
        
        
        if($update){
            if(isset($_POST['updateAllItems'])){
                $editItemId =  filter_input(INPUT_POST, 'inventory-product-id');
                $editItemName =  filter_input(INPUT_POST, 'inventory-product-name');
                $editItemPrice=  filter_input(INPUT_POST, 'inventory-product-price');
                $editItemQuantity = filter_input(INPUT_POST, 'inventory-product-quantity');
                $editItemDescription =  filter_input(INPUT_POST, 'inventory-product-description');
                $res = $conn->query(" UPDATE `items` SET `item_title` = '$editItemName', "
                        . "`item_price`=  '$editItemPrice', `item_quantity`=  '$editItemQuantity', "
                        . "`item_description`=  '$editItemDescription'  "
                        . "WHERE id = '$editItemId' ") or die($conn->error());
                header("location: seller-data/itemInventory.php");
                $_SESSION['message'] = "Record has been updated";
                $_SESSION['msg_type'] = "success";
            }
            
            if(isset($_POST['deleteAllitems'])){
                $editItemId =  filter_input(INPUT_POST, 'inventory-product-id');
                $editSecCount = filter_input(INPUT_POST, 'inventory-product-secImg');
                for($i = 0; $i < $editSecCount; $i++){
                    unlink("item-image/".$editItemId."s".$i.".jpg");
                }
                $conn->query("DELETE FROM `items` WHERE `id`= '$editItemId' ") 
                        or die($conn->error());
                header("location: seller-data/itemInventory.php");
                $_SESSION['message'] = "Record has been deleted!";
                $_SESSION['msg_type'] = "danger";
                
                
            }   
        }
        if($editItemId == ""){
            if(isset($_POST['updateAllItems'])){
                
                // main image upload
                $file = $_FILES['inventory-product-img'];
               
                $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];
                
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg','jpeg','png');
                
                foreach ($_FILES['inventory-product-sec-img']['tmp_name'] as $key => $secImage) {
                    $secFileName = $_FILES['inventory-product-sec-img']['name'][$key];
                    $secFileTmpName = $_FILES['inventory-product-sec-img']['tmp_name'][$key];
                    $secFileSize = $_FILES['inventory-product-sec-img']['size'][$key];
                    $secFileError = $_FILES['inventory-product-sec-img']['error'][$key];
                    $secFileType = $_FILES['inventory-product-sec-img']['type'][$key];
                    $secFileExt = explode('.', $secFileName);
                    $secFileActualExt = strtolower(end($secFileExt));
                    $secAllowed = array('jpg','jpeg','png');
                    if (in_array($secFileActualExt, $allowed)) {
                        if ($secFileError == 0) {
                            $indexSecName = $key + 1;
                            $secFileNewName = $nextAvailableProductId.'s'.$indexSecName.'.jpg';
                            $secFileDestination = 'item-image/'. $secFileNewName;  
                            $uploadResult = move_uploaded_file($secFileTmpName, $secFileDestination);
                            $editSecCount++;
                        }else{
                            $_SESSION['message'] = "Unexpected error occured. Please try "
                                    . "reuploading image";
                            $_SESSION['msg_type'] = "warning";
                        }
                    }else{
                        $_SESSION['message'] = "Data not added.Please pick an Image file "
                                . "(.jpg, .jpeg, .png)";
                        $_SESSION['msg_type'] = "warning";
                    }
                    
                }
                
                if (in_array($fileActualExt, $allowed)) {
                    if ($fileError === 0) {
                        $fileNameNew = $nextAvailableProductId.'s0'.'.jpg';
                       
                        $fileDestination = 'item-image/'.$fileNameNew;

                        move_uploaded_file($fileTmpName, $fileDestination);
                        //text data upload
                        $editItemId =  filter_input(INPUT_POST, 'inventory-product-id');
                        $editItemName =  filter_input(INPUT_POST, 'inventory-product-name');
                        $editItemPrice=  filter_input(INPUT_POST, 'inventory-product-price');
                        $editItemQuantity = filter_input(INPUT_POST, 'inventory-product-quantity');
                        $editItemDescription =  filter_input(INPUT_POST, 'inventory-product-description');
                        $conn->query("INSERT INTO `items`( `id`,`item_title`, `item_price`, `item_quantity`, `item_description`,`secondary_images` ) VALUES ('$nextAvailableProductId','$editItemName','$editItemPrice','$editItemQuantity','$editItemDescription','$editSecCount')") or die($conn->error());
                        
                        header("location: seller-data/itemInventory.php");
                        $_SESSION['message'] = "Record has been saved!";
                        $_SESSION['msg_type'] = "success";
                    }else{
                        $_SESSION['message'] = "Unexpected error occured. Please try "
                                . "reuploading image";
                        $_SESSION['msg_type'] = "warning";
                    }
                }else{
                    $_SESSION['message'] = "Data not added.Please pick an Image file "
                            . "(.jpg, .jpeg, .png)";
                    $_SESSION['msg_type'] = "warning";
                }
            } 
        }
        
        //search logic on all items search bar
        if(isset($_GET['all-item-search-button'])){
             $allItemsSearchResult =  filter_input(INPUT_GET, 'all-item-search-bar');
             $ItemSearch = $conn->query(" SELECT  `id` FROM `items` "
                      . "WHERE `item_title` LIKE '%$allItemsSearchResult%' ") 
                     or die($conn->error());
              while($searchResult=$ItemSearch->fetch_assoc()){
                  $itemResult = $searchResult['id'];
              }
              if($itemResult != ""){
                 header("Location: seller-data/itemInventory.php?edit=".$itemResult."#edit-form");
              } else {
                  header("Location: seller-data/itemInventory.php");
              }
             
        }
        
        //pending buyer editing
        //delete data in pending buyer
        if(isset($_POST['pending-edit-id'])){
            if($_POST['pending-edit-id'] != ""){
            $expectedEndDelivery = new DateTime('now');
            $expectedStartDelivery = new DateTime('now');
            date_add($expectedEndDelivery,date_interval_create_from_date_string("15 days"));    
             
            $formattedStartDate = date_format($expectedStartDelivery,"y-m-d h-m-s");
            $formattedEndDate = date_format($expectedEndDelivery,"y-m-d h-m-s");
            
            $editPendingId = filter_input(INPUT_POST, 'pending-edit-id');
            $editPendingDate = filter_input(INPUT_POST, 'pending-edit-date');
            $editPendingName = filter_input(INPUT_POST, 'pending-edit-name');
            $editPendingNum = filter_input(INPUT_POST, 'pending-edit-num');
            $editPendingOrderName = filter_input(INPUT_POST, 'pending-edit-order-name');
            $editPendingOrderQuantity = filter_input(INPUT_POST, 'pending-edit-order-quantity');
            $editPendingOrderPrice = filter_input(INPUT_POST, 'pending-edit-order-price');
            $editPendingAddress = filter_input(INPUT_POST, 'pending-edit-address');
            $editPendingNote = filter_input(INPUT_POST, 'pending-edit-note');
            
            $submitToOnDelivery =  $conn->query(" INSERT INTO `on-delivery`(
                                `delivery-id`,
                                `delivery-start`,
                                `delivery-end`,
                                `buyer-id`,
                                `date-order`,
                                `buyer-name`,
                                `buyer-number`,
                                `product-name`,
                                `product-quantity`,
                                `product-price`,
                                `buyer-address`,
                                `buyer-note`
                            )
                            VALUES(
                                '$nextAvailableDeliveryId',
                                '$formattedStartDate',
                                '$formattedEndDate',
                                '$editPendingId',
                                '$editPendingDate',
                                '$editPendingName',
                                '$editPendingNum',
                                '$editPendingOrderName',
                                '$editPendingOrderQuantity',
                                '$editPendingOrderPrice',
                                '$editPendingAddress',
                                '$editPendingNote') ")
                    or die($conn->error());

            echo $editPendingId ."<br>".
                $editPendingDate."<br>".
                $editPendingName."<br>".
                $editPendingNum ."<br>".
                $editPendingOrderName ."<br>".
                $editPendingOrderQuantity."<br>".
                $editPendingOrderPrice ."<br>".
                $editPendingAddress ."<br>".
                $editPendingNote ."<br>".
                $formattedStartDate ."<br>".
                $formattedEndDate ."<br>";    
            $getPending = $conn->query("DELETE FROM `pendingbuyer` "
                . "WHERE `buyer-id` = $editPendingId") or die($conn->error());
            $_SESSION['message'] = "Item added to 'on-delivery' database.";
            $_SESSION['msg_type'] = "success";
            header("Location: seller-data/pendingBuyer.php");
            }
        }
        
         if(isset($_POST['pending-del-id'])){
             if($_POST['pending-del-id'] != ""){
                $delPendingId = filter_input(INPUT_POST, 'pending-del-id');
                $getPending = $conn->query("DELETE FROM `pendingbuyer` "
                    . "WHERE `buyer-id` = $delPendingId") or die($conn->error());
                $_SESSION['message'] = "Data removed from database";
                $_SESSION['msg_type'] = "info";
                header("Location: seller-data/pendingBuyer.php");
             }
            
         }
        
        //deleting the delivered items
         if(isset($_POST['on-delivery-edit-id'])){
             $ondeliveryEditId = filter_input(INPUT_POST, 'on-delivery-edit-id');
             $deleteDelivery =  $conn->query("DELETE FROM `on-delivery` WHERE `delivery-id`= '$ondeliveryEditId' ")  or die($conn->error());
             $_SESSION['message'] = "Data removed from database";
             $_SESSION['msg_type'] = "success";
             header("Location: seller-data/onDelivery.php");
         }
         
    }
    
    
    
    
    //get data from pending buyer database
    if(! $conn ) {
        die('Could not connect: ' . mysql_error());
    }else {
        $getPendingBuyer = $conn->query("SELECT * FROM `pendingbuyer`") or die($conn->error());
        while($resultPendingBuyer=$getPendingBuyer->fetch_assoc()){
            $buyerId[] = $resultPendingBuyer['buyer-id'];
            $buyerOrderDate[]= $resultPendingBuyer['date-order'];
            $buyerName[] = $resultPendingBuyer['buyer-name'];
            $buyerNumber[] = $resultPendingBuyer['buyer-number'];
            $buyerProductName[] = $resultPendingBuyer['product-name'];
            $buyerProductQuantity[] = $resultPendingBuyer['product-quantity'];
            $buyerProductPrice[] = $resultPendingBuyer['product-price'];
            $buyerAddress[] = $resultPendingBuyer['buyer-address'];
            $buyerNote[] = $resultPendingBuyer['buyer-note'];
            $totalPendingBuyer++;
        }
    }
    
    
    //verifying if the computer is logged in
    if(! $conn ) {
        die('Could not connect: ' . mysql_error());
    }else {
        $checkLogin = $conn->query("SELECT * FROM `seller-account`") or die($conn->error());
         while($searchResult=$checkLogin->fetch_assoc()){
             if(isset($_POST['login-button'])){
                 if($loginName == $searchResult['login_name']
                    && $loginPass == $searchResult['login_pass']){
                     $_SESSION['login'] = "granted";
                     header("Location: ./seller-data/itemInventory.php");
                     exit();
                 } else {
                     include './seller.php';
                 }
             }
             
         }
    }
    //search method
    if(isset($_GET['search-button'])){
        if(! $conn ) {
            die('Could not connect: ' . mysql_error());
          }else {
              $searching = $conn->query(" SELECT  `item_title`,`id`,`item_price`,"
                      . " `item_quantity`, `item_description`, `secondary_images` FROM `items` "
                      . "WHERE `item_title` LIKE '%$searchItem%' ") or die($conn->error());
              
              while($searchResult=$searching->fetch_assoc()){
                    $searchedItemName[] = $searchResult['item_title'];
                    $searchedItemId[] = $searchResult["id"];
                    $searchedItemPrice[] = $searchResult["item_price"];
               }
               //header("Location: ../searched-results.php");
               include '../searched-results.php';
          }
    }
    
    
    
    
   
   
   
   //clicking an item and setting the id number 'currentviewid' to where the user clicks
   //the id number defines what the data should be displayed
   //if the id is invalid(id does not found on database) the error will be shown
   if(isset($_GET['n'])){
        if (filter_input(INPUT_GET, "n", FILTER_VALIDATE_INT) === 0 ){
            echo("Integer is not valid");
        } else {
            $currentViewId = filter_input(INPUT_GET, 'n');
            $_SESSION["current-page"] = $currentViewId;
            $currentViewImg = "item-image/".$currentViewId."s0.jpg";
            for($x = 0; $x <= $id; $x++){
                if($id[$x] == $currentViewId){
                    $currentViewTitle = $title[$x];
                    $currentViewPrice = $price[$x];
                    $currentViewSecImages = $secImages[$x];
                    $currentViewQuantity = $quantity[$x];
                    $currentViewDescription = $decription[$x];
                    break;
                }
            } 
            include './product-view.php';
        }
   }
   
   //filtering and getting the data from the COD form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['user-save'])){
           $_SESSION['scroll-form'] = "#buying-section"; 
           if(empty($userName)){
               $nameError = "Please insert your name.";
           }elseif (is_numeric($userName)) {
               $nameError = "Please enter a valid name";
           }
           
           if(empty($userNumber) || strlen($userNumber) < 3){
               $numberError = "Please enter you mobile number.";
           }elseif(strlen($userNumber) != 11 || !is_numeric($userNumber)){
               $numberError = "Mobile number should be 11 numeric characters.";
           }
           
           if(empty($userAddress)){
               $addressError = "Please enter your address.";
           }
           
           if(empty($userMessage)){
               $messageError = "Please click 'buy now' on the top to generate "
                       . "message to seller.";
           }
           if(empty($nameError) & empty($numberError) & empty($addressError) &
                empty($messageError)){
                    if(! $conn ) {
                        die('Could not connect: ' . mysql_error());
                     }else {
                        $insertBuyerPending = $conn->query("INSERT INTO `pendingbuyer`(`buyer-name`, "
                                . "`buyer-number`, `buyer-address`, `buyer-note`,"
                                . " `product-name`,"
                                . "`product-quantity`, `product-price`) "
                                . "VALUES ('$userName','$userNumber','$userAddress',"
                                . "'$userNote', '$userProductName','$userProductQuantity',"
                                . "'$userProductPrice')") or die($conn->error);
                        
                        if($insertBuyerPending){ //check if the sql query is successful
                            header("location: success.php");
                        }else {
                            die('Could not connect: ' . mysql_error());
                            header("location: product-view.php");
                        }
                     }        
           }else {
                $currentViewId = $_SESSION['current-page'];
                $currentViewImg = "item-image/".$currentViewId."s0.jpg";
                for($x = 0; $x <= $id; $x++){
                    if($id[$x] == $currentViewId){
                        $currentViewTitle = $title[$x];
                        $currentViewPrice = $price[$x];
                        $currentViewSecImages = $secImages[$x];
                        $currentViewQuantity = $quantity[$x];
                        $currentViewDescription = $decription[$x];
                        break;
                    }
                }
                include 'product-view.php';
           }
           //echo $userName.$userNumber.$userAddress.$userMessage.$userNote;     
         }
    }
   
 //logging out - deleting the session
 if(isset($_POST['log-out-button'])){
     session_destroy();
     header("Location: ../index.php");
 }   

 
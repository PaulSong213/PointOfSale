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
        <title>Navigation</title>
         <link href="./seller-data-style.css" rel="stylesheet">
         <link href="../main.css" rel="stylesheet">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style>
            .seller-nav {
                  background-color: #ffffff;
                  padding: 0.5rem 2rem;
                  display: flex;
                  flex-flow: row;
                  justify-content: space-between;
                  align-items: center;
              }
              
              .seller-nav a {
                  display: flex;
                  flex-flow: row;
                  text-decoration: none;
                  color: #3c8c30;
              }
              .seller-nav ion-icon {
                  font-size: 1.5rem;
                  align-self: flex-start;
              }
              
              .seller-nav input {
                  color: #3c8c30;
                  border: #3c8c30 solid 1px;
              }
              
              .seller-nav h5 {
                  font-family: 'Barlow Condensed', 'David Libre', Arial, sans-serif;
                  font-weight: 400;
                  text-transform: uppercase;
              }
              
        </style>
    </head>
    <body>
        <nav class="seller-nav">
                <a href="../../index.php"><ion-icon name="logo-html5"></ion-icon> 
                    <h5> Bili Na!</h5></a>
                <form action="../process.php" method="POST">
                    <input type="submit" value="Log out" name="log-out-button" />
                </form>       
        </nav>
        
     <!--    ion icons-->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>   
    </body>
</html>

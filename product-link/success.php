<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Request Submitted</title>
        <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Barlow:600|Rasa:300,500" rel="stylesheet">
        <link href="product-style.css" rel="stylesheet">
        <link href="../main.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style>
            
            body {
                background-color: #ffffff;
            }
            .card {
                background-color: #ffffff;
                width: fit-content;
                position: absolute;
                top: -50%;
                left: 50%;
                transform: translate(-50%, -30%);
                display: flex;
                flex-flow: column;
                align-items: center;
                border: rgba(0,0,0,0.1) 1px solid;
                border-radius: 1rem;
                box-shadow: 3px 10px 25px 3px #888888;
                transition: top ease-in-out 1s;
            }
            .card img {
                max-width:200px; 
                margin: 1rem 1rem;
            }
            
            .card button {
                width: 100%;
                color: white;
                background-color: #6AC258;
                font-size: 1.2rem;
                border: #ffffff 1px solid;
                padding: 1rem 1rem;
                border-radius:0 0 1rem 1rem ;
                outline: none;
                margin: 0;
            }
            
            .card a{
                width: 100%;
            }
            
            .card h3 {
                text-align: center;
            }
            
            .card button:hover {
                background-color:#54b340; 
            }
            
        </style>
    </head>
    <body>
        <?php
        
        ?>
        <div class="card" id="success-card">
            <h3>Great! We will call you later <br> to confirm the order.</h3>
            <img src="item-image/success-logo.png" alt="success logo">
            <a href="../index.php"><button>Shop Again</button></a>
        </div>
        
        <script>
            function move(){
                document.getElementById('success-card').style.top = "30%";
            }
            //window.onload = move();
            
            $(document).ready(function(){
            // your code
            $('.card').css("top", "30%");
            });
        </script>
    </body>
</html>

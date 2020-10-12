<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Seller | Bili na</title>
        <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Barlow:600|Rasa:300,500" rel="stylesheet">
        <link href="../main.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <style>
        body {
                background-color: #ffffff;
            }
            .card {
                background-color: #ffffff;
                width: fit-content;
                position: absolute;
                top: 30%;
                left: 50%;
                transform: translate(-50%, -30%);
                display: flex;
                flex-flow: column;
                align-items: center;
                border: rgba(0,0,0,0.1) 1px solid;
                border-radius: 1rem;
                box-shadow: 3px 10px 25px 3px #888888;
                padding: 2rem 2rem;
            }
            .card img {
                max-width:100px; 
                border: #6AC258 solid 1px;
                border-radius: 3rem;
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
                
            }
            
            .card h3 {
                text-align: center;
                text-transform: capitalize;
            }
            
            .card form {
                display: flex;
                flex-flow: column;
                padding: 1rem 1rem;
            }
            
            .card input {
                margin: 0.5rem 1rem;
                padding: 0.5rem 0.5rem;
                border: #888888 solid 1px;
                border-radius: 0.5rem;
                font-size: 1rem;
            }
            
            #login-button {
                background-color: #41D841;
                border: #6AC258 solid 1px;
                color: #ffffff;
                font-weight: 900;
                text-transform: uppercase;
                transition:  ease-in-out 650ms;
            }
            
            .card input:hover {
                border: #6AC258 solid 1px;
            }
            
            #login-button:hover {
               border: #4787ed solid 1px; 
               background-color: #4ff74f;
               color: rgba(0,0,0,0.5);
            }
            
    </style>
    <body>
        <?php
        require_once 'process.php';
        ?>
        <div class="card container-fluid" id="success-card">
            <h3>Log In</h3>
            <a href="../index.php"><img src="log-in-logo.png"
                alt="success logo"></a>
            <form action="process.php" method="POST">
                <input type="text" name="login-name" placeholder="username"/>
                <input type="password" name="login-pass" placeholder="password"/>
                <input type="submit" name="login-button" value="Log In" 
                       id="login-button"/>
            </form>
        </div>
        
        <script>

        </script>
    </body>
</html>

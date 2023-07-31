<?php

include '../inc/connect.php';
session_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Success</title>
</head>

<style>
    #nbar{
        background-color: #004460;
        border-radius:10px;
    }
    a{
        outline: solid 2px #fff;
        padding:5px;
        border-radius:8px;
        transition: 0.4s;
        color: white;
        text-decoration:none;
    }

    a:hover{
        background-color:#fff;
        color:#000;
        font-size:17px;
        padding:8px;


    }

    center{
        margin-top: 100px;
        
    }
</style>
<body>

    <header>
        <nav class="navbar ">
            <div class="container  text-light p-4 "id="nbar">
                
                    <div > <a  href="../index.php">Home</a></div>
                    <div > <a  href="clearance.php">Request clearance</a></div>
                
            </div>
        </nav>
    </header>


    <main>

    <div class="container">
        <?php
        

            echo'
             <center > 
             <div class="container aling-items-center ">
             <h1>Hello '.$_SESSION['firstname'].' '.$_SESSION['lastname'].' !</h1>
              <p style="font-size: 20px;"> Welcome to REV online results verification. <br> You can now successfully request for your results clearance  </p>
             </div>
             
             </center>
            ';
        
      

        ?>
    </div>
    </main>
    
</body>
</html>
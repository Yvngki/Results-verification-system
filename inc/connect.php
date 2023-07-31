<?php
 
$servername = "localhost";
$username ="root";
$password = "";
$dname = "rev";

$conn = mysqli_connect($servername,$username,$password,$dname);

if(!$conn){
    die("CONNECTION ERROR:".mysqli_connect_error());
}



?>
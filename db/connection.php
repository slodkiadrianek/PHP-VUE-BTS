<?php 
$username = "root"; 
$password = ""; 
$host = "localhost"; 
$dbname = "rentCar"; 

$conn = mysqli_connect($host, $username, $password, $dbname); 

if (!$conn) { 
    die("Connection failed: ". mysqli_connect_error()); 
    } 
<?php 

$hostname = "localhost";
$user = "root";
$password = "";
$dbname = "wypozyczalnia_samochodow";

$conn = new mysqli($hostname, $user, $password, $dbname);

if(!$conn){
    die('Database error'. mysqli_connect_error());
}

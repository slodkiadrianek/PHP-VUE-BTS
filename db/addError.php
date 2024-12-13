<?php 
session_start();
require '../db/connections.php';
if(!empty($_POST['error_type'])){
    $query = $conn->prepare("INSERT INTO errors (error_type, error_description) VALUES (?,?)");
    echo 'haj';
    if($query){
        $query->bind_param('ss', $_POST['error_type'], $_POST['error_description']);
        $query -> execute();
        $_SESSION['status']['repo'] = 'true';
        header('location: /PHP-VUE-BTS/dashboard/support.php');
    }
}
//Nie działa strona
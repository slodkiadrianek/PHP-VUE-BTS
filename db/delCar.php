<?php 
session_start();
require '../db/connections.php';
if(!empty($_POST['id_samochodu'])){ 
    $id = (int) $_POST['id_samochodu'];
    $query = $conn->prepare("DELETE FROM samochody WHERE id_samochodu = ?;");
    if($query){
        $query->bind_param("i", $id);
        $query->execute();
        $_SESSION['status']['repo'] = ['true', 'Poprawnie usunięto samochód'];
        header('location: /PHP-VUE-BTS/employee/dashboard/cars.php');
    }
}
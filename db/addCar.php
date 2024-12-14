<?php 
session_start();
require '../db/connections.php';
require  "../inc/function.php";
if(!empty($_POST)){
    $data = dataCheck($_POST);
    $values = array_values($data);
    $query = $conn->prepare("INSERT INTO samochody (marka, model, data_prod, dostepnosc, cena_doba) VALUES (?,?,?,?,?)");
    echo 'haj';
    if($query){
        $query->bind_param('sssii', ...$values);
        $query -> execute();
        $_SESSION['status']['repo'] = ['true', 'Poprawnie dodano samochód'];
        header('location: /PHP-VUE-BTS/employee/dashboard/cars.php');
    }
}
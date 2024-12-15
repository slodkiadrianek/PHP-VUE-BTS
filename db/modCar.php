<?php 
session_start();
require '../db/connections.php';
require  "../inc/function.php";
if(!empty($_POST)){
    $data = dataCheck($_POST);
    $query = $conn->prepare("UPDATE samochody
SET marka = ?, model = ? , data_prod = ?, dostepnosc = ?, cena_doba = ?
WHERE id_samochodu = ?;");
    echo 'haj';
    if($query){
        $query->bind_param('sssiii', $data['marka'], $data['model'], $data['data_prod'], $data['dostepnosc'], $data['cena_doba'], $data['id_samochodu']);
        $query -> execute();
        $_SESSION['status']['repo'] = ['true', 'Poprawnie zaaktualizowano  samochód'];
        header('location: /PHP-VUE-BTS/employee/dashboard/cars.php');
    }
}
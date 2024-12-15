<?php 
session_start();
require '../db/connections.php';
if(!empty($_POST['id_samochodu'])){ 
    var_dump($_POST['id_samochodu']);
    $currentDate = date("Y-m-d");
    $checkQuery = $conn -> prepare("SELECT * FROM dane_wypozyczen JOIN wypozyczenia ON dane_wypozyczen.id_wypozyczenia = wypozyczenia.id_wypozyczenia WHERE id_samochodu = ? AND data_zwr > ?");
    if($checkQuery){
        $checkQuery->bind_param('is', $_POST['id_samochodu'], $currentDate);
        $checkQuery->execute();
        $results = $checkQuery->get_result();
        $data = [];
        while($row = $results->fetch_assoc()){
            $data[] = $row;
        }
    }
    if(count($data) > 0){
        $_SESSION['status']['repo'] = ['false', 'Nie można usunąć samochodu'];
        header('location: /PHP-VUE-BTS/employee/dashboard/cars.php');
    }
    $query = $conn->prepare("DELETE FROM samochody WHERE id_samochodu = ?;");
    if($query){
        $query->bind_param("i", $_POST['id_samochodu']);
        $query->execute();
        $_SESSION['status']['repo'] = ['true', 'Poprawnie usunięto samochód'];
        header('location: /PHP-VUE-BTS/employee/dashboard/cars.php');
    }
}
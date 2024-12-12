<?php
session_start();
require "./connections.php";
require '../inc/function.php';

if(!empty($_POST)){
    $data = dataCheck($_POST);
    $exist = $conn->prepare("Select * from klienci Where email_klienta = ?");
    if($exist){
        $exist->bind_param('s', $data['email_klienta']);
        $exist->execute();
        $results=$exist->get_result();
        while($row = $results->fetch_assoc()){
            $existData[] = $row;
        }
        $exist->close();
    }
    if(count($existData)> 0){
        $_SESSION['status'] = 'Użytkownik już istnieje.';
        header('location: ../register.php');
    }else{
        $data['haslo_klienta'] = password_hash($data['haslo_klienta'], PASSWORD_BCRYPT);
        $values = array_values($data);
    
        $query = $conn->prepare("INSERT INTO klienci (
            imie_klienta,
            nazwisko_klienta,
            ulica_klienta,
            numer_domu_klienta,
            miasto_klienta,
            kod_klienta,
            telefon_klienta,
            email_klienta,
            haslo_klienta
        ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if($query){
            var_dump(...$values);
            $query->bind_param('sssssssss', ...$values);
            $query->execute();
            $query->close();
            $_SESSION['status'] = 'Pomyślnie Utworzono Użytkownika';
            header('location: ../login.php');
        }
    }
}else{
    die($conn->error);
}
$conn->close();

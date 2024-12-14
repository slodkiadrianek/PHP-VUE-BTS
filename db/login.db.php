<?php
session_start();
require __DIR__ . '/connections.php';
require  "../inc/function.php";
if(!empty($_POST) && !empty($_GET)){
    $type = $_GET['type'];
    $from = 'klienci';
    $sufix = 'klienta';
    if($_GET['type'] === 'employee'){
        $from= 'pracownicy';
        $sufix = 'pracownika';
    }
    $data = dataCheck($_POST);
    $query  = $conn -> prepare("Select * from {$from} where email_{$sufix} = ?");
    if($query){
        $query->bind_param('s', $data["email_{$sufix}"]);
        $query->execute();
        $results = $query->get_result();
        $existData = [];
        while($row = $results->fetch_assoc()){
            $existData = $row;
        }
        $query->close();
    }
    if(count($existData)  === 0){
        $_SESSION['status']['email'] = 'Użytkownik z podanym adresem nie istnieje';
        header("location: ../{$type}/login.php");
    }
    $passwordCheck = password_verify($data["haslo_{$sufix}"], $existData["haslo_{$sufix}"]);
    if(!$passwordCheck){
        $_SESSION['status']['pass'] = 'Podane hasło jest nieprawidłowe';
        header("location: ../{$type}/login.php");
        exit;
    }
    $_SESSION[$type] = $existData;
    header("location: ../{$type}/dashboard.php");
}
$conn->close();
// header('location: ../index.php');


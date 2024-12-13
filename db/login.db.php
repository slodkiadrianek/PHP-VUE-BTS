<?php
session_start();
require __DIR__ . '/connections.php';
require  "../inc/function.php";
var_dump($_SESSION['user']);
if(!empty($_POST) && !empty($_GET)){
    $data = dataCheck($_POST);
    $query  = $conn -> prepare("Select * from {$_GET['type']} where email_klienta = ?");
    if($query){
        $query->bind_param('s', $data['email_klienta']);
        $query->execute();
        $results = $query->get_result();
        $existData = [];
        while($row = $results->fetch_assoc()){
            $existData = $row;
        }
        $query->close();
    }
    if(count($existData)  ===0){
        $_SESSION['status']['email'] = 'Użytkownik z podanym adresem nie istnieje';
        header('location: ../login.php');
    }
    $passwordCheck = password_verify($data['haslo_klienta'], $existData['haslo_klienta']);
    if(!$passwordCheck){
        $_SESSION['status']['pass'] = 'Podane hasło jest nieprawidłowe';
        header('location: ../login.php');
        exit;
    }
    $_SESSION['user'] = $existData;
    header('location: ../userDashboard.php');
}
$conn->close();
header('location: ../login.php');


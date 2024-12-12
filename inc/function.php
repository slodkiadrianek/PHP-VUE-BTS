<?php

function e(string $text):string{
    return htmlspecialchars($text, ENT_QUOTES, true);
}

function dataCheck(array $data){
    foreach($data as $key => $value){
        if(empty($value)){
            header('location: ../index.php');
        }
    }
    return $data;
}
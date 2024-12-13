<?php 
function errorPass(string $type, string $status, string $response = ''):void{
    if($type === 'text'){
        if(isset($_SESSION['status'][$status])){
            echo $_SESSION['status'][$status];
            unset($_SESSION['status']);
        }else{
            echo  $response;
        }
    }
    if($type === 'class'){
        if(isset($_SESSION['status'][$status])){
            echo 'form-control border border-danger ';
        }else{
            echo 'form-control';
        }
    }
}

<?php 
session_start();
if($_GET['type']==='user'){
    header('location: ../user/login.php');
}
header('location: ../employee/login.php');
unset($_SESSION);
session_destroy();

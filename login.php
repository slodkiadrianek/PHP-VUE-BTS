<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if($_SESSION){
        echo $_SESSION['status'];
        unset($_SESSION['status']);
    }
    ?>
    <h1>Login</h1>
</body>
</html>
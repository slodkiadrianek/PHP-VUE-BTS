<?php 
session_start();
require '../views/header.php';
require '../inc/statusFunction.php';
if(!empty($_SESSION['user']))
{
   return header('location: /PHP-VUE-BTS/user/dashboard.php');
}
$sufix = 'klienta';
?>
<body>
     <main class="container d-flex justify-content-center">
         <form style="width: 50%;" class="border border-dark rounded p-3 m-1"   action="../db/login.db.php?type=user" method="post">
             <?php 
                require '../views/loginForm.php';
             ?>
         </form>
     </main>
 </body>
 </html>
<?php 
session_start();
require '../views/header.php';
require '../inc/statusFunction.php';
if(!empty($_SESSION['employee']))
{
   return header('location: /PHP-VUE-BTS/employee/dashboard.php');
}
$sufix = 'pracownika';

?>
<body>
     <main class="container d-flex justify-content-center">
         <form style="width: 50%;" class="border border-dark rounded p-3 m-1"   action="../db/login.db.php?type=employee" method="post">
             <?php 
                require '../views/loginForm.php';
             ?>
         </form>
     </main>
 </body>
 </html>
<?php 
session_start();
require __DIR__ . '/views/header.php';
require __DIR__ . '/inc/statusFunction.php';
if(!empty($_SESSION['user']))
{
   return header('location: /PHP-VUE-BTS/userDashboard.php');
}
?>
<body>
     <main class="container d-flex justify-content-center">
         <form style="width: 50%;" class="border border-dark rounded p-3 m-1"   action="./db/login.db.php?type=klienci" method="post">
             <h1>Logowanie</h1>
             <div class="form-group">
                 <label for="exampleInputEmail1" >Adres email</label>
                 <input type="email" name="email_klienta" class="<?php errorPass('class', 'email',)?>"  placeholder="<?php errorPass('text', 'email', 'Wpisz email')?>">
             </div>
             <div class="form-group">
                 <label for="exampleInputPassword1" >Hasło</label>
                 <input type="password" class="<?php errorPass('class', 'pass')?>" id="exampleInputPassword1" 
                 name="haslo_klienta" placeholder="<?php errorPass('text', 'pass', 'Wpisz hasło')?>">
             </div>
         <button type="submit" class="btn btn-primary">Zaloguj  się</button>
         </form>
     </main>
 </body>
 </html>
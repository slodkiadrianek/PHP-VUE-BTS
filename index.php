<?php 
require __DIR__ . "/views/header.php"
?>
<body class="bg-dark">
    <header class=" p-3">
        <h1 class="display-1 text-center text-light">Wypożyczalnia samochodów</h1>
    </header>
    <main class="d-flex flex-column  align-items-center">
        <div class="d-flex flex-column  justify-content-center align-content-center">
            <h2 class="text-center text-light">Użytkownik</h2>
            <a href="login.php?type='user'" type="button" class="btn btn-primary m-2"  >Zaloguj się</a>
            <a href="register.php" type="register" class="btn btn-primary m-2">Zarejestruj się</a>
        </div>
        <div class="d-flex flex-column  justify-content-center align-content-center">
            <h2 class="text-center text-light">Pracownik</h2>
            <a href="login?type='employee'" type="button" class="btn btn-primary m-2"  >Zaloguj się</a>
        </div>
    </main>
    <script>
        window.app = new Vue({
            el:"#app"
        })
    </script>
</body>
</html>
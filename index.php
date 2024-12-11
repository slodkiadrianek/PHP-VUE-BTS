<?php 
require __DIR__ . "/views/header.php"
?>

<body class="bg-dark">
    <div class="container" id="app">
        <div class="column">
            <div class="col text-center m-2">
                <b-button class="row border border-primary" variant="primary" size="lg" href="login.php">Zaloguj się</b-button>
            </div>
            <div class="col text-center m-2">
            <b-button class="row border border-primary" variant="primary" size="lg"  href="./register.php">Zarejestruj się</b-button>
            </div>

        </div>
     <script>
        window.app = new Vue({
            el: "#app",
        })
     </script>
  </body>
</html>
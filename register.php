<?php 
session_start();
require __DIR__ . "/views/header.php";
require __DIR__ . "/db/connections.php"
?>
<body class="bg-dark">
    <header>
        <h1 class="text-light text-center">Rejestracja</h1>
    </header>
    <main>
        <?php 
        if($_SESSION){
            echo $_SESSION['status'];
            unset($_SESSION['status']);
        }?>
        <form class="d-flex flex-column align-items-center " action="./db/register.db.php" method="post">
            <input class="m-2 rounded border p-2" type="text" name="imie_klienta" placeholder="Wpisz imię">
            <input class="m-2 rounded border p-2" type="text" name="nazwisko_klienta" placeholder="Wpisz nazwisko">
            <input class="m-2 rounded border p-2" type="text" name="ulica_klienta" placeholder="Wpisz ulicę">
            <input class="m-2 rounded border p-2" type="text" name="numer_domu_klienta" placeholder="Wpisz numer domu">
            <input class="m-2 rounded border p-2" type="text" name="miasto_klienta" placeholder="Wpisz miasto zamieszkania">
            <input class="m-2 rounded border p-2" type="text" name="kod_klienta" id="" placeholder="Wpisz kod miasta">
            <input class="m-2 rounded border p-2" type="tel" name="telefon_klienta" id="" placeholder="Wpisz numer telefonu">
            <input class="m-2 rounded border p-2" type="email" name="email_klienta" id="" placeholder="Wpisz email">
            <input class="m-2 rounded border p-2" type="password" name="haslo_klienta" min="8" max="20" placeholder="Wpisz hasło" >
            <button type="submit" class="btn btn-primary">Zarejestruj się</button>
        </form>
    </main>
</body>
</html>
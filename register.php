<?php 
session_start();
require __DIR__ . "/views/header.php";
require __DIR__ . "/db/connections.php"
?>
<body >
        <main class="container d-flex justify-content-center">
            <?php 
        if($_SESSION){
            echo $_SESSION['status'];
            unset($_SESSION['status']);
        }?>
        <form style="width: 50%;" class="border border-dark rounded p-3 m-1"   action="./db/register.db.php" method="post">
            <h1 >Rejestracja</h1>
            <div class="form-group">
                <label for="exampleInputEmail1" >Imię</label>
                <input type="text" name="imie_klienta" class="form-control"  placeholder="Wpisz imię" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" >Nazwisko</label>
                <input type="text" name="nazwisko_klienta" class="form-control"  placeholder="Wpisz nazwisko" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" >Ulica zamieszkania</label>
                <input type="text" name="ulica_klienta" class="form-control"  placeholder="Wpisz ulicę zamieszkania" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" >Numer domu</label>
                <input type="text" name="numer_domu_klienta" class="form-control"  placeholder="Wpisz numer domu" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" >Miasto</label>
                <input type="text" name="miasto_klienta" class="form-control"  placeholder="Wpisz miasto zamieszkania" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" >Kod pocztowy</label>
                <input type="text" name="kod_klienta" class="form-control"  placeholder="Wpisz kod pocztowy" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" >Numer telefonu</label>
                <input type="tel" name="telefon_klienta" class="form-control"  placeholder="Wpisz numer telefonu" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" >Adres email</label>
                <input type="email" name="email_klienta" class="form-control"  placeholder="Wpisz email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" >Hasło</label>
                <input type="password" class="form-control" name="haslo_klienta" id="exampleInputPassword1" placeholder="Wpisz hasło" required>
            </div>
        <button type="submit" class="btn btn-primary">Zarejestruj się</button>
        </form>
    </main>
</body>
</html>
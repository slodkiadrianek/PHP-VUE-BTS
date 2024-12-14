<?php 
session_start();
require  "../views/header.php"
?>
<body style="overflow:hidden;">
    <?php 
            $dashboardTitle = "Panel pracownika";
            require '../views/dashboardHeader.php';
    ?>
    <main id="app" class="d-flex flex-row" style="width: 100%; height:95vh; ">
        <?php 
        $whichActive = 'userPanel';
        require  '../views/sideBar.php';
        ?>
        <section style="width: 80%;">
            <div class="container m-1">
                <div class="row"> <h1>Witaj <?php echo $_SESSION['employee']['imie_pracownika'] . ' ' . $_SESSION['employee']['nazwisko_pracownika'];  ?></h1></div>
            </div>
            <div class="container m-1 ">
                <div class="row">
                    <h2> Dane osobowe:</h2>
                </div>
                <div class="row mb-3">
                    <div class="col-sm mr-5 ">
                        <h3 class="d-inline">Adres email: <?php echo $_SESSION['employee']['email_pracownika']; ?></h3>
                    </div>
                    <div class="col-sm">
                    <h3 class="d-inline">Numer telefonu: <?php echo $_SESSION['employee']['telefon_pracownika']; ?></h3>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm mr-5">
                        <form action="../db/logout.db.php" method="post">
                            <button class="btn btn-danger" type="submit">Wyloguj się</button>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </main>
    <script>
        const app = new Vue({
            el: '#app',
            methods:{
                redirect: function(redirect){
                    window.location.replace(`${redirect}`)
                }
            }
        })
    </script>
</body>
</html>
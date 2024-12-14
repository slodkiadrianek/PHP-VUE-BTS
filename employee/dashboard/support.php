<?php 
session_start();
require  "../../views/header.php";
?>
<body style="overflow:hidden;">
    <?php 
        $dashboardTitle = "Pomoc techniczna";
        require '../../views/dashboardHeader.php';
    ?>
<main id="app" class="d-flex flex-row" style="width: 100%; height:95vh; ">
        <?php 
            $whichActive = 'support';
            require "../../views/sideBar.php";
        ?>
        <section class="" style="width:80%;">
            <?php if(!empty($_SESSION['status']['repo'])): ?>
                <?php unset( $_SESSION['status']['repo'] ); ?>
                <div class="alert alert-success m-1" role="alert">
                    Poprawanie zgłoszono problem
                </div>
             <?php endif; ?>
        <form style="width: 100%;" class="border border-dark rounded p-3  m-1"   action="../../db/addError.php" method="post">
            <h2 >Formualarz zgłaszania błędów</h2>
            <div class="form-group mt-2">
            <label for="typeOfError">Wybierz rodzaj problemu</label>
                <select id="typeOfError" name="error_type" class="form-control">
                    <option value="website_error">Problem z stroną</option>
                    <option value="payment_error">Problem z płatnością</option>
                    <option value="rental_error">Problem z moimi wypożyczeniami</option>
                    <option value="invoice_error">Problem z fakturami</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="descriptionError">Dokładny opis problemu</label>
                <textarea class="form-control" name="error_description" id="descriptionError" rows="6" style="resize: none;" placeholder="Opisz problem" maxlength="80" ></textarea>
             </div>
         <button type="submit" class="btn btn-primary">Zgłoś problem</button>
         </form>
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
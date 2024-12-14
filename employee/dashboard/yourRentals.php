<?php 
 require  "../../views/header.php";
 session_start();

?>
<body style="overflow:hidden;">
<?php 
    $dashboardTitle = "Twoje wypożyczenia";
    require '../../views/dashboardHeader.php';
?>
<main id="app" class="d-flex flex-row" style="width: 100%; height:95vh; ">
        <?php 
        $whichActive = "yourRentals";
        require '../../views/sideBar.php'
        ?>

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
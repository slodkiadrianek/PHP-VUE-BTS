<?php 
session_start();
require "../../views/header.php";
require "../../db/connections.php";

$query = $conn->prepare('Select * from samochody');
if($query){
    $query->execute();
    $result = $query->get_result();
    $data = [];
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
}
?>
<body style="overflow:hidden;">
    <?php 
        $dashboardTitle = "Samochody";
        require '../../views/dashboardHeader.php';
    ?>
    <main id="app" class="d-flex flex-row" style="width: 100%; height:95vh; ">
        <?php 
            $whichActive = 'cars';
            require  "../../views/sideBar.php";
        ?>
        <section style="width:80%;">
           <?php 
                require '../../views/carsTable.php';
           ?>
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
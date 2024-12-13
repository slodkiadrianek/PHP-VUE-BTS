<?php 
require "../views/header.php";
require "../db/connections.php";

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
        require '../views/dashboardHeader.php';
    ?>
    <main id="app" class="d-flex flex-row" style="width: 100%; height:95vh; ">
        <?php 
            $whichActive = 'cars';
            require  "../views/sideBar.php";
        ?>
        <section style="width:80%;">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col ">#</th>
                        <th class="text-center" scope="col">Marka</th>
                        <th class="text-center" scope="col">Model</th>
                        <th class="text-center" scope="col">Data produkcji</th>
                        <th class="text-center" scope="col">Cena za dobę</th>
                        <th class="text-center" scope="'col">Dostępne</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $key => $value): ?>
                        <tr>
                            <th class="text-center" scope="row"><?= $key+1 ?></th>
                            <td class="text-center"><?= $value['marka'] ?></td>
                            <td class="text-center"><?= $value['model'] ?></td>
                            <td class="text-center"><?= $value['data_prod'] ?></td>
                            <td class="text-center"><?= $value['cena_doba'] ?></td>
                            <td class="text-center"><?= $value['dostepnosc'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
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
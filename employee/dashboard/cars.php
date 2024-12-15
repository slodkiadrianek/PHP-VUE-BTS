<?php 
session_start();
require "../../views/header.php";
require "../../db/connections.php";

$query = $conn->prepare('Select * from samochody limit 10');
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
        <section style="width:80%; overflow-y:scroll;" class="mb-5">
        <?php if(!empty($_SESSION['status']['repo'][0])): ?>
            <div class="alert alert-<?php if($_SESSION['status']['repo'][0] === 'true'){
                echo 'success';
            }else{
                echo 'danger';
            } ?> m-1" role="alert">
            <?php echo $_SESSION['status']['repo'][1]; ?>
            </div>
            <?php unset( $_SESSION['status']['repo']); ?>
             <?php endif; ?>
           <?php 
                require '../../views/carsTable.php';
           ?>
           <div class="d-flex flex-row justify-content-between mr-1 ml-1"> 
               <!-- Dodaj samochód button -->
               <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#addModal">
                  Dodaj samochód
               </button>
               <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                           <div class="modal-content">
                               <!-- Modal Header -->
                               <div class="modal-header">
                                   <h5 class="modal-title" id="modalTitle">Dodaj samochód</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <!-- Modal Body -->
                               <div class="modal-body">
                                   <form style="width: 100%;"    action="../../db/addCar.php" method="post">
                                       <div class="form-group mt-2">
                                           <label for="descriptionError">Marka</label>
                                           <input type="text" class="form-control" name="marka" id="descriptionError" rows="6" style="resize: none;" placeholder="Wpisz markę" maxlength="80" ></>
                                       </div>
                                       <div class="form-group mt-2">
                                           <label for="descriptionError">Model</label>
                                           <input type="text" class="form-control" name="model" id="descriptionError" rows="6" style="resize: none;" placeholder="Wpisz model" maxlength="80" ></>
                                       </div>
                                       <div class="form-group mt-2">
                                           <label for="descriptionError">Rok produkcji</label>
                                           <input type="number" min="1970" max="<?php echo date("Y"); ?>" class="form-control" name="data_prod" id="descriptionError" rows="6" style="resize: none;" placeholder="Wpisz rok produkcji" maxlength="80" ></>
                                       </div>
                                       <div class="form-group mt-2">
                                           <label for="descriptionError">Liczba samochodów</label>
                                           <input type="number" min="0" max="10" class="form-control" name="dostepnosc" id="descriptionError" rows="6" style="resize: none;" placeholder="Wpisz liczbę samochodów" maxlength="80" ></>
                                       </div>
                                       <div class="form-group mt-2">
                                           <label for="descriptionError">Cena za dobe</label>
                                           <input type="number" min="0" max="500" class="form-control" name="cena_doba" id="descriptionError" rows="6" style="resize: none;" placeholder="Wpisz cenę za dobe" maxlength="80" ></>
                                       </div>
                                       <button type="submit" class="btn btn-primary">Dodaj samochód</button>
                                   </form>
                               </div>
   
                               <!-- Modal Footer -->
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                               </div>
                           </div>
                       </div>
                   </div>
               <nav aria-label="...">
     <ul class="pagination">
       <li class="page-item disabled">
         <span class="page-link">Previous</span>
       </li>
       <li class="page-item"><a class="page-link" href="#">1</a></li>
       <li class="page-item active" aria-current="page">
         <span class="page-link">2</span>
       </li>
       <li class="page-item"><a class="page-link" href="#">3</a></li>
       <li class="page-item">
         <a class="page-link" href="#">Next</a>
       </li>
     </ul>
   </nav>
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
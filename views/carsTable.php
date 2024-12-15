<?php 
session_start()
?>

<table class="table">
    <thead>
        <tr>
            <th class="text-center" scope="col ">#</th>
            <th class="text-center" scope="col">Marka</th>
            <th class="text-center" scope="col">Model</th>
            <th class="text-center" scope="col">Data produkcji</th>
            <th class="text-center" scope="col">Cena za dobę</th>
            <th class="text-center" scope="col">Dostępne</th>
            <?php if(isset($_SESSION['employee'])):?>
                <th class="text-center" scope="col">Akcje</th>
            <?php endif;?>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $key => $value): ?>
        <tr>
            <th class="text-center" scope="row"><?= $key + 1 ?></th>
            <td class="text-center"><?= $value['marka'] ?></td>
            <td class="text-center"><?= $value['model'] ?></td>
            <td class="text-center"><?= $value['data_prod'] ?></td>
            <td class="text-center"><?= $value['cena_doba'] ?></td>
            <td class="text-center"><?= $value['dostepnosc'] ?></td>
            <?php if(isset($_SESSION['employee'])): ?>
            <td class="text-center"> 
                <!-- Modify Button -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upModal<?= $value['id_samochodu']; ?>">
                    Modyfikuj
                </button>
                <!-- Modify Modal -->
                <div class="modal fade text-left" id="upModal<?= $value['id_samochodu']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitle<?= $value['id_samochodu']; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle<?= $value['id_samochodu']; ?>">Modyfikuj samochód</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="../../db/modCar.php" method="post">
                                    <input type="hidden" name="id_samochodu" value="<?= $value['id_samochodu']; ?>">
                                    <div class="form-group mt-2">
                                        <label>Marka</label>
                                        <input type="text" class="form-control" name="marka" value="<?= $value['marka'] ?>" maxlength="80">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Model</label>
                                        <input type="text" class="form-control" name="model" value="<?= $value['model'] ?>" maxlength="80">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Rok produkcji</label>
                                        <input type="number" min="1970" max="<?= date("Y") ?>" class="form-control" name="data_prod" value="<?= $value['data_prod'] ?>">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Liczba samochodów</label>
                                        <input type="number" min="0" max="10" class="form-control" name="dostepnosc" value="<?= $value['dostepnosc'] ?>">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Cena za dobę</label>
                                        <input type="number" min="0" max="500" class="form-control" name="cena_doba" value="<?= $value['cena_doba'] ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Modyfikuj</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Button -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal<?= $value['id_samochodu']; ?>">
                    Usuń
                </button>
                <!-- Delete Modal -->
                <div class="modal fade text-left" id="delModal<?= $value['id_samochodu']; ?>" tabindex="-1" role="dialog" aria-labelledby="delModalTitle<?= $value['id_samochodu']; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="delModalTitle<?= $value['id_samochodu']; ?>">Usuń samochód</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Czy na pewno chcesz usunąć samochód?
                                <form action="../../db/delCar.php" method="post">
                                    <input type="hidden" name="id_samochodu" value="<?= $value['id_samochodu']; ?>">
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

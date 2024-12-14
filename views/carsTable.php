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
                        <th class="text-center" scope="'col">Dostępne</th>
                        <?php if(isset($_SESSION['employee'])):?>
                            <th class="text-center" scope="col">Akcje</th>
                        <?php endif;?>
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
                            <?php if(isset($_SESSION['employee'])): ?>
                            <td class="text-center"> 
                                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#upModal">
                                     Modyfikuj
                                </button>
                                <div class="modal fade text-left    " id="upModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                                <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle">Modyfikuj samochód</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                                <!-- Modal Body -->
                                            <div class="modal-body">
                                                <form style="width: 100%;"    action="../../db/upCar.php" method="post">
                                                    <input type="hidden" name="id_samochodu" value="<?= $value['id_samochodu']; ?>">
                                                    <div class="form-group mt-2">
                                                        <label for="descriptionError">Marka</label>
                                                        <input type="text" class="form-control" name="marka" id="descriptionError" rows="6" style="resize: none;" placeholder="Wpisz markę" maxlength="80"  value="<?= $value['marka'] ?>"></>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="descriptionError">Model</label>
                                                        <input type="text" class="form-control" name="model" id="descriptionError" rows="6" style="resize: none;" placeholder="Wpisz model" maxlength="80"  value="<?= $value['model'] ?>"></>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="descriptionError">Rok produkcji</label>
                                                        <input type="number" min="1970" max="<?php echo date("Y"); ?>" class="form-control" name="data_prod" id="descriptionError" rows="6" style="resize: none;" value="<?= $value['data_prod'] ?>" placeholder="Wpisz rok produkcji" maxlength="80" ></>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="descriptionError">Liczba sasmochodów</label>
                                                        <input type="number" min="0" max="10" class="form-control" name="dostepnosc" id="descriptionError" rows="6" style="resize: none;" placeholder="Wpisz liczbę samochodów" value="<?= $value['dostepnosc'] ?>" maxlength="80" ></>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="descriptionError">Cena za dobe</label>
                                                        <input type="number" min="0" max="500" class="form-control" name="cena_doba" id="descriptionError" rows="6" style="resize: none;" placeholder="Wpisz cenę za dobe" value="<?= $value['cena_doba'] ?>" maxlength="80" ></>
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
                                </div>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal">
                            Usuń
                            </button>
                            <div class="modal fade text-left    " id="delModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                                <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle">Usuń  samochód</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                                <!-- Modal Body -->
                                            <div class="modal-body">
                                                Czy napewno chcesz usunąć samochód?
                                                <form style="width: 100%;"    action="../../db/delCar.php" method="post">
                                                    <input type="hidden" name="id_samochodu" value="<?= $value['id_samochodu'] ;?>" >
                                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </td>
                            <?php endif;?>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
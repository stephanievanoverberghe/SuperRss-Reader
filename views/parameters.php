<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <h1 class="my-5">Paramètres</h1>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <form method="POST">
                <div class="row justify-content-center mb-5">
                        <div class="col-11 formPart">
                            <h2 class="text-center my-5 questionToUser">Choix du thème :</h2>
                            <div class="d-flex flex-column flex-md-row justify-content-evenly pb-5">
                                <div class="ps-3 d-inline d-flex align-items-center mb-4 mb-lg-0">
                                    <input type="radio" name="themeChoice" value="1" id="light" class="form-check-input me-2">
                                    <label class="form-check-label" for="light">Clair</label>
                                </div>
                                <div class="ps-3 d-inline d-flex align-items-center mb-4 mb-lg-0">
                                    <input type="radio" name="themeChoice" value="2" id="dark" class="form-check-input me-2">
                                    <label class="form-check-label" for="dark">Sombre</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <small class="text-center text-danger"><?= $error['theme'] ?? '' ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-5">
                        <div class="col-11 formPart">
                            <h2 class="text-center my-5 questionToUser">Choisissez trois sujets parmi les suivants :</h2>
                            <div class="d-flex flex-column flex-md-row justify-content-around pb-5">
                                <?php
                                    foreach(SUBJECT as $value => $key) {
                                    echo '<div class="form-check d-flex align-items-center mb-4 mb-lg-0">
                                    <input class="form-check-input" type="checkbox" name="subjects[]" value='.$value.' id='.$key.'>
                                    <label class="form-check-label ms-3" for='.$key.'>'.$key.'</label>
                                    </div>';
                                    }
                                ?>
                            </div>
                            <div class="d-flex justify-content-center">
                                <small class="text-center text-danger"><?= $error['subject'] ?? '' ?></small>
                            </div>
                        </div>
                    </div>


                    <div class="row justify-content-center mb-5">
                        <div class="col-11 formPart">
                            <h2 class="text-center my-5 questionToUser">Combien d'articles souhaitez-vous par catégorie sur la page d'accueil ?</h2>
                            <div class="d-flex flex-column flex-md-row justify-content-around pb-5">
                                <div class="ps-3 d-inline d-flex align-items-center mb-4 mb-lg-0">
                                    <input type="radio" name="articlesNumber" value="6" id="articlesNumber6" class="form-check-input me-2">
                                    <label class="form-check-label" for="articlesNumber6">6</label>
                                </div>
                                <div class="ps-3 d-inline d-flex align-items-center mb-4 mb-lg-0">
                                    <input type="radio" name="articlesNumber" value="9" id="articlesNumber9" class="form-check-input me-2">
                                    <label class="form-check-label" for="articlesNumber9">9</label>
                                </div>
                                <div class="ps-3 d-inline d-flex align-items-center mb-4 mb-lg-0">
                                    <input type="radio" name="articlesNumber" value="12" id="articlesNumber12" class="form-check-input me-2">
                                    <label class="form-check-label" for="articlesNumber12">12</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <small class="text-center text-danger"><?= $error['articlesNumber'] ?? '' ?></small>
                            </div>
                        </div>
                    </div>

                    <!-- BOUTON ENVOYER -->
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-center mt-4 mb-5">
                                <button type="submit" class="btn py-2 px-5" id="save">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
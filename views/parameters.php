<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <h1 class="my-5">Paramètres</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="" method="GET">
                    <div class="row justify-content-center mb-5">
                        <div class="col">
                            <h2 class="text-center my-5 questionToUser">Choisissez trois sujets parmi les suivants :</h2>
                            <div class="d-flex flex-column flex-md-row justify-content-around">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="1" id="pc">
                                    <label class="form-check-label" for="pc">PC</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="2" id="xbox">
                                    <label class="form-check-label" for="xbox">XBOX</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="3" id="ps5">
                                    <label class="form-check-label" for="ps5">PS5</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="4" id="switch">
                                    <label class="form-check-label" for="switch">Switch</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="5" id="gameboy">
                                    <label class="form-check-label" for="gameboy">Game Boy</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="6" id="dreamcast">
                                    <label class="form-check-label" for="dreamcast">Dreamcast</label>
                                </div>
                            </div>
                            <?= $error['subject'] ?? '' ?>
                        </div>
                    </div>


                    <div class="row mb-5">
                        <div class="col">
                            <h2 class="text-center my-5 questionToUser">Combien d'articles souhaitez-vous par catégorie sur la page d'accueil ?</h2>
                            <div class="d-flex flex-column flex-md-row justify-content-around">
                                <div class="ps-3 d-inline"><input type="radio" name="articlesNumber" value="1" id="articlesNumber6" class="form-check-input me-2">
                                    <label class="form-check-label" for="articlesNumber6">6</label>
                                </div>
                                <div class="ps-3 d-inline"><input type="radio" name="articlesNumber" value="9" id="articlesNumber9" class="form-check-input me-2">
                                    <label class="form-check-label" for="articlesNumber9">9</label>
                                </div>
                                <div class="ps-3 d-inline"><input type="radio" name="articlesNumber" value="12" id="articlesNumber12" class="form-check-input me-2">
                                    <label class="form-check-label" for="articlesNumber12">12</label>
                                </div>
                            </div>
                            <small class="text-center text-danger"><?= $error['articlesNumber'] ?? '' ?></small>
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
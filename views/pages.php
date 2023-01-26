<main>
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col">
                <div>
                    <h1 class="text-center mb-3"><?= $subject ?? 'Sujet' ?></h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-around align-items-center mt-5">

            <div class="col-12 col-lg-3 d-flex align-items-center px-5 py-5">
                <?php foreach ($urlItems as $article) {
                    $namespaces = $article->getNamespaces(true);
                    $namespaceDc = $article->children($namespaces['dc']);
                    $date = date("j / m / Y ", (strtotime($namespaceDc->date)));
                ?>
                    <div class="card mt-5">
                        <img src="<?= $article->enclosure['url'] ?? '' ?>" class="card-img-top" alt="...">
                        <small class="text-center"><?= $date ?? '' ?></small>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $article->title ?? '' ?></h5>
                            <p class="card-text"><?= $article->description ?? '' ?></p>
                            <a href="<?= $article ?? '' ?>" class="btn px-5 py-2">Lire l'article</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
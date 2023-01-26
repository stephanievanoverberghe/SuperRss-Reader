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


            <?php foreach ($urlItems as $article) {
                $namespaces = $article->getNamespaces(true);
                $namespaceDc = $article->children($namespaces['dc']);
                $date = date("j / m / Y ", (strtotime($namespaceDc->date)));
            ?>
                <div class="col-12 col-md-6 col-lg-4 d-flex align-items-center px-5 py-5">
                    <div class="card mt-5 shadow-lg">
                        <img src="<?= $article->enclosure['url'] ?? '' ?>" class="card-img-top" alt="...">
                        <small class="text-center"><?= $date ?? '' ?></small>
                        <div class="card-body text-center d-flex flex-column justify-content-around">
                            <h5 class="card-title"><?= $article->title ?? '' ?></h5>
                            <p class="card-text"><?= $article->description ?? '' ?></p>
                            <a href="<?= $article->link ?? '' ?>" class="btn px-5 py-3 fs-5">Lire l'article</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>
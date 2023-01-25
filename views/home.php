<!--  HOME PHP -->
<main>
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col">
                <div>
                    <h1 class="text-center mb-5">Accueil</h1>
                </div>
            </div>
        </div>

        <div class="row justify-content-around align-items-center mt-5">

            <!-- SUJET 1 -->
            <div class="col-12 col-lg-3 d-flex flex-column align-items-center columnSubject py-5">
                <div>
                    <h2 class="text-center">Sujet 1</h2>
                </div>
                <?php foreach ($dreamcastItems as $article) { ?>
                    <div class="card mt-5">
                        <img src="<?= $article->enclosure['url'] ?? '' ?>" class="card-img-top" alt="Article Image">
                        <small class="text-center">Publié le 16/05/6599</small>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $article->title ?? '' ?></h5>
                            <p class="card-text"><?= $article->description ?? '' ?></p>
                            <a href="<?= $article->link ?? '' ?>" target="_blank" class="btn px-5 py-2">Lire l'article</a>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- SUJET 2 -->
            <div class="col-12 col-lg-3 d-flex flex-column align-items-center columnSubject py-5 mt-5 mt-lg-0">
                <h2 class="text-center mt-5 mt-lg-0">Sujet 2</h2>
                <?php foreach ($xboxItems as $article) { ?>
                    <div class="card mt-5">
                        <img src="<?= $article->enclosure['url'] ?? '' ?>" class="card-img-top" alt="Article Image">
                        <small class="text-center">Publié le 16/05/6599</small>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $article->title ?? '' ?></h5>
                            <p class="card-text"><?= $article->description ?? '' ?></p>
                            <a href="<?= $article->link ?? '' ?>" target="_blank" class="btn px-5 py-2">Lire l'article</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- SUJET 3 -->
            <div class="col-12 col-lg-3 d-flex flex-column align-items-center columnSubject py-5 mt-5 mt-lg-0">
                <h2 class="text-center mt-5 mt-lg-0">Sujet 3</h2>
                <?php foreach ($pcItems as $article) { ?>
                    <div class="card mt-5">
                        <img src="<?= $article->enclosure['url'] ?? '' ?>" class="card-img-top" alt="Article Image">
                        <small class="text-center">Publié le <?php
                                                                $namespaces = $article->getNamespaces(true);
                                                                $namespaceDc = $article->children($namespaces['dc']);
                                                                echo date("j / m / Y ", (strtotime($namespaceDc->date)))  ?></small>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $article->title ?? '' ?></h5>
                            <p class="card-text"><?= $article->description ?? '' ?></p>
                            <a href="<?= $article->link ?? '' ?>" target="_blank" class="btn px-5 py-2">Lire l'article</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
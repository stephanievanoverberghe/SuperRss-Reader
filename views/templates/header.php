<?php


if (!empty($_COOKIE['themeChoice'])) {
    $link = ($_COOKIE['themeChoice'] == 1) ? '<link rel="stylesheet" href="../public/assets/css/light.css" id="styleChange">' : '<link rel="stylesheet" href="../public/assets/css/dark.css" id="styleChange">';
    $logoSrc = ($_COOKIE['themeChoice'] == 1) ? '../../public/assets/img/logo.png' : '../../public/assets/img/logo2.png';
    $settingsSrc = ($_COOKIE['themeChoice'] == 1) ? '../../public/assets/img/engrenage.png' : '../../public/assets/img/engrenage2.png';
    $changeColorSrc = ($_COOKIE['themeChoice'] == 1) ? '../../public/assets/img/soleil.png' : '../../public/assets/img/lune.png';
} else {
    $link = '<link rel="stylesheet" href="../public/assets/css/light.css" id="styleChange">';
    $logoSrc = '../../public/assets/img/logo.png';
    $settingsSrc = '../../public/assets/img/engrenage.png';
    $changeColorSrc = '../../public/assets/img/soleil.png';
}

if (isset($_COOKIE['subjectsUrls'])) {
    $subjects = unserialize($_COOKIE['subjectsUrls']);

    $subjectOne = get_Key(SUBJECT_TITLE, $subjects[0]);
    $subjectTwo = get_Key(SUBJECT_TITLE, $subjects[1]);
    $subjectThree = get_Key(SUBJECT_TITLE, $subjects[2]);

    foreach ($subjectOne as $value) {
        $subjectOne = $value;
    }

    foreach ($subjectTwo as $value) {
        $subjectTwo = $value;
    }

    foreach ($subjectThree as $value) {
        $subjectThree = $value;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <?= $link ?? '' ?>

    <title>Super-RSS-Reader</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-light navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../controllers/home-controller.php"><img src="<?= $logoSrc ?>" alt="Logo du site" class="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-self-center justify-content-around mb-2 mb-lg-0 mx-auto">
                        <li class="nav-item px-lg-4 px-xxl-5">
                            <a class="nav-link mx-2 mx-xxl-5" href="../../controllers/pages-controller.php"><?= $subjectOne ?? '' ?></a>
                        </li>
                        <li class="nav-item px-lg-4 px-xxl-5">
                            <a class="nav-link mx-2 mx-xxl-5" href="../../controllers/pages-controller.php"><?= $subjectTwo ?? '' ?></a>
                        </li>
                        <li class="nav-item px-lg-4 px-xxl-5">
                            <a class="nav-link mx-2 mx-xxl-5" href="../../controllers/pages-controller.php"><?= $subjectThree ?? '' ?></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav d-flex align-items-lg-center mb-2 mb-lg-0">
                        <li class="nav-item me-4">
                            <div><button type="button" class="btn" id="themeColor"><img src="<?= $changeColorSrc ?>" alt="" class="changeColor"></button></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-xxl-4" href="../../controllers/parameters-controller.php"><img src="<?= $settingsSrc ?>" alt="" id="settings"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
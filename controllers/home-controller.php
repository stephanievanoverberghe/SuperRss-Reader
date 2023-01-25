<?php

include_once(__DIR__ . '/../views/templates/header.php');

//  j'enregistre mes urls dans des constantes
$dreamcastUrl = simplexml_load_file('https://www.jeuxactu.com/rss/dreamcast.rss');
$gameboyUrl = simplexml_load_file('https://www.jeuxactu.com/rss/game-boy.rss');
$pcUrl = simplexml_load_file('https://www.jeuxactu.com/rss/pc.rss');
$ps5Url = simplexml_load_file('https://www.jeuxactu.com/rss/ps5.rss');
$xboxUrl = simplexml_load_file('https://www.jeuxactu.com/rss/xbox-series-x.rss');
$switchUrl = simplexml_load_file('https://www.jeuxactu.com/rss/switch.rss');

$url = ['https://www.jeuxactu.com/rss/dreamcast.rss', 'https://www.jeuxactu.com/rss/xbox-series-x.rss', 'https://www.jeuxactu.com/rss/xbox-series-x.rss'];
// $GET['articlesNumber'] issu de la radio
$articlesNumber = 6;
// recupérer le choix du sujet pour créer un tableaux
// utilisé array_keys($Subject, searchValue) return clef contenant ces valeurs;

//  Si aucun cookie, affichage part défaut
if (empty($_COOKIE)) {

    // Dreamcast
    $dataDreamcast = $dreamcastUrl->channel->item;
    for ($i = 0; $i < $articlesNumber; $i++) {
        $dreamcastItems[] = $dataDreamcast[$i];
    }

    // Xbox
    $dataXbox = $xboxUrl->channel->item;
    for ($i = 0; $i < $articlesNumber; $i++) {

        $xboxItems[] = $dataXbox[$i];
    }

    // Switch
    $dataPc = $pcUrl->channel->item;
    for ($i = 0; $i < $articlesNumber; $i++) {
        $pcItems[] = $dataPc[$i];
    }
} else {
    $url;
}

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/home.php');

include_once(__DIR__ . '/../views/templates/footer.php');

include(__DIR__ . '/../views/home.php');

include_once(__DIR__ . '/../views/templates/footer.php');

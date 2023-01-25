<?php

include_once(__DIR__ . '/../views/templates/header.php');

//  j'enregistre mes urls dans des constantes
$dreamcastUrl = simplexml_load_file('https://www.jeuxactu.com/rss/dreamcast.rss');
$gameboyUrl = simplexml_load_file('https://www.jeuxactu.com/rss/game-boy.rss');
$pcUrl = simplexml_load_file('https://www.jeuxactu.com/rss/pc.rss');
$ps5Url = simplexml_load_file('https://www.jeuxactu.com/rss/ps5.rss');
$xboxUrl = simplexml_load_file('https://www.jeuxactu.com/rss/xbox-series-x.rss');
$switchUrl = simplexml_load_file('https://www.jeuxactu.com/rss/switch.rss');

// $GET['articlesNumber'] issu de la radio
$articlesNumber = 6;
// recupérer le choix du sujet pour créer un tableaux
// utilisé array_keys($Subject, searchValue) return clef contenant ces valeurs;

//  Si aucun cookie, url = ceux que l'on veut sinon prendre ceux du cookie
if (empty($_COOKIE)) {

    $urls = ['https://www.jeuxactu.com/rss/switch.rss', 'https://www.jeuxactu.com/rss/xbox-series-x.rss', 'https://www.jeuxactu.com/rss/pc.rss'];
} else {
    $urls = unserialize($_COOKIE['subjectsUrls']);
}
// Sujet 1
$url1 = simplexml_load_file($urls[0]);
$dataUrl1 = $url1->channel->item;
for ($i = 0; $i < $articlesNumber; $i++) {
    $url1Items[] = $dataUrl1[$i];
}

// sujet 2 
$url2 = simplexml_load_file($urls[1]);

$dataUrl2 = $url2->channel->item;
for ($i = 0; $i < $articlesNumber; $i++) {
    $url2Items[] = $dataUrl2[$i];
}

// Sujet 3 
$url3 = simplexml_load_file($urls[2]);
$dataUrl3 = $url3->channel->item;
for ($i = 0; $i < $articlesNumber; $i++) {
    $url3Items[] = $dataUrl3[$i];
}


include(__DIR__ . '/../views/home.php');

include_once(__DIR__ . '/../views/templates/footer.php');

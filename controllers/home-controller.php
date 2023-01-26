<?php

require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../config/functions.php');

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


include_once(__DIR__ . '/../views/templates/header.php');


//  Si aucun cookie, url = ceux que l'on veut sinon prendre ceux du cookie
if (empty($_COOKIE)) {
    $articlesNumber = 6;
    $urls = ['https://www.jeuxactu.com/rss/switch.rss', 'https://www.jeuxactu.com/rss/xbox-series-x.rss', 'https://www.jeuxactu.com/rss/pc.rss'];
} else {
    $articlesNumber = $_COOKIE['articlesNumber'];
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

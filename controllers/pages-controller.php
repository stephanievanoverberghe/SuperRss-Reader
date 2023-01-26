<?php

require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../config/functions.php');



if (isset($_COOKIE['subjectsUrls'])) {
    include_once(__DIR__ . '/../views/templates/header.php');

    //   si cookie 
    $articlesNumber = $_COOKIE['articlesNumber'];

    if ($_GET['sujet'] == 1) {
        $subject = $subjectOne;
    } elseif ($_GET['sujet'] == 2) {
        $subject = $subjectTwo;
    } else {
        $subject = $subjectThree;
    }
    // Sujet 
    $url = simplexml_load_file(SUBJECT_TITLE[$subject]);
    $dataUrl = $url->channel->item;
    for ($i = 0; $i < $articlesNumber; $i++) {
        $urlItems[] = $dataUrl[$i];
    }
} else {
    // si cookie n'existe pas
    $articlesNumber = 6;
    $urls = ['https://www.jeuxactu.com/rss/switch.rss', 'https://www.jeuxactu.com/rss/xbox-series-x.rss', 'https://www.jeuxactu.com/rss/pc.rss'];
    $subjectDefaultOne = get_Key(SUBJECT_TITLE, $urls[0]);
    $subjectDefaultTwo = get_Key(SUBJECT_TITLE, $urls[1]);
    $subjectDefaultThree = get_Key(SUBJECT_TITLE, $urls[2]);
    foreach ($subjectDefaultOne as $value) {
        $subjectDefaultOne = $value;
    }

    foreach ($subjectDefaultTwo as $value) {
        $subjectDefaultTwo = $value;
    }

    foreach ($subjectDefaultThree as $value) {
        $subjectDefaultThree = $value;
    }
    if ($_GET['sujet'] == 1) {
        $subject = $subjectDefaultOne;
    } elseif ($_GET['sujet'] == 2) {
        $subject = $subjectDefaultTwo;
    } else {
        $subject = $subjectDefaultThree;
    }
    // Sujet 
    $url = simplexml_load_file(SUBJECT_TITLE[$subject]);
    $dataUrl = $url->channel->item;
    for ($i = 0; $i < $articlesNumber; $i++) {
        $urlItems[] = $dataUrl[$i];
    }
}

include_once(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/pages.php');
include_once(__DIR__ . '/../views/templates/footer.php');

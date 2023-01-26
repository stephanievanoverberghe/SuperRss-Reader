<?php

require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../config/functions.php');

include_once(__DIR__ . '/../views/templates/header.php');

if (isset($_COOKIE['subjectsUrls'])) {
    if ($_GET['sujet'] == 1) {
        $subject = $subjectOne;
    } elseif ($_GET['sujet'] == 2) {
        $subject = $subjectTwo;
    } else {
        $subject = $subjectThree;
    }
}
if (empty($_COOKIE)) {
    $articlesNumber = 6;
    $urls = ['https://www.jeuxactu.com/rss/switch.rss', 'https://www.jeuxactu.com/rss/xbox-series-x.rss', 'https://www.jeuxactu.com/rss/pc.rss'];
} else {
    $articlesNumber = $_COOKIE['articlesNumber'];
}
// Sujet 1
$url = simplexml_load_file(SUBJECT_TITLE[$subject]);
$dataUrl = $url->channel->item;
for ($i = 0; $i < $articlesNumber; $i++) {
    $urlItems[] = $dataUrl[$i];
}
include(__DIR__ . '/../views/pages.php');
include_once(__DIR__ . '/../views/templates/footer.php');

<?php

require_once(__DIR__ . '/../config/constants.php');

$error = [];

if (!empty($_GET['subjects'])) {
    // var_dump($_GET['subjects']);

    $subjects = filter_input(INPUT_GET, 'subjects', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY) ?? [];

    var_dump($subjects);

    foreach ($subjects as $value) {
        if ($value < 0 || $value >= count(SUBJECT)) {
            $error['subject'] = 'Sujet non reconnu';
        }
    }
}


if (!empty($_GET['articlesNumber'])) {
    // $articlesNumber = $_GET['articlesNumber'];
    $articlesNumber = intval(filter_input(INPUT_GET, 'articlesNumber', FILTER_SANITIZE_NUMBER_INT));


    if ($articlesNumber != 6 && $articlesNumber != 9 && $articlesNumber != 12) {
        $error['articlesNumber'] = 'Nombre d\'articles non valide';
    }
}


include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/parameters.php');

include_once(__DIR__ . '/../views/templates/footer.php');

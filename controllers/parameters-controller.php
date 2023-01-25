<?php

require_once(__DIR__ . '/../config/constants.php');

$error = [];

if (!empty($_GET['subjects']) || !empty($_GET['articlesNumber'])) {

    if (!empty($_GET['subjects']) && empty($_GET['articlesNumber'])) {
        $error['articlesNumber'] = 'Veuillez choisir un nombre d\'articles';
    } else if (empty($_GET['subjects']) && !empty($_GET['articlesNumber'])) {
        $error['subject'] = 'Veuillez choisir trois sujets';
    } else {

    // VERIFCATION SUR LA RECUPERATION DES SUJETS
    if (count($_GET['subjects']) > 3) {
        $error['subject'] = 'Veuillez choisir uniquement trois sujets';
    } else if (count($_GET['subjects']) < 3) {
        $error['subject'] = 'Veuillez choisir trois sujets';
    } else {
        $subjects = filter_input(INPUT_GET, 'subjects', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY) ?? [];

        foreach ($subjects as $value) {
            if ($value < 0 || $value >= count(SUBJECT)) {
                $error['subject'] = 'Sujet non reconnu';
            }
        }
    }

    // VERFICATION SUR LA RECUPERATION DU NOMBRE D'ARTICLES
    $articlesNumber = intval(filter_input(INPUT_GET, 'articlesNumber', FILTER_SANITIZE_NUMBER_INT));

    if ($articlesNumber != 6 && $articlesNumber != 9 && $articlesNumber != 12) {
        $error['articlesNumber'] = 'Nombre d\'articles non valide';
    }
    }

    if (empty($error)) {

        // setcookie('subjects', $subjects, time()+3600);
        
        setcookie('subjects', serialize($subjects), time()+3600);
        setcookie('articlesNumber', $articlesNumber, time()+3600);

        var_dump(unserialize($_COOKIE['subjects']));
    }

}



include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/parameters.php');

include_once(__DIR__ . '/../views/templates/footer.php');

<?php

require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../config/functions.php');

$error = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (empty($_POST['subjects']) || empty($_POST['articlesNumber']) || empty($_POST['themeChoice'])) {
        $error['articlesNumber'] = 'Veuillez choisir un nombre d\'articles';
        $error['subject'] = 'Veuillez choisir trois sujets';
        $error['theme'] = 'Veuillez choisir un thème';
    } else {

// -------------------------------------------------------------------------------------------------------------------
        // VERIFICATION SUR LE CHOIX DU THEME

        $themeChoice = intval(filter_input(INPUT_POST, 'themeChoice', FILTER_SANITIZE_NUMBER_INT));
        


// -------------------------------------------------------------------------------------------------------------------
        // VERIFCATION SUR LA RECUPERATION DES SUJETS
        if (count($_POST['subjects']) > 3) {
            $error['subject'] = 'Veuillez choisir uniquement trois sujets';
        } else if (count($_POST['subjects']) < 3) {
            $error['subject'] = 'Veuillez choisir trois sujets';
        } else {
            $subjects = filter_input(INPUT_POST, 'subjects', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY) ?? [];

            foreach ($subjects as $value) {
                if ($value < 0 || $value >= count(SUBJECT)) {
                    $error['subject'] = 'Sujet non reconnu';
                }
            }
        }

// -------------------------------------------------------------------------------------------------------------------
        // VERFICATION SUR LA RECUPERATION DU NOMBRE D'ARTICLES
        $articlesNumber = intval(filter_input(INPUT_POST, 'articlesNumber', FILTER_SANITIZE_NUMBER_INT));

        if ($articlesNumber != 6 && $articlesNumber != 9 && $articlesNumber != 12) {
            $error['articlesNumber'] = 'Nombre d\'articles non valide';
        }
    }

    if (empty($error)) {
        $subjectsUrls = [];
        foreach($subjects as $value) {
            array_push($subjectsUrls,URL[$value]);
        }
        
        // On serialize pour convertir le tableau en chaine dans le cookie
        setcookie('themeChoice', $themeChoice, time() + 3600, '/');
        setcookie('subjectsUrls', serialize($subjectsUrls), time() + 3600, '/');
        setcookie('articlesNumber', $articlesNumber, time() + 3600, '/');
        
        // Pour réexploité le tableau, on le reconverti derrière
        // var_dump(unserialize($_COOKIE['subjectsUrls']));
    }
}



if (empty($_POST['subjects']) || !empty($error) || empty($_POST['articlesNumber'])) {
    
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/parameters.php');
    include_once(__DIR__ . '/../views/templates/footer.php');

} else {

    header('location: /controllers/home-controller.php');
    die;

}





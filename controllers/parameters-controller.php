<?php

require_once(__DIR__ . '/../config/constants.php');

$error = [];

if (!empty($_GET['subjects']) || !empty($_GET['articlesNumber']) || !empty($_GET['themeChoice'])) {

    if (empty($_GET['subjects']) || empty($_GET['articlesNumber']) || empty($_GET['themeChoice'])) {
        $error['articlesNumber'] = 'Veuillez choisir un nombre d\'articles';
        $error['subject'] = 'Veuillez choisir trois sujets';
        $error['theme'] = 'Veuillez choisir un thème';
    } else {

// -------------------------------------------------------------------------------------------------------------------
        // VERIFICATION SUR LE CHOIX DU THEME

        $themeChoice = intval(filter_input(INPUT_GET, 'themeChoice', FILTER_SANITIZE_NUMBER_INT));
        


// -------------------------------------------------------------------------------------------------------------------
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

// -------------------------------------------------------------------------------------------------------------------
        // VERFICATION SUR LA RECUPERATION DU NOMBRE D'ARTICLES
        $articlesNumber = intval(filter_input(INPUT_GET, 'articlesNumber', FILTER_SANITIZE_NUMBER_INT));

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
        setcookie('themeChoice', $themeChoice, time() + 3600);
        setcookie('subjectsUrls', serialize($subjectsUrls), time() + 3600);
        setcookie('articlesNumber', $articlesNumber, time() + 3600);
        
        // Pour réexploité le tableau, on le reconverti derrière
        // var_dump(unserialize($_COOKIE['subjectsUrls']));
    }
}



if (empty($_GET['subjects']) || !empty($error) || empty($_GET['articlesNumber'])) {
    
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/parameters.php');
    include_once(__DIR__ . '/../views/templates/footer.php');

} else {

    header('location: /controllers/home-controller.php');
    die;

}





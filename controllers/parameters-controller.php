<?php

require_once(__DIR__ . '/../config/constants.php');

include_once(__DIR__ . '/../views/templates/header.php');

$error = [];



$subjects = filter_input(INPUT_POST, 'subjects[]', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY) ?? [];

foreach ($subjects as $value) {
    if ($value < 1 || $value > 6) {
        $error['subject'] = 'Sujet non reconnu';
    }
}



// if (!empty($_GET['articlesNumber'])) {
//     $articlesNumber = $_GET['articlesNumber'];
//     var_dump($articlesNumber);
//     $test = intval(filter_input(INPUT_POST, 'articlesNumber', FILTER_SANITIZE_NUMBER_INT));


//     var_dump($articlesNumber);
//     if ($articlesNumber != 9) {
//         $error['articlesNumber'] = 'Nombre d\'articles non valide';
//     }
// }




include(__DIR__ . '/../views/parameters.php');

include_once(__DIR__ . '/../views/templates/footer.php');

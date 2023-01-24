<?php

require_once(__DIR__ . '/../config/constants.php');

$error = [];

// if (isset($_GET['subjects']) || isset($_GET['articlesNumber'])) {
//     // var_dump($_GET['subjects']);

//     $subjects = filter_input(INPUT_POST, 'subjects', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY) ?? [];

//     var_dump($subjects);

//     foreach ($subjects as $value) {
//         if ($value < 0 || $value >= count(SUBJECT)) {
//             $error['subject'] = 'Sujet non reconnu';
//             var_dump('Le message erreur donne ça :' . $error['subject']);
//         }
//     }
// }




// if (!empty($_GET['articlesNumber'])) {
//     $articlesNumber = $_GET['articlesNumber'];
//     var_dump($articlesNumber);
//     $test = intval(filter_input(INPUT_POST, 'articlesNumber', FILTER_SANITIZE_NUMBER_INT));


//     var_dump($articlesNumber);
//     if ($articlesNumber != 9) {
//         $error['articlesNumber'] = 'Nombre d\'articles non valide';
//     }
// }


include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/parameters.php');

include_once(__DIR__ . '/../views/templates/footer.php');

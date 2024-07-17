<?php

// Récupération du numéro de l'étape en cours
if (empty($_GET['pagecom']) or ! is_numeric($_GET['pagecom'])) {
    define('NUM_PAGE', 1);
} else {
    // En situation réelle, il faudrait vérifier l'existence de cette page
    define('NUM_PAGE', intval($_GET['pagecom']));
}

// Déclaration de la variable de session
if (empty($_SESSION['formagence'])) {
    $_SESSION['formagence'] = array();
}

switch (NUM_PAGE) {

    case 2:
        // Récupération des informations du formulaire précédent
        if (!empty($_POST)) {
            $_SESSION['formagence'][NUM_PAGE - 1] = array(
                'ville' => trim(htmlspecialchars($_POST["idville"])),
                'agence' => ucwords(trim(htmlspecialchars($_POST["agence"]))),
                'adresse' => trim(htmlspecialchars($_POST["adresse"])),
                'tel' => trim(htmlspecialchars($_POST["tel"])),
                'email' => trim(htmlspecialchars($_POST["email"]))
               
            );
        }
        require('micropages/microagence/ajouter_agence/formterminer_agence.php');
        break;

    case 1:
    default:
        // Valeurs par défaut
        if (empty($_SESSION['formagence'][NUM_PAGE])) {

            $_SESSION['formagence'][NUM_PAGE] = array(
                'ville' => '',
                'agence' => '',
                'adresse' => '',
                'tel' => '',
                'email' => ''
                
            );
        }
        require('micropages/microagence/ajouter_agence/formajout_agence.php');
        break;
}

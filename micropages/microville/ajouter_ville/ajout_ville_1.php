<?php

// Récupération du numéro de l'étape en cours
if (empty($_GET['pagecom']) or ! is_numeric($_GET['pagecom'])) {
    define('NUM_PAGE', 1);
} else {
    // En situation réelle, il faudrait vérifier l'existence de cette page
    define('NUM_PAGE', intval($_GET['pagecom']));
}

// Déclaration de la variable de session
if (empty($_SESSION['formville'])) {
    $_SESSION['formville'] = array();
}

switch (NUM_PAGE) {

    case 2:
        // Récupération des informations du formulaire précédent
        if (!empty($_POST)) {
            $_SESSION['formville'][NUM_PAGE - 1] = array(
                'region' => trim(htmlspecialchars($_POST["idregion"])),
                'ville' => (trim(htmlspecialchars($_POST["ville"])))
            );
        }
        require('micropages/microville/ajouter_ville/formterminer_ville.php');
        break;

    case 1:
    default:
        // Valeurs par défaut
        if (empty($_SESSION['formville'][NUM_PAGE])) {

            $_SESSION['formville'][NUM_PAGE] = array(
                'region' => '',
                'ville' => ''
            );
        }
        require('micropages/microville/ajouter_ville/formajout_ville.php');
        break;
}
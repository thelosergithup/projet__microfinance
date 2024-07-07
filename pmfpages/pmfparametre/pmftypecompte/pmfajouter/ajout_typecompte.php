<?php

// Récupération du numéro de l'étape en cours
if (empty($_GET['pagecom']) or ! is_numeric($_GET['pagecom'])) {
    define('NUM_PAGE', 1);
} else {
    // En situation réelle, il faudrait vérifier l'existence de cette page
    define('NUM_PAGE', intval($_GET['pagecom']));
}

// Déclaration de la variable de session
if (empty($_SESSION['formtypecompte'])) {
    $_SESSION['formtypecompte'] = array();
}

switch (NUM_PAGE) {

    case 2:
        // Récupération des informations du formulaire précédent
        if (!empty($_POST)) {
            $_SESSION['formtypecompte'][NUM_PAGE - 1] = array(
                'codet' => strtoupper(trim(htmlspecialchars($_POST["codet"]))),
                'typecompte' => ucwords(trim(htmlspecialchars($_POST["typecompte"]))),
                //'indice' => trim(htmlspecialchars($_POST["indice"]))
            );
        }
        require('pmfpages/pmfparametre/pmftypecompte/pmfajouter/form_terminer.php');
        break;

    case 1:
    default:
        // Valeurs par défaut
        if (empty($_SESSION['formtypecompte'][NUM_PAGE])) {

            $_SESSION['formtypecompte'][NUM_PAGE] = array(
                'codet' => '',
                'typecompte' => '',
                'indice' => ''
            );
        }
        require('pmfpages/pmfparametre/pmftypecompte/pmfajouter/form_ajouter_typecompte.php');
        break;
}
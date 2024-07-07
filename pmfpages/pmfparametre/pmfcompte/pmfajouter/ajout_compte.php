<?php

// Récupération du numéro de l'étape en cours
if (empty($_GET['pagecom']) or ! is_numeric($_GET['pagecom'])) {
    define('NUM_PAGE', 1);
} else {
    // En situation réelle, il faudrait vérifier l'existence de cette page
    define('NUM_PAGE', intval($_GET['pagecom']));
}

// Déclaration de la variable de session
if (empty($_SESSION['formcompte'])) {
    $_SESSION['formcompte'] = array();
}

switch (NUM_PAGE) {

    case 2:
        // Récupération des informations du formulaire précédent
        if (!empty($_POST)) {
            $_SESSION['formcompte'][NUM_PAGE - 1] = array(
                'typecompte' => trim(htmlspecialchars($_POST["typecompte"])),
                'compte' => ucwords(trim(htmlspecialchars($_POST["compte"]))),
                'solde' => ucwords(trim(htmlspecialchars($_POST["solde"]))),
                'devise' => ucwords(trim(htmlspecialchars($_POST["devise"])))
            );
        }
        require('pmfpages/pmfparametre/pmfcompte/pmfajouter/form_terminer.php');
        break;

    case 1:
    default:
        // Valeurs par défaut
        if (empty($_SESSION['formcompte'][NUM_PAGE])) {

            $_SESSION['formcompte'][NUM_PAGE] = array(
                'typecompte' => '',
                'compte' => '',
                'solde' => '',
                'devise'=> ''
                );
        }
        require('pmfpages/pmfparametre/pmfcompte/pmfajouter/form_ajouter_compte.php');
        break;
}
<?php

// Récupération du numéro de l'étape en cours
if (empty($_GET['pagecom']) or !is_numeric($_GET['pagecom'])) {
    define('NUM_PAGE', 1);
} else {
    // En situation réelle, il faudrait vérifier l'existence de cette page
    define('NUM_PAGE', intval($_GET['pagecom']));
}

// Déclaration de la variable de session
if (empty($_SESSION['formdemandepret'])) {
    $_SESSION['formdemandepret'] = array();
}

switch (NUM_PAGE) {

    case 2:
        // Récupération des informations du formulaire précédent
        if (!empty($_POST)) {
            $_SESSION['formdemandepret'][NUM_PAGE - 1] = array(
                'idclient' => trim(htmlspecialchars($_POST["idclient"])),
                'montant' => trim(trim(htmlspecialchars($_POST["montant"]))),
                'duree' => trim(trim(htmlspecialchars($_POST["duree"]))),
                'motif' => trim(trim(htmlspecialchars($_POST["motif"])))
            );
        }
        require('pmfpages/pmfpret/pmfdemandepret/pmfajouter/form_terminer.php');
        break;

    case 1:
    default:
        // Valeurs par défaut
        if (empty($_SESSION['formdemandepret'][NUM_PAGE])) {

            $_SESSION['formdemandepret'][NUM_PAGE] = array(
                'login' => '',
                'montant' => '',
                'duree' => '',
                'motif' => ''
            );
        }
        require('pmfpages/pmfpret/pmfdemandepret/pmfajouter/form_demande.php');
        break;
}

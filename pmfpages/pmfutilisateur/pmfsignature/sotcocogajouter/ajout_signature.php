
<?php

if (isset($_REQUEST["idutilisateur"])) {
    $id = $_REQUEST["idutilisateur"];
    $rslt = $con->query("select * from sot_utilisateur where iduser='" . $id . "'") or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($rslt);
// R�cup�ration du num�ro de l'�tape en cours
    if (empty($_GET['pagecom']) or ! is_numeric($_GET['pagecom'])) {
        define('NUM_PAGE', 1);
    } else {
        // En situation r�elle, il faudrait v�rifier l'existence de cette page
        define('NUM_PAGE', intval($_GET['pagecom']));
    }

// D�claration de la variable de session
    if (empty($_SESSION['formsignature'])) {
        $_SESSION['formsignature'] = array();
    }

    if (empty($_SESSION['formsignature'])) {
        $_SESSION['formsignature'] = array();
        $_SESSION['formsignature'][1] = array(
            'idutilisateur' => $_GET["idutilisateur"],
                'code' => NULL
        );
    }


switch (NUM_PAGE) {

    case 2:
        // Récupération des informations du formulaire précédent
        if (!empty($_POST)) {

            $_SESSION['formsignature'][NUM_PAGE - 1] = array(
            'idutilisateur' => $_GET["idutilisateur"],
                'code' => trim(htmlspecialchars($_POST["code"]))
            );
        }
        require('sotcocogpages/sotcocogutilisateur/sotcocogsignature/sotcocogajouter/form_terminer.php');
        break;

    case 1:
    default:
        // Valeurs par défaut
        if (empty($_SESSION['formsignature'][NUM_PAGE])) {

            $_SESSION['formsignature'][NUM_PAGE] = array(
            'idutilisateur' => $_GET["idutilisateur"],
                'code' => NULL
            );
        } else if (($_SESSION['formsignature'][NUM_PAGE]["idutilisateur"]!=$_REQUEST["idutilisateur"])) {

            $_SESSION['formsignature'][NUM_PAGE] = array(
            'idutilisateur' => $_GET["idutilisateur"],
                'code' => NULL
            );
        }
        require('sotcocogpages/sotcocogutilisateur/sotcocogsignature/sotcocogajouter/form_ajouter_signature.php');
        break;
}
}
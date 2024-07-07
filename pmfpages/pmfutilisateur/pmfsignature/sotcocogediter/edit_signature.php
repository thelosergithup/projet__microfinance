
<?php

if (isset($_REQUEST["idsignature"])) {
    $id = $_REQUEST["idsignature"];
    $rslt = $con->query("select * from sot_signature where idsignature='" . $id . "'") or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($rslt);
// R�cup�ration du num�ro de l'�tape en cours
    if (empty($_GET['pagecom']) or ! is_numeric($_GET['pagecom'])) {
        define('NUM_PAGE', 1);
    } else {
        // En situation r�elle, il faudrait v�rifier l'existence de cette page
        define('NUM_PAGE', intval($_GET['pagecom']));
    }

// D�claration de la variable de session
    if (empty($_SESSION['formsignaturee'])) {
        $_SESSION['formsignaturee'] = array();
    }

    if (empty($_SESSION['formsignaturee'])) {
        $_SESSION['formsignaturee'] = array();
        $_SESSION['formsignaturee'][1] = array(
            'idsignature' => $_GET["idsignature"],
                'codee' => $row["codesignature"]
        );
    }


switch (NUM_PAGE) {

    case 2:
        // Récupération des informations du formulaire précédent
        if (!empty($_POST)) {

            $_SESSION['formsignaturee'][NUM_PAGE - 1] = array(
            'idsignature' => $_GET["idsignature"],
                'codee' => trim(htmlspecialchars($_POST["codee"]))
            );
        }
        
        require('sotcocogpages/sotcocogutilisateur/sotcocogsignature/sotcocogediter/form_terminer.php');
        break;
        
    case 1:
    default:
        // Valeurs par défaut
        if (empty($_SESSION['formsignaturee'][NUM_PAGE])) {

            $_SESSION['formsignaturee'][NUM_PAGE] = array(
            'idsignature' => $_GET["idsignature"],
                'codee' => $row["codesignature"]
            );
        } else if (($_SESSION['formsignaturee'][NUM_PAGE]["idsignature"]!=$_REQUEST["idsignature"])) {

            $_SESSION['formsignaturee'][NUM_PAGE] = array(
            'idsignature' => $_GET["idsignature"],
                'codee' => $row["codesignature"]
            );
        }
        require('sotcocogpages/sotcocogutilisateur/sotcocogsignature/sotcocogediter/form_edit_signature.php');
        break;
}
}
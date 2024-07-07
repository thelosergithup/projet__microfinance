
<?php

if (isset($_REQUEST["idpays"])) {
    $id = $_REQUEST["idpays"];
    $rslt = $con->query("select * from sot_pays where idpays='" . $id . "'") or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($rslt);
// R�cup�ration du num�ro de l'�tape en cours
    if (empty($_GET['pagecom']) or ! is_numeric($_GET['pagecom'])) {
        define('NUM_PAGE', 1);
    } else {
        // En situation r�elle, il faudrait v�rifier l'existence de cette page
        define('NUM_PAGE', intval($_GET['pagecom']));
    }

// D�claration de la variable de session
    if (empty($_SESSION['formpayse'])) {
        $_SESSION['formpayse'] = array();
    }

    if (empty($_SESSION['formpayse'])) {
        $_SESSION['formpayse'] = array();
        $_SESSION['formpayse'][1] = array(
            'idpays' => $_GET["idpays"],
            'codepe' => $row["codepays"],
            'payse' => $row["libellepays"],
            'indicee' => $row["indicepays"]
        );
    }


    switch (NUM_PAGE) {

        case 2:

            // R�cup�ration des informations du formulaire pr�c�dent
            if (!empty($_POST)) {

                $_SESSION['formpayse'][NUM_PAGE - 1] = array(
                    'idpays' => $_GET["idpays"],
                    'codepe' => strtoupper(trim(htmlspecialchars($_POST["codepe"]))),
                    'payse' => ucwords(trim(htmlspecialchars($_POST["payse"]))),
                    'indicee' => trim(htmlspecialchars($_POST["indicee"]))
                );
            }
            require('./sotcocogpages/sotcocogparametre/sotcocogpays/sotcocogediter/form_terminer.php');
            break;

        case 1:
        default:
            // Valeurs par d�faut
            if (empty($_SESSION['formpayse'][NUM_PAGE])) {
                $_SESSION['formpayse'][NUM_PAGE] = array(
                    'idpays' => $_GET["idpays"],
                    'codepe' => $row["codepays"],
                    'payse' => $row["libellepays"],
                    'indicee' => $row["indicepays"]
                );
            } else if (($_SESSION['formpayse'][1]['idpays'] != $_GET["idpays"])) {
                $_SESSION['formpayse'][NUM_PAGE] = array(
                    'idpays' => $_GET["idpays"],
                    'codepe' => $row["codepays"],
                    'payse' => $row["libellepays"],
                    'indicee' => $row["indicepays"]
                );
            }
            require('sotcocogpages/sotcocogparametre/sotcocogpays/sotcocogediter/form_edit_pays.php');
            break;
    }
}
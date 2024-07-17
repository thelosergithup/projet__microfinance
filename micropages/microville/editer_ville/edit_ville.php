
<?php

if (isset($_REQUEST["idville"])) {
    $id = $_REQUEST["idville"];
    $rslt = $con->query("select * from ville where idville='" . $id . "'") or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($rslt);
// R�cup�ration du num�ro de l'�tape en cours
    if (empty($_GET['pagecom']) or ! is_numeric($_GET['pagecom'])) {
        define('NUM_PAGE', 1);
    } else {
        // En situation r�elle, il faudrait v�rifier l'existence de cette page
        define('NUM_PAGE', intval($_GET['pagecom']));
    }

// D�claration de la variable de session
    if (empty($_SESSION['formvillee'])) {
        $_SESSION['formvillee'] = array();
    }

    if (empty($_SESSION['formvillee'])) {
        $_SESSION['formvillee'] = array();
        $_SESSION['formvillee'][1] = array(
            'idville' => $_GET["idville"],
            'regione' => $row["idregion"],
            'villee' => $row["nomville"]
        );
    }


    switch (NUM_PAGE) {

        case 2:

            // R�cup�ration des informations du formulaire pr�c�dent
            if (!empty($_POST)) {

                $_SESSION['formvillee'][NUM_PAGE - 1] = array(
                    'idville' => $_GET["idville"],
                    'regione' => trim(htmlspecialchars($_POST["regione"])),
                    'villee' => ucwords(trim(htmlspecialchars($_POST["nomvillee"])))
                );
            }
            require('./micropages/microville/editer_ville/formterminer_ville.php');
            break;
        case 1:
        default:
            // Valeurs par d�faut
            if (empty($_SESSION['formvillee'][NUM_PAGE])) {
                $_SESSION['formvillee'][NUM_PAGE] = array(
                    'idville' => $_GET["idville"],
                    'regione' => $row["idregion"],
                    'villee' => $row["nomville"]
                );
            } else if (($_SESSION['formvillee'][1]['idville'] != $_GET["idville"])) {
                $_SESSION['formvillee'][NUM_PAGE] = array(
                    'idville' => $_GET["idville"],
                    'regione' => $row["idregion"],
                    'villee' => $row["nomville"]
                );
            }
            require('micropages/microville/editer_ville/formedit_ville.php');
            break;
    }
}
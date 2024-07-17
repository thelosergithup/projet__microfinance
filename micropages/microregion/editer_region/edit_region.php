
<?php

if (isset($_REQUEST["idregion"])) {
    $id = $_REQUEST["idregion"];
    $rslt = $con->query("select * from region where idregion='" . $id . "'") or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($rslt);
// R�cup�ration du num�ro de l'�tape en cours
    if (empty($_GET['pagecom']) or ! is_numeric($_GET['pagecom'])) {
        define('NUM_PAGE', 1);
    } else {
        // En situation r�elle, il faudrait v�rifier l'existence de cette page
        define('NUM_PAGE', intval($_GET['pagecom']));
    }

// D�claration de la variable de session
    if (empty($_SESSION['formregione'])) {
        $_SESSION['formregione'] = array();
    }

    if (empty($_SESSION['formregione'])) {
        $_SESSION['formregione'] = array();
        $_SESSION['formregione'][1] = array(
            'idregion' => $_GET["idregion"],
            'codee' => $row["coderegion"],
            'regione' => $row["nomregion"],
//            'indicee' => $row["indicepays"]
        );
    }


    switch (NUM_PAGE) {

        case 2:

            // R�cup�ration des informations du formulaire pr�c�dent
            if (!empty($_POST)) {

                $_SESSION['formregione'][NUM_PAGE - 1] = array(
                    'idregion' => $_GET["idregion"],
                    'codee' => strtoupper(trim(htmlspecialchars($_POST["codee"]))),
                    'regione' => ucwords(trim(htmlspecialchars($_POST["regione"]))),
//                    'indicee' => trim(htmlspecialchars($_POST["indicee"]))
                );
            }
            require('./micropages/microregion/editer_region/formterminer_region.php');
            break;

        case 1:
        default:
            // Valeurs par d�faut
            if (empty($_SESSION['formregione'][NUM_PAGE])) {
                $_SESSION['formregione'][NUM_PAGE] = array(
                    'idregion' => $_GET["idregion"],
                    'codee' => $row["coderegion"],
                    'regione' => $row["nomregion"],
//                    'indicee' => $row["indicepays"]
                );
            } else if (($_SESSION['formregione'][1]['idregion'] != $_GET["idregion"])) {
                $_SESSION['formregione'][NUM_PAGE] = array(
                    'idregion' => $_GET["idregion"],
                    'codee' => $row["coderegion"],
                    'regione' => $row["nomregion"],
//                    'indicee' => $row["indicepays"]
                );
            }
            require('micropages/microregion/editer_region/formedit_region.php');
            break;
    }
}



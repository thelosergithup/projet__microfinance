
<?php

if (isset($_REQUEST["idagence"])) {
    $id = $_REQUEST["idagence"];
    $rslt = $con->query("select * from agence where idag='" . $id . "'") or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($rslt);
// R�cup�ration du num�ro de l'�tape en cours
    if (empty($_GET['pagecom']) or ! is_numeric($_GET['pagecom'])) {
        define('NUM_PAGE', 1);
    } else {
        // En situation r�elle, il faudrait v�rifier l'existence de cette page
        define('NUM_PAGE', intval($_GET['pagecom']));
    }

// D�claration de la variable de session
    if (empty($_SESSION['formagencee'])) {
        $_SESSION['formagencee'] = array();
    }

    if (empty($_SESSION['formagencee'])) {
        $_SESSION['formagencee'] = array();
        $_SESSION['formagencee'][1] = array(
            'idagence' => $_GET["idagence"],
            'villee' => $row["idville"],
            'agencee' => $row["nomag"],
            'adressee' => $row["adresseag"],
            'tele' => $row["telag"],
            'emaile' => $row["emailag"]
        );
    }


    switch (NUM_PAGE) {

        case 2:

            // R�cup�ration des informations du formulaire pr�c�dent
            if (!empty($_POST)) {

                $_SESSION['formagencee'][NUM_PAGE - 1] = array(
                    'idagence' => $_GET["idagence"],
                    'villee' => trim(htmlspecialchars($_POST["villee"])),
                    'agencee' => ucwords(trim(htmlspecialchars($_POST["agencee"]))),
                    'adressee' => ucwords(trim(htmlspecialchars($_POST["adressee"]))),
                    'tele' => ucwords(trim(htmlspecialchars($_POST["tele"]))),
                    'emaile' => ucwords(trim(htmlspecialchars($_POST["emaile"])))
                );
            }
            require('./micropages/microagence/editer_agence/form_terminer.php');
            break;

        case 1:
        default:
            // Valeurs par d�faut
            if (empty($_SESSION['formagencee'][NUM_PAGE])) {
                $_SESSION['formagencee'][NUM_PAGE] = array(
                    'idagence' => $_GET["idagence"],
                    'villee' => $row["idville"],
                    'agencee' => $row["nomag"],
                    'adressee' => $row["adresseag"],
                    'tele' => $row["telag"],
                    'emaile' => $row["emailag"]
                        
                );
            } else if (($_SESSION['formagencee'][1]['idagence'] != $_GET["idagence"])) {
                $_SESSION['formagencee'][NUM_PAGE] = array(
                    'idagence' => $_GET["idagence"],
                    'villee' => $row["idville"],
                   'agencee' => $row["nomag"],
                   'adressee' => $row["adresseag"],
                    'tele' => $row["telag"],
                    'emaile' => $row["emailag"]
                    
                );
            }
            require('micropages/microagence/editer_agence/form_edit_agence.php');
            break;
    }
}
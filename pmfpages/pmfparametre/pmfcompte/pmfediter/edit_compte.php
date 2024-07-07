
<?php

if (isset($_REQUEST["idcompte"])) {
    $id = $_REQUEST["idcompte"];
   // $rslt = $con->query("select * from compte where idcompte='" . $id . "'") or die(mysqli_error($con));
    
    $rslt = $con->query("
        SELECT *
        FROM compte c
        LEFT JOIN client cl ON c.idclient = cl.idclient
        LEFT JOIN typecompte tc ON c.idtypecom = tc.idtypecom") or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($rslt);
    
// R�cup�ration du num�ro de l'�tape en cours
    if (empty($_GET['pagecom']) or ! is_numeric($_GET['pagecom'])) {
        define('NUM_PAGE', 1);
    } else {
        // En situation r�elle, il faudrait v�rifier l'existence de cette page
        define('NUM_PAGE', intval($_GET['pagecom']));
    }

// D�claration de la variable de session
    if (empty($_SESSION['formcomptee'])) {
        $_SESSION['formcomptee'] = array();
    }

    if (empty($_SESSION['formcomptee'])) {
        $_SESSION['formcomptee'] = array();
        $_SESSION['formcomptee'][1] = array(
            'idcompte' => $_GET["idcompte"],
            'typecomptee' => $row["idtypecom"],
            'comptee' => $row["nomtypecom"],
            'soldee' => $_GET["solde"],
            'devisee' => $_GET["devise"],
            'idcompte' => $_GET["idcompte"],
        
        );
    }


    switch (NUM_PAGE) {

        case 2:

            // R�cup�ration des informations du formulaire pr�c�dent
            if (!empty($_POST)) {

                $_SESSION['formcomptee'][NUM_PAGE - 1] = array(
                    'idcompte' => $_GET["idcompte"],
                    'typecomptee' => trim(htmlspecialchars($_POST["typecomptee"])),
                    'comptee' => ucwords(trim(htmlspecialchars($_POST["comptee"])))
                );
            }
            require('./pmfpages/pmfparametre/pmfcompte/pmfediter/form_terminer.php');
            break;

        case 1:
        default:
            // Valeurs par d�faut
            if (empty($_SESSION['formcomptee'][NUM_PAGE])) {
                $_SESSION['formcomptee'][NUM_PAGE] = array(
                    'idcompte' => $_GET["idcompte"],
                    'typecomptee' => $row["idtyprcom"],
                    'comptee' => $row["nomtypecom"]
                );
            } else if (($_SESSION['formcomptee'][1]['idcompte'] != $_GET["idcompte"])) {
                $_SESSION['formcomptee'][NUM_PAGE] = array(
                    'idcompte' => $_GET["idcompte"],
                    'typrcomptee' => $row["idtyprcom"],
                    'comptee' => $row["nontypecom"]
                );
            }
            require('pmfpages/pmfparametre/pmfcompte/pmfediter/form_edit_compte.php');
            break;
    }
}
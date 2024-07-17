

<?php

if (isset($_REQUEST["idclient"])) {
    $id = $_REQUEST["idclient"];
    $rslt = $con->query("select * from client where idclient='" . $id . "'") or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($rslt);
// R�cup�ration du num�ro de l'�tape en cours
    if (empty($_GET['pagecom']) or ! is_numeric($_GET['pagecom'])) {
        define('NUM_PAGE', 1);
    } else {
        // En situation r�elle, il faudrait v�rifier l'existence de cette page
        define('NUM_PAGE', intval($_GET['pagecom']));
    }

// D�claration de la variable de session
    if (empty($_SESSION['formcliente'])) {
        $_SESSION['formcliente'] = array();
    }

    if (empty($_SESSION['formcliente'])) {
        $_SESSION['formcliente'] = array();
        $_SESSION['formcliente'][1] = array(
            'idclient' => $_GET["idclient"],
            'idagence' => $_GET["idagence"],
            'idutilisateur' => $_GET["idutilisateur"],
            'nome' => $row["nomclient"],
            'prenome' => $row["prenomclient"],
            'sexee' => $row["sexeclient"],
            'dateNaisse' => $row["dateNaissclient"],
            'cnie' => $row["cniclient"],
            'tele' => $row["telclient"],
            'emaile' => $row["emailclient"],
            'photostring' => $row["photoclient"],
            'photoe' => NULL,
            'nationalitee' => $row["nationaliteclient"],
            'logine' => $row["loginclient"],
            'pass1e' => NULL,
            'pass2e' => NULL
        );
    }


switch (NUM_PAGE) {

    case 2:
        // Récupération des informations du formulaire précédent
        if (!empty($_POST)) {
            $erreurprod = FALSE;
            $log = $_SESSION['formcliente'][NUM_PAGE - 1];
            // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
            if (isset($_FILES['photoe']) AND $_FILES['photoe']['error'] == 0) {
                // Testons si le fichier n'est pas trop gros
                if ($_FILES['photoe']['size'] <= 2000000) {
                    // Testons si l'extension est autorisée
                    $infosfichier = pathinfo($_FILES['photoe']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'JPEG', 'png', 'PNG', 'jpeg', 'JPG');
                    if (in_array($extension_upload, $extensions_autorisees)) {
                        $log = $_FILES['photoe'];
                        $erreurprod = FALSE;
                    } else {

                        $erreurprod = TRUE;
                        echo"<script language='javascript'>alert('extension photo nom autorisée')</script>";
                    }
                } else {

                    $erreurprod = TRUE;
                    echo"<script language='javascript'>alert('photo trop grande')</script>";
                }
            } else {
                $log = NULL;
                $erreurprod = FALSE;
            }

            $_SESSION['formcliente'][NUM_PAGE - 1] = array(
                    'idclient' => $_GET["idclient"],
                    'idagence' => $_GET["idagence"],
                    'iduser' => $_GET["idutilisateur"],
                    'nome' => trim(htmlspecialchars($_POST["nome"])),
                    'prenome' => trim(htmlspecialchars($_POST["prenome"])),
                    'sexee' => trim(htmlspecialchars($_POST["sexee"])),
                    'dateNaisse' => trim(htmlspecialchars($_POST["dateNaisse"])),
                    'cnie' => trim(htmlspecialchars($_POST["cnie"])),
                    'tele' => trim(htmlspecialchars($_POST["tele"])),
                    'emaile' => trim(htmlspecialchars($_POST["emaile"])),
                    'nationalitee' => trim(htmlspecialchars($_POST["nationalitee"])),
                    'logine' => trim(htmlspecialchars($_POST["logine"])),
                    'pass1e' => trim(htmlspecialchars($_POST["pass1e"])),
                    'pass2e' => trim(htmlspecialchars($_POST["pass2e"]))
                );
        }
        if ((isset($erreurprod)) && ($erreurprod)) {
            $pag = 'micropages/microclient/editer_client/edit_client';
            $stag = 1;
            die('<meta http-equiv="refresh" content="0; URL='.$url.'?page=' . base64_encode($pag) . '&pagecom=' . $stag . '">');
          
        } else {
        require('micropages/microclient/editer_client/form_terminer.php');
        break;
        }

    case 1:
    default:
        // Valeurs par défaut
        if (empty($_SESSION['formcliente'][NUM_PAGE])) {

            $_SESSION['formcliente'][NUM_PAGE] = array(
                   'idclient' => $_GET["idclient"],
                    'idagence' => $_GET["idagence"],
                    'idutilisateur' => $_GET["idutilisateur"],
                    'nome' => $row["nomclient"],
                    'prenome' => $row["prenomclient"],
                    'sexee' => $row["sexeclient"],
                    'dateNaisse' => $row["dateNaissclient"],
                    'cnie' => $row["cniclient"],
                    'tele' => $row["telclient"],
                    'emaile' => $row["emailclient"],
                    'photostring' => $row["photoclient"],
                    'photoe' => NULL,
                    'nationalitee' => $row["nationaliteclient"],
                    'logine' => $row["loginclient"],
                    'pass1e' => NULL,
                    'pass2e' => NULL
                );
        } else if (($_SESSION['formcliente'][NUM_PAGE]["idclient"]!=$_REQUEST["idclient"])) {

            $_SESSION['formcliente'][NUM_PAGE] = array(
                   'idclient' => $_GET["idclient"],
                    'idagence' => $_GET["idagence"],
                    'idutilisateur' => $_GET["idutilisateur"],
                    'nome' => $row["nomclient"],
                    'prenome' => $row["prenomclient"],
                    'sexee' => $row["sexeclient"],
                    'dateNaisse' => $row["dateNaissclient"],
                    'cnie' => $row["cniclient"],
                    'tele' => $row["telclient"],
                    'emaile' => $row["emailclient"],
                    'photostring' => $row["photoclient"],
                    'photoe' => NULL,
                    'nationalitee' => $row["nationaliteclient"],
                    'logine' => $row["loginclient"],
                    'pass1e' => NULL,
                    'pass2e' => NULL
                );
        }
        require('micropages/microclient/editer_client/form_edit_client.php');
        break;
}
}
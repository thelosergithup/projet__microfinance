<?php

// Récupération du numéro de l'étape en cours
if (empty($_GET['pagecom']) or !is_numeric($_GET['pagecom'])) {
    define('NUM_PAGE', 1);
} else {
    // En situation réelle, il faudrait vérifier l'existence de cette page
    define('NUM_PAGE', intval($_GET['pagecom']));
}

// Déclaration de la variable de session
if (empty($_SESSION['formclient'])) {
    $_SESSION['formclient'] = array();
}

switch (NUM_PAGE) {

    case 2:
        // Récupération des informations du formulaire précédent
        if (!empty($_POST)) {
            $erreurprod = FALSE;
            $log = $_SESSION['formclient'][NUM_PAGE - 1]["photo"];
            // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
            if (isset($_FILES['photo']) and $_FILES['photo']['error'] == 0) {
                // Testons si le fichier n'est pas trop gros
                if ($_FILES['photo']['size'] <= 2000000) {
                    // Testons si l'extension est autorisée
                    $infosfichier = pathinfo($_FILES['photo']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'JPEG', 'png', 'PNG', 'jpeg', 'JPG');
                    if (in_array($extension_upload, $extensions_autorisees)) {
                        $log = $_FILES['photo'];
                        $erreurprod = FALSE;
                    } else {

                        $erreurprod = TRUE;
                        echo "<script language='javascript'>alert('extension photo nom autorisée')</script>";
                    }
                } else {

                    $erreurprod = TRUE;
                    echo "<script language='javascript'>alert('photo trop grande')</script>";
                }
            } else {
                $log = NULL;
                $erreurprod = FALSE;
            }

            $_SESSION['formclient'][NUM_PAGE - 1] = array(
                //                'entete' => trim(htmlspecialchars($_POST["entete"])),
                //                'departement' => trim(htmlspecialchars($_POST["departement"])),
                'agence' => trim(htmlspecialchars($_POST["idag"])),
                //'utilisateur' => trim(htmlspecialchars($_POST["iduser"])),
                //                'client' => ucwords(trim(htmlspecialchars($_POST["client"]))),
                'nom' => ucwords(trim(htmlspecialchars($_POST["nom"]))),
                'prenom' => trim(htmlspecialchars($_POST["prenom"])),
                'sexe' => trim(htmlspecialchars($_POST["sexe"])),
                'dateNaiss' => trim(htmlspecialchars($_POST["dateNaiss"])),
                'cni' => trim(htmlspecialchars($_POST["cni"])),
                'tel' => trim(htmlspecialchars($_POST["tel"])),
                'email' => trim(htmlspecialchars($_POST["email"])),
                'photo' => $log,
                'nationalite' => trim(htmlspecialchars($_POST["nationalite"])),
                'login' => trim(htmlspecialchars($_POST["login"])),
                'pass1' => trim(htmlspecialchars($_POST["pass1"])),
                'pass2' => trim(htmlspecialchars($_POST["pass2"]))

            );
        }
        if ((isset($erreurprod)) && ($erreurprod)) {
            $pag = 'micropages/microclient/ajouter_client/ajout_client';
            $stag = 1;
            die('<meta http-equiv="refresh" content="0; URL=' . $url . '?page=' . base64_encode($pag) . '&pagecom=' . $stag . '">');
        } else {
            require('micropages/microclient/ajouter_client/form_terminer.php');
            break;
        }

    case 1:
    default:
        // Valeurs par défaut
        if (empty($_SESSION['formclient'][NUM_PAGE])) {

            $_SESSION['formclient'][NUM_PAGE] = array(
                //                'entete' => NULL,
                //                'departement' => NULL,
                'agence' => '',
                //'utilisateur' => '',
                //            'client' => '',
                'nom' => '',
                'prenom' => '',
                'sexe' => '',
                'dateNaiss' => '',
                'cni' => '',
                'tel' => '',
                'email' => '',
                'photo' => NULL,
                'nationalite' => '',
                'login' => '',
                'pass1' => '',
                'pass2' => ''
            );
        }
        require('micropages/microclient/ajouter_client/form_ajouter_client.php');
        break;
}

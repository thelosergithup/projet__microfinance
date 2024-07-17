<?php

// Récupération du numéro de l'étape en cours
if (empty($_GET['pagecom']) or ! is_numeric($_GET['pagecom'])) {
    define('NUM_PAGE', 1);
} else {
    // En situation réelle, il faudrait vérifier l'existence de cette page
    define('NUM_PAGE', intval($_GET['pagecom']));
}

// Déclaration de la variable de session
if (empty($_SESSION['formville'])) {
    $_SESSION['formville'] = array();
}

switch (NUM_PAGE) {

    case 2:
        // Récupération des informations du formulaire précédent
        if (!empty($_POST)) {
//            $erreurprod = FALSE;
//            $log = $_SESSION['formutilisateur'][NUM_PAGE - 1]["photo"];
//            // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
//            if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0) {
//                // Testons si le fichier n'est pas trop gros
//                if ($_FILES['photo']['size'] <= 2000000) {
//                    // Testons si l'extension est autorisée
//                    $infosfichier = pathinfo($_FILES['photo']['name']);
//                    $extension_upload = $infosfichier['extension'];
//                    $extensions_autorisees = array('jpg', 'JPEG', 'png', 'PNG', 'jpeg', 'JPG');
//                    if (in_array($extension_upload, $extensions_autorisees)) {
//                        $log = $_FILES['photo'];
//                        $erreurprod = FALSE;
//                    } else {
//
//                        $erreurprod = TRUE;
//                        echo"<script language='javascript'>alert('extension photo nom autorisée')</script>";
//                    }
//                } else {
//
//                    $erreurprod = TRUE;
//                    echo"<script language='javascript'>alert('photo trop grande')</script>";
//                }
//            } else {
//                $log = NULL;
//                $erreurprod = FALSE;
//            }

            $_SESSION['formville'][NUM_PAGE - 1] = array(
//                'entete' => trim(htmlspecialchars($_POST["entete"])),
//                'departement' => trim(htmlspecialchars($_POST["departement"])),
                'region' => trim(htmlspecialchars($_POST["idregion"])),
                'ville' => (trim(htmlspecialchars($_POST["nomville"])))
                
            );
        }
        if ((isset($erreurprod)) && ($erreurprod)) {
            $pag = 'micropages/microville/ajouter_ville/ajout_ville';
            $stag = 1;
            die('<meta http-equiv="refresh" content="0; URL='.$url .'?page=' . base64_encode($pag) . '&pagecom=' . $stag . '">');
            
        } else {
        require('micropages/microville/ajouter_ville/form_terminer.php');
        break;
        }

    case 1:
    default:
        // Valeurs par défaut
        if (empty($_SESSION['formville'][NUM_PAGE])) {

            $_SESSION['formville'][NUM_PAGE] = array(
                'region' => '',
                'ville' => ''
                
            );
        }
        require('micropages/microville/ajouter_ville/formajout_ville.php');
        break;
}
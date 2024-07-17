
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
    if (empty($_SESSION['formutilisateurep'])) {
        $_SESSION['formutilisateurep'] = array();
    }

    if (empty($_SESSION['formutilisateurep'])) {
        $_SESSION['formutilisateurep'] = array();
        $_SESSION['formutilisateurep'][1] = array(
            'idutilisateur' => $_GET["idutilisateur"],
                'nome' => $row["nomuser"],
                'prenome' => $row["prenomuser"],
                'photostring' => $row["photouser"],
                'photoe' => NULL,
                'emaile' => $row["emailuser"],
                'tele' => $row["teluser"],
                'lignee' => $row["ligneuser"],
                'genree' => $row["genreuser"],
                'logine' => $row["loginuser"],
                'pass1e' => NULL,
                'pass2e' => NULL
        );
    }


switch (NUM_PAGE) {

    case 2:
        // Récupération des informations du formulaire précédent
        if (!empty($_POST)) {
            $erreurprod = FALSE;
            $log = $_SESSION['formutilisateurep'][NUM_PAGE - 1]["photoe"];
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

            $_SESSION['formutilisateurep'][NUM_PAGE - 1] = array(
            'idutilisateur' => $_GET["idutilisateur"],
                'nome' => trim(htmlspecialchars($_POST["nome"])),
                'prenome' => trim(htmlspecialchars($_POST["prenome"])),
                'photoe' => $log,
                'tele' => trim(htmlspecialchars($_POST["tele"])),
                'lignee' => trim(htmlspecialchars($_POST["lignee"])),
                'emaile' => trim(htmlspecialchars($_POST["emaile"])),
                'genree' => trim(htmlspecialchars($_POST["genree"])),
                'logine' => trim(htmlspecialchars($_POST["logine"])),
                'pass1e' => trim(htmlspecialchars($_POST["pass1e"])),
                'pass2e' => trim(htmlspecialchars($_POST["pass2e"]))
            );
        }
        if ((isset($erreurprod)) && ($erreurprod)) {
            $pag = 'sotcocogpages/sotcocogutilisateur/sotcocogediterprofil/edit_utilisateur';
            $stag = 1;
            die('<meta http-equiv="refresh" content="0; URL='.$url.'?page=' . base64_encode($pag) . '&pagecom=' . $stag . '">');
            
        } else {
        require('sotcocogpages/sotcocogutilisateur/sotcocogediterprofil/form_terminer.php');
        break;
        }

    case 1:
    default:
        // Valeurs par défaut
        if (empty($_SESSION['formutilisateurep'][NUM_PAGE])) {

            $_SESSION['formutilisateurep'][NUM_PAGE] = array(
            'idutilisateur' => $_GET["idutilisateur"],
                'nome' => $row["nomuser"],
                'prenome' => $row["prenomuser"],
                'photostring' => $row["photouser"],
                'photoe' => NULL,
                'emaile' => $row["emailuser"],
                'tele' => $row["teluser"],
                'lignee' => $row["ligneuser"],
                'genree' => $row["genreuser"],
                'logine' => $row["loginuser"],
                'pass1e' => NULL,
                'pass2e' => NULL
            );
        } else if (($_SESSION['formutilisateurep'][NUM_PAGE]["idutilisateur"]!=$_REQUEST["idutilisateur"])) {

            $_SESSION['formutilisateurep'][NUM_PAGE] = array(
            'idutilisateur' => $_GET["idutilisateur"],
                'nome' => $row["nomuser"],
                'prenome' => $row["prenomuser"],
                'photostring' => $row["photouser"],
                'photoe' => NULL,
                'emaile' => $row["emailuser"],
                'tele' => $row["teluser"],
                'lignee' => $row["ligneuser"],
                'genree' => $row["genreuser"],
                'logine' => $row["loginuser"],
                'pass1e' => NULL,
                'pass2e' => NULL
            );
        }
        require('sotcocogpages/sotcocogutilisateur/sotcocogediterprofil/form_edit_utilisateur.php');
        break;
}
}
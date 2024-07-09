<?php


//fonction pour ajouter un utilisateur
function inserer_utilisateur($reg, $con){
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    if (($reg != NULL) && isset($reg["1"])) {
        $req = $con->query("select * from utilisateur where loginuser='" . $reg["1"]['login'] . "' and passuser='" . sha1($reg["1"]['pass1']) . "'") or die(mysqli_error($con));
        $row = mysqli_num_rows($req);
        if ($row == 0) {
            $nomP = addslashes($reg["1"]['nom']);
            $prenomP = addslashes($reg["1"]['prenom']);
            $log = NULL;
            if ($reg["1"]['photo'] != NULL) {

                // on va vérifier que la nouvelle utilisateur n'existe pas déja
                if (!is_dir("pmfupload/profil/")) {
                    // puis on créer les 1 dossier, qui contiendra les originaux 
                    // avec tous les droits ( écriture, lecture , suppression )
                    @mkdir("pmfupload/profil/", 0777);
                    // on fait une vérification sur la création pour le retour à l'utilisateur
                    if (is_dir("pmfupload/profil/")) {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($reg["1"]['photo']['tmp_name'], "pmfupload/profil/" . basename($reg["1"]['photo']['name']));

                        $log = $reg["1"]['photo']['name'];
                    } else {
                        echo "<script language='javascript'>$('div.creationdoc').show('slow').delay(8000).hide('slow');</script>";
                        $pagp = 'pmfpages/pmfutilisateur/pmfajouter/ajout_utilisateur';
                        die('<meta http-equiv="refresh" content="6 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
                        //                        echo "<p>Une erreur est survenu durant la cr&eacute;ation de votre utilisateur </br> Veuillez contacter votre administrateur</p>";
                    }
                } else {

                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($reg["1"]['photo']['tmp_name'], "pmfupload/profil/" . basename($reg["1"]['photo']['name']));

                    $log = $reg["1"]['photo']['name'];
                }
            } else {
                if ($reg["1"]['genre'] == "Monsieur") {
                    $log = "masculin.png";
                } else {
                    $log = "feminin.png";
                }
            }

            $con->query("insert into utilisateur(nomuser, prenomuser,emailuser,roleuser,cniuser, dateajoutuser,  "
                . "loginuser, passuser,teluser,photouser) values( '$nomP', "
                . "'$prenomP', '" . $reg["1"]['email'] . "', '" . addslashes($reg["1"]['role']) . "', '" . addslashes($_POST["cni"]) . "', NOW(), "
                . "'" . $reg["1"]['login'] . "', '" . sha1($reg["1"]['pass1']) . "', '" . $reg["1"]['tel'] . "', '" . $log . "')") or die(mysqli_error($con));

            unset($_SESSION['formutilisateur']);
            echo "<script language='javascript'>$('div.addok').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'pmfpages/pmfutilisateur/lister_utilisateur';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        } else {
            echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'pmfpages/pmfutilisateur/pmfajouter/ajout_utilisateur';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        }
    }
}

//fonction pour lister les utilisateurs
function lister_utilisateur($con){
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    $rsltuser = $con->query("select * from utilisateur ") or die(mysqli_error($con));

    while ($recuser = mysqli_fetch_assoc($rsltuser)) {
?>
        <tr>
             <td></td>
            <td>
                <img class="img-rounded" style="width: 50px;" src="pmfupload/profil/<?php print nl2br(htmlspecialchars($recuser["photouser"])); ?>">
            </td>
            <td><?php print nl2br(htmlspecialchars($recuser["nomuser"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["prenomuser"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["emailuser"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["teluser"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["roleuser"])) ?></td>
            
            <td><?php print nl2br(htmlspecialchars($recuser["loginuser"])) ?></td>
           
            <td><?php  print nl2br(htmlspecialchars($recuser["cniuser"])) ?></td>
             <!--td><?php //print nl2br(htmlspecialchars($recuser["dateajoutuser"])) ?></td-->
            <!--td><?php// print nl2br(htmlspecialchars($recuser["loginuser"])) ?></td-->
           

            <td>
                <?php
                if (($recuser["roleuser"] != "administrateur")) {
                    if ($_SESSION["iduser"] != $recuser["iduser"]) {
                        if ($recuser["etatuser"]) {
                ?>
                            <a href='<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfutilisateur/utilisateur_ajax'); ?>&idutilisateur=<?php echo $recuser["iduser"]; ?>&desactiver=desactiver' onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Désactiver cet Utilisateur ?'));">
                                <span title="Activ&eacute;" data-toggle="tooltip" alt="oui" class="label-success label">Activ&eacute;</span>
                            </a>
                        <?php
                        } else {
                        ?>
                            <a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfutilisateur/utilisateur_ajax'); ?>&idutilisateur=<?php echo $recuser["iduser"]; ?>&activer=activer" onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Activer cet Utilisateur ?'));">
                                <span title="D&eacute;sactiv&eacute; " data-toggle="tooltip" alt="non" class="label-warning label">D&eacute;sactiv&eacute;</span>
                            </a>
                        <?php
                        }
                    } else {
                        if ($recuser["etatuser"]) {
                        ?>
                            <span title="Activ&eacute;" data-toggle="tooltip" alt="oui" class="label-success label">Activ&eacute;</span>
                        <?php
                        } else {
                        ?>
                            <span title="D&eacute;sactiv&eacute; " data-toggle="tooltip" alt="non" class="label-warning label">D&eacute;sactiv&eacute;</span>
                <?php
                        }
                    }
                }
                ?>
            </td>
            <td><?php print nl2br(htmlspecialchars($recuser["dateajoutuser"])) ?></td>
            <td>
                <?php
                if (($recuser["roleuser"] != "administrateur")) {
                ?>
                    <a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfutilisateur/pmfediter/edit_utilisateur'); ?>&idutilisateur=<?php echo $recuser["iduser"]; ?>">
                        <span title="Modifier cette utilisateur" alt="editer"><i class="glyphicon glyphicon-edit"></i></span>
                    </a>
                <?php
                }
                ?>
            </td>
        </tr>
    <?php
    }
}

function update_utilisateur($reg, $con)
{
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    if (($reg != NULL) && isset($reg["1"])) {
        $req = $con->query("select * from utilisateur where loginuser='" . $reg["1"]['logine'] . "' and passuser='" . sha1($reg["1"]['pass1e']) . "'") or die(mysqli_error($con));
        $row = mysqli_num_rows($req);
        $nomP = addslashes($reg["1"]['nome']);
        $prenomP = addslashes($reg["1"]['prenome']);
        $pa = NULL;
        if ($reg["1"]['pass1e'] != NULL) {
            $pa = sha1($reg["1"]['pass1e']);
        }
        if ($row == 0) {
            $log = NULL;
            if ($reg["1"]['photoe'] != NULL) {

                // on va vérifier que la nouvelle utilisateur n'existe pas déja
                if (!is_dir("pmfupload/profil/")) {
                    // puis on créer les 1 dossier, qui contiendra les originaux 
                    // avec tous les droits ( écriture, lecture , suppression )
                    @mkdir("pmfupload/profil/", 0777);
                    // on fait une vérification sur la création pour le retour à l'utilisateur
                    if (is_dir("pmfupload/profil/")) {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($reg["1"]['photoe']['tmp_name'], "pmfupload/profil/" . basename($reg["1"]['photoe']['name']));

                        $log = $reg["1"]['photoe']['name'];
                    } else {
                        echo "<script language='javascript'>$('div.creationdoc').show('slow').delay(8000).hide('slow');</script>";
                        $pagp = 'pmfpages/pmfutilisateur/pmfediter/edit_utilisateur';
                        die('<meta http-equiv="refresh" content="6 ; URL=' . $url . '?page=' . base64_encode($pagp) . '&idutilisateur=' . $reg["1"]["idutilisateur"] . '">');
                        //                        echo "<p>Une erreur est survenu durant la cr&eacute;ation de votre utilisateur </br> Veuillez contacter votre administrateur</p>";
                    }
                } else {

                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($reg["1"]['photoe']['tmp_name'], "pmfupload/profil/" . basename($reg["1"]['photoe']['name']));

                    $log = $reg["1"]['photoe']['name'];
                }
            }

            if ($log != NULL) {
                if ($pa != NULL) {
                    $con->query("update utilisateur set  nomuser='$nomP', "
                        . "prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "', emailuser='" . $reg["1"]['emaile'] . "',cniuser='" . $reg["1"]['cnie'] . "' "
                        . "roleuser='" . addslashes($reg["1"]['rolee']) . "', loginuser='" . $reg["1"]['logine'] . "', passuser='" . $pa . "', photouser='" . $log . "'"
                        . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));
                } else {
                    $con->query("update utilisateur set  nomuser='$nomP', "
                        . "prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "', emailuser='" . $reg["1"]['emaile'] . "', cniuser='" . $reg["1"]['cnie'] . "', "
                        . "roleuser='" . addslashes($reg["1"]['rolee']) . "', loginuser='" . $reg["1"]['logine'] . "', photouser='" . $log . "'"
                        . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));
                }
            } else {
                if ($pa != NULL) {
                    $con->query("update utilisateur set  nomuser='$nomP', "
                        . "prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "',  emailuser='" . $reg["1"]['emaile'] . "', cniuser='" . $reg["1"]['cnie'] . "', "
                        . "roleuser='" . addslashes($reg["1"]['rolee']) . "', loginuser='" . $reg["1"]['logine'] . "', passuser='" . $pa . "' "
                        . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));
                } else {
                    $con->query("update utilisateur set  nomuser='$nomP', "
                        . "prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "',  emailuser='" . $reg["1"]['emaile'] . "', cniuser='" . $reg["1"]['cnie'] . "', "
                        . "roleuser='" . addslashes($reg["1"]['rolee']) . "', loginuser='" . $reg["1"]['logine'] . "' "
                        . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));
                }
            }

            unset($_SESSION['formutilisateure']);
            echo "<script language='javascript'>$('div.addok').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'pmfpages/pmfutilisateur/lister_utilisateur';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        } else {
            $rowv = mysqli_fetch_assoc($req);
            if ($rowv["iduser"] == $reg["1"]["idutilisateur"]) {
                $log = NULL;
                if ($reg["1"]['photoe'] != NULL) {

                    // on va vérifier que la nouvelle utilisateur n'existe pas déja
                    if (!is_dir("pmfupload/profil/")) {
                        // puis on créer les 1 dossier, qui contiendra les originaux 
                        // avec tous les droits ( écriture, lecture , suppression )
                        @mkdir("pmfupload/profil/", 0777);
                        // on fait une vérification sur la création pour le retour à l'utilisateur
                        if (is_dir("pmfupload/profil/")) {
                            // On peut valider le fichier et le stocker définitivement
                            move_uploaded_file($reg["1"]['photoe']['tmp_name'], "pmfupload/profil/" . basename($reg["1"]['photoe']['name']));

                            $log = $reg["1"]['photoe']['name'];
                        } else {
                            echo "<script language='javascript'>$('div.creationdoc').show('slow').delay(8000).hide('slow');</script>";
                            $pagp = 'pmfpages/pmfutilisateur/pmfediter/edit_utilisateur';
                            die('<meta http-equiv="refresh" content="6 ; URL=' . $url . '?page=' . base64_encode($pagp) . '&idutilisateur=' . $reg["1"]["idutilisateur"] . '">');
                            //                        echo "<p>Une erreur est survenu durant la cr&eacute;ation de votre utilisateur </br> Veuillez contacter votre administrateur</p>";
                        }
                    } else {

                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($reg["1"]['photoe']['tmp_name'], "pmfupload/profil/" . basename($reg["1"]['photoe']['name']));

                        $log = $reg["1"]['photoe']['name'];
                    }
                }

                if ($log != NULL) {
                    if ($pa != NULL) {
                        $con->query("update utilisateur set  nomuser='$nomP', "
                            . "prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "', ligneuser='" . $reg["1"]['lignee'] . "', emailuser='" . $reg["1"]['emaile'] . "', genreuser='" . $reg["1"]['genree'] . "', "
                            . "roleuser='" . addslashes($reg["1"]['rolee']) . "', loginuser='" . $reg["1"]['logine'] . "', motdepasseuser='" . $pa . "', photouser='" . $log . "'"
                            . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));
                    } else {
                        $con->query("update utilisateur set  nomuser='$nomP', "
                            . "prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "', ligneuser='" . $reg["1"]['lignee'] . "', emailuser='" . $reg["1"]['emaile'] . "', genreuser='" . $reg["1"]['genree'] . "', "
                            . "roleuser='" . addslashes($reg["1"]['rolee']) . "', loginuser='" . $reg["1"]['logine'] . "', photouser='" . $log . "'"
                            . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));
                    }
                } else {
                    if ($pa != NULL) {
                        $con->query("update utilisateur set  nomuser='$nomP', "
                            . "prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "', emailuser='" . $reg["1"]['emaile'] . "', cniuser='" . $reg["1"]['cnie'] . "', "
                            . "roleuser='" . addslashes($reg["1"]['rolee']) . "', loginuser='" . $reg["1"]['logine'] . "', passuser='" . $pa . "' "
                            . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));
                    } else {
                        $con->query("update utilisateur set  nomuser='$nomP', "
                            . "prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "', emailuser='" . $reg["1"]['emaile'] . "', cniuser='" . $reg["1"]['cnie'] . "', "
                            . "roleuser='" . addslashes($reg["1"]['rolee']) . "', loginuser='" . $reg["1"]['logine'] . "' "
                            . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));
                    }
                }

                unset($_SESSION['formutilisateure']);
                echo "<script language='javascript'>$('div.addok').show('slow').delay(8000).hide('slow');</script>";
                $pagp = 'pmfpages/pmfutilisateur/lister_utilisateur';
                die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
            } else {
                echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
                $pagp = 'pmfpages/pmfutilisateur/pmfediter/edit_utilisateur';
                die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '&idutilisateur=' . $reg["1"]["idutilisateur"] . '">');
            }
        }
    }
}

function update_utilisateur_profil($reg, $con)
{
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    if (($reg != NULL) && isset($reg["1"])) {
        $req = $con->query("select * from utilisateur where loginuser='" . $reg["1"]['logine'] . "' and passuser='" . sha1($reg["1"]['pass1e']) . "'") or die(mysqli_error($con));
        $row = mysqli_num_rows($req);
        $nomP = addslashes($reg["1"]['nome']);
        $prenomP = addslashes($reg["1"]['prenome']);
        $pa = NULL;
        if ($reg["1"]['pass1e'] != NULL) {
            $pa = sha1($reg["1"]['pass1e']);
        }
        if ($row == 0) {
            $log = NULL;
            if ($reg["1"]['photoe'] != NULL) {

                // on va vérifier que la nouvelle utilisateur n'existe pas déja
                if (!is_dir("pmfupload/profil/")) {
                    // puis on créer les 1 dossier, qui contiendra les originaux 
                    // avec tous les droits ( écriture, lecture , suppression )
                    @mkdir("pmfupload/profil/", 0777);
                    // on fait une vérification sur la création pour le retour à l'utilisateur
                    if (is_dir("pmfupload/profil/")) {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($reg["1"]['photoe']['tmp_name'], "pmfupload/profil/" . basename($reg["1"]['photoe']['name']));

                        $log = $reg["1"]['photoe']['name'];
                    } else {
                        echo "<script language='javascript'>$('div.creationdoc').show('slow').delay(8000).hide('slow');</script>";
                        $pagp = 'pmfpages/pmfutilisateur/pmfediterprofil/edit_utilisateur';
                        die('<meta http-equiv="refresh" content="6 ; URL=' . $url . '?page=' . base64_encode($pagp) . '&idutilisateur=' . $reg["1"]["idutilisateur"] . '">');
                        //                        echo "<p>Une erreur est survenu durant la cr&eacute;ation de votre utilisateur </br> Veuillez contacter votre administrateur</p>";
                    }
                } else {

                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($reg["1"]['photoe']['tmp_name'], "pmfupload/profil/" . basename($reg["1"]['photoe']['name']));

                    $log = $reg["1"]['photoe']['name'];
                }
            }

            if ($log != NULL) {
                if ($pa != NULL) {
                    $con->query("update utilisateur set nomuser='$nomP', prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "',  emailuser='" . $reg["1"]['emaile'] . "', "
                        . "cniuser='" . $reg["1"]['cnie'] . "', loginuser='" . $reg["1"]['logine'] . "', passuser='" . $pa . "', photouser='" . $log . "'"
                        . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));

                    $_SESSION["nomuser"] = $nomP;
                    $_SESSION["prenomuser"] = $prenomP;
                    $_SESSION["teluser"] = $reg["1"]['tele'];
                    $_SESSION["emailuser"] = $reg["1"]['emaile'];
                    $_SESSION["loginuser"] = $reg["1"]['logine'];
                    $_SESSION["passworduser"] = $pa;
                    $_SESSION["photouser"] = $log;
                } else {
                    $con->query("update utilisateur set nomuser='$nomP', prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "',  emailuser='" . $reg["1"]['emaile'] . "', "
                        . "cniuser='" . $reg["1"]['cnie'] . "', loginuser='" . $reg["1"]['logine'] . "', photouser='" . $log . "'"
                        . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));

                    $_SESSION["nomuser"] = $nomP;
                    $_SESSION["prenomuser"] = $prenomP;
                    $_SESSION["teluser"] = $reg["1"]['tele'];
                    $_SESSION["emailuser"] = $reg["1"]['emaile'];
                    $_SESSION["loginuser"] = $reg["1"]['logine'];
                    $_SESSION["photouser"] = $log;
                }
            } else {
                if ($pa != NULL) {
                    $con->query("update utilisateur set nomuser='$nomP', prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "', ligneuser='" . $reg["1"]['lignee'] . "', emailuser='" . $reg["1"]['emaile'] . "', "
                        . "cniuser='" . $reg["1"]['cnie'] . "', loginuser='" . $reg["1"]['logine'] . "', passuser='" . $pa . "' "
                        . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));

                    $_SESSION["nomuser"] = $nomP;
                    $_SESSION["prenomuser"] = $prenomP;
                    $_SESSION["teluser"] = $reg["1"]['tele'];
                    $_SESSION["emailuser"] = $reg["1"]['emaile'];
                    $_SESSION["loginuser"] = $reg["1"]['logine'];
                    $_SESSION["passworduser"] = $pa;
                } else {
                    $con->query("update utilisateur set nomuser='$nomP', prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "', ligneuser='" . $reg["1"]['lignee'] . "', emailuser='" . $reg["1"]['emaile'] . "', "
                        . "cniuser='" . $reg["1"]['cnie'] . "', loginuser='" . $reg["1"]['logine'] . "' "
                        . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));

                    $_SESSION["nomuser"] = $nomP;
                    $_SESSION["prenomuser"] = $prenomP;
                    $_SESSION["teluser"] = $reg["1"]['tele'];
                    $_SESSION["emailuser"] = $reg["1"]['emaile'];
                    $_SESSION["loginuser"] = $reg["1"]['logine'];
                }
            }

            unset($_SESSION['formutilisateurep']);
            echo "<script language='javascript'>$('div.addok').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'pmfpages/pmfutilisateur/info_user';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        } else {

            $rowv = mysqli_fetch_assoc($req);
            if ($rowv["iduser"] == $reg["1"]["idutilisateur"]) {
                $log = NULL;
                if ($reg["1"]['photoe'] != NULL) {

                    // on va vérifier que la nouvelle utilisateur n'existe pas déja
                    if (!is_dir("pmfupload/profil/")) {
                        // puis on créer les 1 dossier, qui contiendra les originaux 
                        // avec tous les droits ( écriture, lecture , suppression )
                        @mkdir("pmfupload/profil/", 0777);
                        // on fait une vérification sur la création pour le retour à l'utilisateur
                        if (is_dir("pmfupload/profil/")) {
                            // On peut valider le fichier et le stocker définitivement
                            move_uploaded_file($reg["1"]['photoe']['tmp_name'], "pmfupload/profil/" . basename($reg["1"]['photoe']['name']));

                            $log = $reg["1"]['photoe']['name'];
                        } else {
                            echo "<script language='javascript'>$('div.creationdoc').show('slow').delay(8000).hide('slow');</script>";
                            $pagp = 'pmfpages/pmfutilisateur/pmfediterprofil/edit_utilisateur';
                            die('<meta http-equiv="refresh" content="6 ; URL=' . $url . '?page=' . base64_encode($pagp) . '&idutilisateur=' . $reg["1"]["idutilisateur"] . '">');
                            //                        echo "<p>Une erreur est survenu durant la cr&eacute;ation de votre utilisateur </br> Veuillez contacter votre administrateur</p>";
                        }
                    } else {

                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($reg["1"]['photoe']['tmp_name'], "pmfupload/profil/" . basename($reg["1"]['photoe']['name']));

                        $log = $reg["1"]['photoe']['name'];
                    }
                }

                if ($log != NULL) {
                    if ($pa != NULL) {

                        $con->query("update utilisateur set nomuser='$nomP', "
                            . "prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "', emailuser='" . $reg["1"]['emaile'] . "', cniuser='" . $reg["1"]['cnie'] . "', "
                            . "loginuser='" . $reg["1"]['logine'] . "', passuser='" . $pa . "', photouser='" . $log . "'"
                            . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));
                    } else {

                        $con->query("update utilisateur set nomuser='$nomP', "
                            . "prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "', emailuser='" . $reg["1"]['emaile'] . "', cniuser='" . $reg["1"]['cnie'] . "', "
                            . "loginuser='" . $reg["1"]['logine'] . "', photouser='" . $log . "'"
                            . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));
                    }
                } else {
                    if ($pa != NULL) {


                        $con->query("update utilisateur set nomuser='$nomP', "
                            . "prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "', emailuser='" . $reg["1"]['emaile'] . "', cniuser='" . $reg["1"]['cnie'] . "', "
                            . "loginuser='" . $reg["1"]['logine'] . "', passuser='" . $pa . "' "
                            . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));
                    } else {

                        $con->query("update utilisateur set nomuser='$nomP', "
                            . "prenomuser='$prenomP', teluser='" . $reg["1"]['tele'] . "', emailuser='" . $reg["1"]['emaile'] . "', cniuser='" . $reg["1"]['cnie'] . "', "
                            . "loginuser='" . $reg["1"]['logine'] . "' "
                            . " where iduser='" . $reg["1"]['idutilisateur'] . "'") or die(mysqli_error($con));
                    }
                }

                unset($_SESSION['formutilisateurep']);
                echo "<script language='javascript'>$('div.addok').show('slow').delay(8000).hide('slow');</script>";
                $pagp = 'pmfpages/pmfutilisateur/info_user';

                die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page= $pagp ">');
            } else {
                echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
                $pagp = 'pmfpages/pmfutilisateur/pmfediterprofil/edit_utilisateur';
                die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '&idutilisateur=' . $reg["1"]["idutilisateur"] . '">');
            }
        }
    }
}


//fonction pour lister les signatures
function lister_signature($id, $con)
{
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    $rsltuser = $con->query("select * from sot_signature where iduser='" . $id . "' ") or die(mysqli_error($con));
    $nb = 0;
    while ($recuser = mysqli_fetch_assoc($rsltuser)) {
        $nb = $nb + 1;
    ?>
        <tr>
            <td>
                <?php print $nb; ?>
            </td>
            <td><?php print nl2br(htmlspecialchars($recuser["codesignature"])) ?></td>
            <td>
                <?php
                if ($recuser["etatsignature"]) {
                ?>
                    <span title="Signature Activ&eacute;e" alt="desactiver"> <i class="fa fa-check-circle"></i></span>
                <?php
                } else {
                ?>
                    <a href='<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfutilisateur/pmfsignature/lister_signature'); ?>&idutilisateur=<?php echo $id; ?>' onclick=activer_sign_utilisateur(<?php echo $recuser["idsignature"]; ?>)>
                        <span title="Activer cette signature " alt="activer"> <i class="fa fa-remove"></i></span>
                    </a>
                <?php
                }
                ?>
            </td>
            <td><?php print nl2br(htmlspecialchars($recuser["datesignature"])) ?></td>
            <td>
                <?php
                ?>
                <a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfutilisateur/pmfsignature/pmfediter/edit_signature'); ?>&idsignature=<?php echo $recuser["idsignature"]; ?>">
                    <span title="Modifier cette utilisateur" alt="editer"><i class="glyphicon glyphicon-edit"></i></span>
                </a>
                <?php
                ?>
            </td>
        </tr>
<?php
    }
}

//fonction pour ajouter un signature
function inserer_signature($reg, $con)
{
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    if (($reg != NULL) && isset($reg["1"])) {
        $req = $con->query("select * from sot_signature where codesignature='" . addslashes($reg["1"]['code']) . "'") or die(mysqli_error($con));
        $row = mysqli_num_rows($req);
        $idu = $reg["1"]['idutilisateur'];
        if ($row == 0) {
            $con->query("update sot_signature set etatsignature=0 where iduser='" . $idu . "'") or die(mysqli_error($con));

            $con->query("insert into sot_signature(iduser, codesignature, datesignature) values('" . $idu . "', "
                . "'" . addslashes($reg["1"]['code']) . "', NOW())") or die(mysqli_error($con));

            unset($_SESSION['formsignature']);
            echo "<script language='javascript'>$('div.addok').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'pmfpages/pmfutilisateur/pmfsignature/lister_signature';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '&idutilisateur=' . $idu . '">');
        } else {
            echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'pmfpages.pmfutilisateur/pmfsignature/pmfajouter/ajout_signature';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '&idutilisateur=' . $idu . '">');
        }
    }
}

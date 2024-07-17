<?php

//fonction pour ajouter un client
function inserer_client($reg, $con)
{
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    if (($reg != NULL) && isset($reg["1"])) {
        $req = $con->query("select * from client where nomclient='" . addslashes($reg["1"]["nom"]) . "'") or die(mysqli_error($con));
        $row = mysqli_num_rows($req);
        if ($row == 0) {
            $nomP = addslashes($reg["1"]['nom']);
            $prenomP = addslashes($reg["1"]['prenom']);
            $log = NULL;
            if ($reg["1"]['photo'] != NULL) {

                // on va vérifier que le nouvelle client n'existe pas déja
                if (!is_dir("microupload/profil/")) {
                    // puis on créer les 1 dossier, qui contiendra les originaux 
                    // avec tous les droits ( écriture, lecture , suppression )
                    @mkdir("microupload/profil/", 0777);
                    // on fait une vérification sur la création pour le retour au client
                    if (is_dir("microupload/profil/")) {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($reg["1"]['photo']['tmp_name'], "microupload/profil/" . basename($reg["1"]['photo']['name']));

                        $log = $reg["1"]['photo']['name'];
                    } else {
                        echo "<script language='javascript'>$('div.creationdoc').show('slow').delay(8000).hide('slow');</script>";
                        $pagp = 'micropages/microclient/ajouter_client/ajout_client';
                        die('<meta http-equiv="refresh" content="6 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
                        //                        echo "<p>Une erreur est survenu durant la cr&eacute;ation de votre utilisateur </br> Veuillez contacter votre administrateur</p>";
                    }
                } else {

                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($reg["1"]['photo']['tmp_name'], "microupload/profil/" . basename($reg["1"]['photo']['name']));

                    $log = $reg["1"]['photo']['name'];
                }
            } else {

                if ($reg["1"]['sexe'] == "Masculin") {
                    $log = "masculin.jpeg";
                } else {
                    $log = "feminin.png";
                }
            }

            $con->query("INSERT INTO client(nomclient,idag,prenomclient,sexeclient,dateNaissclient,cniclient,telclient,emailclient,photoclient,nationaliteclient,dateajoutclient,loginclient,passclient) 
            VALUES('" . addslashes($reg["1"]["nom"]) . "', '" . $reg["1"]["agence"] . "',
            '" . addslashes($reg["1"]["prenom"]) . "','" . $reg["1"]['sexe'] . "','" . $reg["1"]['dateNaiss'] . "', '" . $reg["1"]['cni'] . "','" . $reg["1"]['tel'] . "','" . $reg["1"]['email'] . "', '" . $log . "',  '" . $reg["1"]['nationalite'] . "', NOW(),
            '" . $reg["1"]['login'] . "','" . sha1($reg["1"]['pass1']) . "')") or die(mysqli_error($con));

            unset($_SESSION['formclient']);
            echo "<script language='javascript'>$('div.addok').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'micropages/microclient/lister_client';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        } else {
            echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'micropages/microclient/ajouter_client/ajout_client';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        }
    }
}

//fonction pour lister les clients
function lister_client($con)
{
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    $rsltuser = $con->query("select * from client as c left join agence as a on c.idag=a.idag ") or die(mysqli_error($con));
    while ($recuser = mysqli_fetch_assoc($rsltuser)) {
?>
        <tr>
            <td></td>
            <td><?php print nl2br(htmlspecialchars($recuser["idclient"])) ?></td>
            <td>
                <img class="img-rounded" style="width: 50px;" src="pmfupload/profil/<?php print nl2br(htmlspecialchars($recuser["photoclient"])); ?>">
            </td>
            <td><?php print nl2br(htmlspecialchars($recuser["nomclient"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["nomag"])) ?></td>
            <!-- <td><?php //print nl2br(htmlspecialchars($recuser["nomuser"])) 
                        ?></td> -->
            <td><?php print nl2br(htmlspecialchars($recuser["prenomclient"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["sexeclient"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["dateNaissclient"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["cniclient"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["telclient"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["emailclient"])) ?></td>

            <td><?php print nl2br(htmlspecialchars($recuser["nationaliteclient"])) ?></td>
            <td>
                <?php
                //                if (($recuser["roleuser"] != "Administrateur")) {
                //                    if ($_SESSION["iduser"]!=$recuser["iduser"]) {
                if ($recuser["etatclient"]) {
                ?>
                    <a href='<?= $url; ?>?page=<?php echo base64_encode('micropages/microclient/client_ajax'); ?>&idclient=<?php echo $recuser["idclient"]; ?>&desactiver=desactiver' onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Désactiver ce client?'));">
                        <span title="Activ&eacute;" data-toggle="tooltip" alt="oui" class="label-success label">Activ&eacute;</span>
                        <!--</a>-->
                    <?php
                } else {
                    ?>
                        <a href="<?= $url; ?>?page=<?php echo base64_encode('micropages/microclient/client_ajax'); ?>&idclient=<?php echo $recuser["idclient"]; ?>&activer=activer" onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Activer ce client ?'));">
                            <span title="D&eacute;sactiv&eacute; " data-toggle="tooltip" alt="non" class="label-warning label">D&eacute;sactiv&eacute;</span>
                        </a>
                    <?php
                }
                    ?>
            </td>
            <td><?php print nl2br(htmlspecialchars($recuser["dateajoutclient"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["loginclient"])) ?></td>
           
        </tr>
<?php
    }
}

function update_client($reg, $con)
{
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    if (($reg != NULL) && isset($reg["1"])) {
        $req = $con->query("select * from client where nomclient='" . addslashes($reg["1"]["nome"]) . "'") or die(mysqli_error($con));
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
                if (!is_dir("microupload/profil/")) {
                    // puis on créer les 1 dossier, qui contiendra les originaux 
                    // avec tous les droits ( écriture, lecture , suppression )
                    @mkdir("microupload/profil/", 0777);
                    // on fait une vérification sur la création pour le retour à l'utilisateur
                    if (is_dir("microupload/profil/")) {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($reg["1"]['photoe']['tmp_name'], "microupload/profil/" . basename($reg["1"]['photoe']['name']));

                        $log = $reg["1"]['photoe']['name'];
                    } else {
                        echo "<script language='javascript'>$('div.creationdoc').show('slow').delay(8000).hide('slow');</script>";
                        $pagp = 'micropages/microclient/editer_client/edit_client';
                        die('<meta http-equiv="refresh" content="6 ; URL=' . $url . '?page=' . base64_encode($pagp) . '&idclient=' . $reg["1"]["idclient"] . '">');
                        //                        echo "<p>Une erreur est survenu durant la cr&eacute;ation de votre utilisateur </br> Veuillez contacter votre administrateur</p>";
                    }
                } else {

                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($reg["1"]['photoe']['tmp_name'], "microupload/profil/" . basename($reg["1"]['photoe']['name']));

                    $log = $reg["1"]['photoe']['name'];
                }
            }

            if ($log != NULL) {
                if ($pa != NULL) {
                    $con->query("update client set idag and iduser='" . $reg["1"]["agencee"] . "','" . $reg["1"]["utilisateure"] . "', nomclient='" . addslashes($reg["1"]["nome"]) . "' ,"
                        . "prenomclient='" . addslashes($reg["1"]["prenome"]) . "', emailclient='" . $reg["1"]['emaile'] . "',sexeclient='" . $reg["1"]['sexee'] . "',dateNaissclient='" . $reg["1"]['dateNaisse'] . "',cniclient='" . $reg["1"]['cnie'] . "',telclient='" . $reg["1"]['tele'] . "',emailclient='" . $reg["1"]['emaile'] . "', photouser='" . $log . "'  "
                        . " nationaliteclient='" . $reg["1"]['nationalitee'] . "',loginuser='" . $reg["1"]['logine'] . "', passuser='" . $pa . "', "
                        . " where idclient='" . $reg["1"]["idclient"] . "'") or die(mysqli_error($con));
                } else {
                    $con->query("update client set  idag and iduser='" . $reg["1"]["agencee"] . "','" . $reg["1"]["utilisateure"] . "', nomclient='" . addslashes($reg["1"]["nome"]) . "' ,"
                        . "prenomclient='" . addslashes($reg["1"]["prenome"]) . "', emailclient='" . $reg["1"]['emaile'] . "',sexeclient='" . $reg["1"]['sexee'] . "',dateNaissclient='" . $reg["1"]['dateNaisse'] . "',cniclient='" . $reg["1"]['cnie'] . "',telclient='" . $reg["1"]['tele'] . "',emailclient='" . $reg["1"]['emaile'] . "' "
                        . " nationaliteclient='" . $reg["1"]['nationalitee'] . "',loginuser='" . $reg["1"]['logine'] . "', passuser='" . $pa . "', "
                        . " where idclient='" . $reg["1"]["idclient"] . "'") or die(mysqli_error($con));
                }
                //            } else {
                //                if ($pa != NULL) {
                //                    $con->query("update client set idag and iduser='" . $reg["1"]["agencee"] . "','" . $reg["1"]["utilisateure"] . "', nomclient='" . addslashes($reg["1"]["nome"]) . "' ,"
                //                                    . "prenomclient='".addslashes($reg["1"]["prenome"]) . "', emailclient='" . $reg["1"]['emaile'] . "',sexeclient='" . $reg["1"]['sexee'] . "',dateNaissclient='" . $reg["1"]['dateNaisse'] . "',cniclient='" . $reg["1"]['cnie'] . "',telclient='" . $reg["1"]['tele'] . "',emailclient='" . $reg["1"]['emaile'] . "', photouser='" . $log . "'  "
                //                                    . " nationaliteclient='" . $reg["1"]['nationalitee'] . "',loginuser='" . $reg["1"]['logine'] . "', passuser='" . $pa . "', "
                //                                    . " where idclient='" . $reg["1"]["idclient"] . "'") or die(mysqli_error($con));
                //                } else {
                //                    $con->query("update client set  idag and iduser='" . $reg["1"]["agencee"] . "','" . $reg["1"]["utilisateure"] . "', nomclient='" . addslashes($reg["1"]["nome"]) . "' ,"
                //                                    . "prenomclient='".addslashes($reg["1"]["prenome"]) . "', emailclient='" . $reg["1"]['emaile'] . "',sexeclient='" . $reg["1"]['sexee'] . "',dateNaissclient='" . $reg["1"]['dateNaisse'] . "',cniclient='" . $reg["1"]['cnie'] . "',telclient='" . $reg["1"]['tele'] . "',emailclient='" . $reg["1"]['emaile'] . "' "
                //                                    . " nationaliteclient='" . $reg["1"]['nationalitee'] . "',loginuser='" . $reg["1"]['logine'] . "' "
                //                                    . " where idclient='" . $reg["1"]["idclient"] . "'") or die(mysqli_error($con));
                //                }
                //            }

                unset($_SESSION['formcliente']);
                echo "<script language='javascript'>$('div.editok').show('slow').delay(8000).hide('slow');</script>";
                $pagp = 'micropages/microclient/lister_client';
                die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
            } else {
                $rowv = mysqli_fetch_assoc($req);
                if ($rowv["idclient"] == $reg["1"]["idclient"]) {
                    $log = NULL;
                    if ($reg["1"]['photoe'] != NULL) {

                        // on va vérifier que la nouvelle utilisateur n'existe pas déja
                        if (!is_dir("microupload/profil/")) {
                            // puis on créer les 1 dossier, qui contiendra les originaux 
                            // avec tous les droits ( écriture, lecture , suppression )
                            @mkdir("microupload/profil/", 0777);
                            // on fait une vérification sur la création pour le retour à l'utilisateur
                            if (is_dir("microupload/profil/")) {
                                // On peut valider le fichier et le stocker définitivement
                                move_uploaded_file($reg["1"]['photoe']['tmp_name'], "microupload/profil/" . basename($reg["1"]['photoe']['name']));

                                $log = $reg["1"]['photoe']['name'];
                            } else {
                                echo "<script language='javascript'>$('div.creationdoc').show('slow').delay(8000).hide('slow');</script>";
                                $pagp = 'micropages/microclient/editer_client/edit_client';
                                die('<meta http-equiv="refresh" content="6 ; URL=' . $url . '?page=' . base64_encode($pagp) . '&idclient=' . $reg["1"]["idclient"] . '">');
                                //                        echo "<p>Une erreur est survenu durant la cr&eacute;ation de votre utilisateur </br> Veuillez contacter votre administrateur</p>";
                            }
                        } else {

                            // On peut valider le fichier et le stocker définitivement
                            move_uploaded_file($reg["1"]['photoe']['tmp_name'], "microupload/profil/" . basename($reg["1"]['photoe']['name']));

                            $log = $reg["1"]['photoe']['name'];
                        }
                    }

                    if ($log != NULL) {
                        if ($pa != NULL) {
                            $con->query("update client set  idag and iduser='" . $reg["1"]["agencee"] . "','" . $reg["1"]["utilisateure"] . "', nomclient='" . addslashes($reg["1"]["nome"]) . "' ,"
                                . "prenomclient='" . addslashes($reg["1"]["prenome"]) . "', emailclient='" . $reg["1"]['emaile'] . "',sexeclient='" . $reg["1"]['sexee'] . "',dateNaissclient='" . $reg["1"]['dateNaisse'] . "',cniclient='" . $reg["1"]['cnie'] . "',telclient='" . $reg["1"]['tele'] . "',emailclient='" . $reg["1"]['emaile'] . "', photouser='" . $log . "'  "
                                . " nationaliteclient='" . $reg["1"]['nationalitee'] . "',loginuser='" . $reg["1"]['logine'] . "', passuser='" . $pa . "', "
                                . " where idclient='" . $reg["1"]["idclient"] . "'") or die(mysqli_error($con));
                        } else {
                            $con->query("update client set idag and iduser='" . $reg["1"]["agencee"] . "','" . $reg["1"]["utilisateure"] . "', nomclient='" . addslashes($reg["1"]["nome"]) . "' ,"
                                . "prenomclient='" . addslashes($reg["1"]["prenome"]) . "', emailclient='" . $reg["1"]['emaile'] . "',sexeclient='" . $reg["1"]['sexee'] . "',dateNaissclient='" . $reg["1"]['dateNaisse'] . "',cniclient='" . $reg["1"]['cnie'] . "',telclient='" . $reg["1"]['tele'] . "',emailclient='" . $reg["1"]['emaile'] . "', photouser='" . $log . "'  "
                                . " nationaliteclient='" . $reg["1"]['nationalitee'] . "',loginuser='" . $reg["1"]['logine'] . "', passuser='" . $pa . "', "
                                . " where idclient='" . $reg["1"]["idclient"] . "'") or die(mysqli_error($con));
                        }
                        //                } else {
                        //                    if ($pa != NULL) {
                        //                        $con->query("update client set  idag and iduser='" . $reg["1"]["agencee"] . "','" . $reg["1"]["utilisateure"] . "', nomclient='" . addslashes($reg["1"]["nome"]) . "' ,"
                        //                                    . "prenomclient='".addslashes($reg["1"]["prenome"]) . "', emailclient='" . $reg["1"]['emaile'] . "',sexeclient='" . $reg["1"]['sexee'] . "',dateNaissclient='" . $reg["1"]['dateNaisse'] . "',cniclient='" . $reg["1"]['cnie'] . "',telclient='" . $reg["1"]['tele'] . "',emailclient='" . $reg["1"]['emaile'] . "'  "
                        //                                    . " nationaliteclient='" . $reg["1"]['nationalitee'] . "',loginuser='" . $reg["1"]['logine'] . "', passuser='" . $pa . "', "
                        //                                    . " where idclient='" . $reg["1"]["idclient"] . "'") or die(mysqli_error($con));
                        //                    } else {
                        //                        $con->query("update client set  idag and iduser='" . $reg["1"]["agencee"] . "','" . $reg["1"]["utilisateure"] . "', nomclient='" . addslashes($reg["1"]["nome"]) . "' ,"
                        //                                    . "prenomclient='".addslashes($reg["1"]["prenome"]) . "', emailclient='" . $reg["1"]['emaile'] . "',sexeclient='" . $reg["1"]['sexee'] . "',dateNaissclient='" . $reg["1"]['dateNaisse'] . "',cniclient='" . $reg["1"]['cnie'] . "',telclient='" . $reg["1"]['tele'] . "',emailclient='" . $reg["1"]['emaile'] . "'  "
                        //                                    . " nationaliteclient='" . $reg["1"]['nationalitee'] . "',loginuser='" . $reg["1"]['logine'] . "' "
                        //                                    . " where idclient='" . $reg["1"]["idclient"] . "'") or die(mysqli_error($con));
                        //                    }
                        //                }

                        unset($_SESSION['formcliente']);
                        echo "<script language='javascript'>$('div.editok').show('slow').delay(8000).hide('slow');</script>";
                        $pagp = 'micropages/microclient/lister_client';
                        die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
                    } else {
                        echo "<script language='javascript'>$('div.editok').show('slow').delay(8000).hide('slow');</script>";
                        $pagp = 'micropages/microclient/editer_client/edit_client';
                        die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '&idclient=' . $reg["1"]["idclient"] . '">');
                    }
                }
            }
        }
    }
}

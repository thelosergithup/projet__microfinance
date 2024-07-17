

<?php

//fonction pour ajouter un utilisateur
function inserer_region($reg, $con) {
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    if (($reg != NULL) && isset($reg["1"])) {
        $req = $con->query("select * from region where coderegion='" . $reg["1"]['code'] . "' or nomregion='" . addslashes($reg["1"]['region']) . "'") or die(mysqli_error($con));
      $nb = mysqli_num_rows($req);
        if ($nb  == 0) {
//            $nomP = addslashes($reg["1"]['nom']);
//            $prenomP = addslashes($reg["1"]['prenom']);
//            $log = NULL;
//            if ($reg["1"]['photo'] != NULL) {
//
//// on va vérifier que la nouvelle utilisateur n'existe pas déja
//                if (!is_dir("microupload/profil/")) {
//// puis on créer les 1 dossier, qui contiendra les originaux 
//// avec tous les droits ( écriture, lecture , suppression )
//                    @mkdir("microupload/profil/", 0777);
//// on fait une vérification sur la création pour le retour à l'utilisateur
//                    if (is_dir("microupload/profil/")) {
//// On peut valider le fichier et le stocker définitivement
//                        move_uploaded_file($reg["1"]['photo']['tmp_name'], "microupload/profil/" . basename($reg["1"]['photo']['name']));
//
//                        $log = $reg["1"]['photo']['name'];
//                    } else {
//                        echo "<script language='javascript'>$('div.creationdoc').show('slow').delay(8000).hide('slow');</script>";
//                        $pagp = 'micropages/utilisateurs/ajouter_utilisateur/ajout_utilisateur';
//                        die('<meta http-equiv="refresh" content="6 ; URL=' . $url  . '?page=' . base64_encode($pagp) . '">');
////                        echo "<p>Une erreur est survenu durant la cr&eacute;ation de votre utilisateur </br> Veuillez contacter votre administrateur</p>";
//                    }
//                } else {
//
//// On peut valider le fichier et le stocker définitivement
//                    move_uploaded_file($reg["1"]['photo']['tmp_name'], "microupload/profil/" . basename($reg["1"]['photo']['name']));
//
//                    $log = $reg["1"]['photo']['name'];
//                }
//            } else {
//                if ($reg["1"]['genre'] == "Monsieur") {
//                    $log = "masculin.png";
//                } else {
//                    $log = "feminin.png";
            $con->query("insert into region(nomregion,coderegion ,dateregion ) values( '" . addslashes($reg["1"]["region"]) . "', "
                    . "'" . $reg["1"]["code"] . "', now())") or die(mysqli_error($con));

            unset($_SESSION['formregion']);
            echo "<script language='javascript'>$('div.addok').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'micropages/microregion/lister_region';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        } else {
            echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'micropages/microregion/ajouter_region/ajout_region';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        }
    }
}

//fonction pour lister les utilisateurs
function lister_region($con) {
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    $rsltuser = $con->query("select * from region ") or die(mysqli_error($con));
    while ($recuser = mysqli_fetch_assoc($rsltuser)) {
        ?>
        <tr >
            <td></td>
            <td>
            <td><?php print nl2br(htmlspecialchars($recuser["coderegion"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["nomregion"])) ?></td>          
            
            <td>
                <?php
//                    if ($_SESSION["idregion"] != $recuser["idregion"]) {
                        if ($recuser["etatregion"]) {
                            ?>
                            <a href='<?= $url; ?>?page=<?php echo base64_encode('micropages/microregion/region_ajax'); ?>&idutilisateur=<?php echo $recuser["idregion"]; ?>&desactiver=desactiver' onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Désactiver cette region ?'));">
                                <span title="Activ&eacute;" data-toggle="tooltip" alt="oui" class="label-success label">Activ&eacute;</span>
                            </a>
                            <?php
                        } else {
                            ?>
                            <a href="<?= $url; ?>?page=<?php echo base64_encode('micropages/microregion/region_ajax'); ?>&idregion=<?php echo $recuser["idregion"]; ?>&activer=activer" onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Activer cette region?'));">
                                <span title="D&eacute;sactiv&eacute; " data-toggle="tooltip" alt="non" class="label-warning label">D&eacute;sactiv&eacute;</span>
                            </a>
                            <?php
                        }
                   
                ?>
            </td>
                <td><?php print nl2br(htmlspecialchars($recuser["dateregion"])) ?></td>
                <td>
               
                    <a href="<?= $url; ?>?page=<?php echo base64_encode('micropages/microregion/editer_region/edit_region'); ?>&idregion=<?php echo $recuser["idregion"]; ?>" >
                        <span title="Modifier cette region" alt="editer"><i class="glyphicon glyphicon-edit"></i></span>
                    </a>
                    &nbsp;&nbsp;
                     <a href="<?= $url; ?>?page=<?php echo base64_encode('micropages/microregion/lister_ville'); ?>&idregion=<?php echo $recuser["idregion"]; ?>" >
                    <span title="Lister les Villes de cette region" alt="ville"><i class="glyphicon glyphicon-list-alt"></i></span>
                     </a>
                    &nbsp;&nbsp;
                    <a href='<?= $url; ?>?page=<?php echo base64_encode('micropages/microregion/region_ajax'); ?>&idregion=<?php echo $recuser["idregion"]; ?>&supprimer=supprimer' onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Supprimer cette region ?'));" >
                        <span title="Supprimer cette region " alt="suppr">  <i class="glyphicon glyphicon-trash"></i></span>
                    </a>
                    <?php
              
                     ?>
                 </td>
            </tr>
        <?php
           
    }  
  
}                          


//function update_region($reg, $con) {
//    $path = $_SERVER['PHP_SELF'];
//    $url = basename($path);
//    if (($reg != NULL) && isset($reg["1"])) {
//        $req = $con->query("select * from region where coderegion='" . $reg["1"]['codee'] . "' or nomregion='" . addslashes($reg["1"]['regione']) . "'") or die(mysqli_error($con));
//        $nb  = mysqli_num_rows($req);
//       if ($row == 0) {
//            unset($_SESSION['formregione']);
//            echo "<script language='javascript'>$('div.addok').show('slow').delay(8000).hide('slow');</script>";
//            $pagp = 'micropages/microregion/lister_region';
//            die('<meta http-equiv="refresh" content="3 ; URL=' .  $url . '?page=' . base64_encode($pagp) . '">');
//        } else {
//            $ok = true;
//            $rowv = mysqli_fetch_assoc($req);
//            if ($rowv["idregion"] == $reg["1"]["idregion"]) {
//                 $ok = FALSE;
//            }
//        }
//            if ($ok) {
//                $con->query("update region set coderegion='" . $reg["1"]["codee"] . "', nomregion='" . addslashes($reg["1"]["payse"]) . "', where idregion='" . $reg["1"]["idregion"] . "'") or die(mysqli_error($con));
////            $con->query("insert into log(iduser,operation,dateLog) values('{$_SESSION['iduser']}','Mise a jour dans la table sot_pays de la valeure {$reg["1"]["pays"]}',now())") or die(mysqli_error($con));
//                unset($_SESSION['formregione']);
//                echo "<script language='javascript'>$('div.editok').show('slow').delay(8000).hide('slow');</script>";
//                $pagp = 'micropages/microregion/lister_region';
//                die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
//            } else {
//                echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
//                $pagp = 'micropages/microregion/editer_region/edit_region';
//                die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '&idregion=' . $reg["1"]["idregion"] . '">');
//            }
//        }
//    }
function update_region($reg, $con) {
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    if (($reg != NULL) && isset($reg["1"])) {
        $req = $con->query("select * from region where coderegion='" . $reg["1"]["codee"] . "' or nomregion='" . addslashes($reg["1"]["regione"]) . "'") or die(mysqli_error($con));
        $nb = mysqli_num_rows($req);
        if (($nb == 0)) {
            $con->query("update region set coderegion='" . $reg["1"]["codee"] . "', nomregion='" . addslashes($reg["1"]["regione"]) . "' where idregion='" . $reg["1"]["idregion"] . "'") or die(mysqli_error($con));
//            $con->query("insert into log(iduser,operation,dateLog) values('{$_SESSION['iduser']}','Mise a jour dans la table sot_pays de la valeure {$reg["1"]["pays"]}',now())") or die(mysqli_error($con));
            unset($_SESSION['formregione']);
            echo "<script language='javascript'>$('div.editok').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'micropages/microregion/lister_region';
            die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        } else {
            $ok = true;
            while ($rowv = mysqli_fetch_assoc($req)) {
                if ($rowv["idregion"] != $reg["1"]["idregion"]) {
                    $ok = FALSE;
                }
            }
            if ($ok) {
                $con->query("update region set coderegion='" . $reg["1"]["codee"] . "', nomregion='" . addslashes($reg["1"]["regione"]) . "' where idregion='" . $reg["1"]["idregion"] . "'") or die(mysqli_error($con));
//            $con->query("insert into log(iduser,operation,dateLog) values('{$_SESSION['iduser']}','Mise a jour dans la table sot_pays de la valeure {$reg["1"]["pays"]}',now())") or die(mysqli_error($con));
                unset($_SESSION['formregione']);
                echo "<script language='javascript'>$('div.editok').show('slow').delay(8000).hide('slow');</script>";
                $pagp = 'micropages/microregion/lister_region';
                die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
            } else {
                echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
                $pagp = 'micropages/microregion/microediter/edit_region';
                die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '&idregion=' . $reg["1"]["idregion"] . '">');
            }
        }
    }
}
//fonction pour lister les villes
function lister_ville_region($id, $con) {
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    $rsltuser = $con->query("select * from ville as v left join region as r on v.idregion=r.idregion where v.idregion='".$id."'") or die(mysqli_error($con));
    while ($recuser = mysqli_fetch_assoc($rsltuser)) {
        ?>
        <tr >
            <td></td>
            <td><?php print nl2br(htmlspecialchars($recuser["idville"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["nomville"])) ?></td>
            <td>
                <?php
                if ($recuser["etatville"]) {
                    ?>
                    <a href='<?= $url; ?>?page=<?php echo base64_encode('micropages/microville/ville_ajax'); ?>&idville=<?php echo $recuser["idville"]; ?>&desactiver=desactiver' onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Désactiver cette Ville ?'));">
                        <span title="Activ&eacute;" data-toggle="tooltip" alt="oui" class="label-success label">Activ&eacute;</span>
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="<?= $url; ?>?page=<?php echo base64_encode('micropages/microville/ville_ajax'); ?>&idville=<?php echo $recuser["idville"]; ?>&activer=activer" onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Activer cette Ville ?'));">
                        <span title="D&eacute;sactiv&eacute; " data-toggle="tooltip" alt="non" class="label-warning label">D&eacute;sactiv&eacute;</span>
                    </a>
                    <?php
                }
                ?>
            </td>
            <td><?php print nl2br(htmlspecialchars($recuser["dateville"])) ?></td>
            <td>
                <a href="<?= $url; ?>?page=<?php echo base64_encode('micropages/microville/editer_ville/edit_ville'); ?>&idville=<?php echo $recuser["idville"]; ?>" >
                    <span title="Modifier cette ville" alt="editer"><i class="glyphicon glyphicon-edit"></i></span>
                </a>
                &nbsp;&nbsp;
                <a href='<?= $url; ?>?page=<?php echo base64_encode('micropages/microville/ville_ajax'); ?>&idville=<?php echo $recuser["idville"]; ?>&supprimer=supprimer' onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Supprimer cette Ville ?'));" >
                    <span title="Supprimer cette Ville " alt="suppr">  <i class="glyphicon glyphicon-trash"></i></span>
                </a>
            </td>
        </tr>
        <?php
    }
}



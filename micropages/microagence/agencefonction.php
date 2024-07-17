<?php

//fonction pour ajouter une agence
function inserer_agence($reg, $con) {
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    if (($reg != NULL) && isset($reg["1"])) {
        $req = $con->query("select * from agence where nomag='" . addslashes($reg["1"]["agence"]) . "'") or die(mysqli_error($con));
        $nb = mysqli_num_rows($req);
        if (($nb == 0)) {
            $con->query("insert into agence(nomag,idville,adresseag,telag,emailag,horaireag) values('" . addslashes($reg["1"]["agence"]) . "', '" . $reg["1"]["ville"] . "', '" . $reg["1"]['adresse'] . "', '" . $reg["1"]['tel'] . "', '" . $reg["1"]['email'] . "',now())") or die(mysqli_error($con));
//            $con->query("insert into log(iduser,operation,dateLog) values('{$_SESSION['iduser']}','Ajout dans la table sot_ville de la valeure {$reg["1"]["ville"]}',now())") or die(mysqli_error($con));
            echo "<script language='javascript'>$('div.addok').show('slow').delay(8000).hide('slow');</script>";
            unset($_SESSION['formagence']);
            $pagp = 'micropages/microagence/lister_agence';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        } else {
            echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'micropages/microagence/ajouter_agence/ajout_agence';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        }
    }
}

//fonction pour lister les villes
function lister_agence($con) {
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    $rsltuser = $con->query("select * from agence as a left join ville as v on a.idville=v.idville") or die(mysqli_error($con));
    while ($recuser = mysqli_fetch_assoc($rsltuser)) {
        ?>
        <tr >
            <td></td>
            <td><?php print nl2br(htmlspecialchars($recuser["idag"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["nomag"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["nomville"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["adresseag"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["telag"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["emailag"])) ?></td>
            <td>
                <?php
                if ($recuser["etatag"]) {
                    ?>
                    <a href='<?= $url; ?>?page=<?php echo base64_encode('micropages/microagence/agence_ajax'); ?>&idagence=<?php echo $recuser["idag"]; ?>&desactiver=desactiver' onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Désactiver cette agence ?'));">
                        <span title="Activ&eacute;" data-toggle="tooltip" alt="oui" class="label-success label">Activ&eacute;</span>
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="<?= $url; ?>?page=<?php echo base64_encode('micropages/microagence/agence_ajax'); ?>&idagence=<?php echo $recuser["idag"]; ?>&activer=activer" onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Activer cette agence ?'));">
                        <span title="D&eacute;sactiv&eacute; " data-toggle="tooltip" alt="non" class="label-warning label">D&eacute;sactiv&eacute;</span>
                    </a>
                    <?php
                }
                ?>
            </td>
            <td><?php print nl2br(htmlspecialchars($recuser["horaireag"])) ?></td>
            <td>
                <a href="<?= $url; ?>?page=<?php echo base64_encode('micropages/microagence/editer_agence/edit_agence'); ?>&idagence=<?php echo $recuser["idag"]; ?>" >
                    <span title="Modifier cette agence" alt="editer"><i class="glyphicon glyphicon-edit"></i></span>
                </a>
                &nbsp;&nbsp;
                <a href='<?= $url; ?>?page=<?php echo base64_encode('agencepages/microagence/agence_ajax'); ?>&idagence=<?php echo $recuser["idag"]; ?>&supprimer=supprimer' onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Supprimer cette agence ?'));" >
                    <span title="Supprimer cette agence " alt="suppr">  <i class="glyphicon glyphicon-trash"></i></span>
                </a>
            </td>
        </tr>
        <?php
    }
}


function update_agence($reg, $con) {
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    if (($reg != NULL) && isset($reg["1"])) {
        $req = $con->query("select * from agence where nomag='" . addslashes($reg["1"]["agencee"]) . "'") or die(mysqli_error($con));
        $nb = mysqli_num_rows($req);
        if (($nb == 0)) {
            $con->query("update agence set idville='" . $reg["1"]["villee"] . "', nomag='" . addslashes($reg["1"]["agencee"]) . "' where idagence='" . $reg["1"]["idagence"] . "'") or die(mysqli_error($con));
//            $con->query("insert into log(iduser,operation,dateLog) values('{$_SESSION['iduser']}','Mise a jour dans la table sot_ville de la valeure {$reg["1"]["ville"]}',now())") or die(mysqli_error($con));
            unset($_SESSION['formagencee']);
            echo "<script language='javascript'>$('div.editok').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'micropages/microagence/lister_agence';
            die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        } else {
            $rowv = mysqli_fetch_assoc($req);
            if ($rowv["idagence"] == $reg["1"]["idagence"]) {
                $con->query("update agence set idville='" . $reg["1"]["villee"] . "', nomag='" . addslashes($reg["1"]["agencee"]) . "' where idagence='" . $reg["1"]["idagence"] . "'") or die(mysqli_error($con));
//            $con->query("insert into log(iduser,operation,dateLog) values('{$_SESSION['iduser']}','Mise a jour dans la table sot_ville de la valeure {$reg["1"]["ville"]}',now())") or die(mysqli_error($con));
                unset($_SESSION['formagencee']);
                echo "<script language='javascript'>$('div.editok').show('slow').delay(8000).hide('slow');</script>";
                $pagp = 'micropages/microagence/lister_agence';
                die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
            } else {
                echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
                $pagp = 'micropages/microagence/editer_agence/edit_agence';
                die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '&idagence=' . $reg["1"]["idagence"] . '">');
            }
        }
    }
}

<?php

//fonction pour ajouter un type de compte
function inserer_typecompte($reg, $con) {
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    if (($reg != NULL) && isset($reg["1"])) {
                
        $req = $con->query("select * from typecompte where codetypecom='" . $reg["1"]["codet"] . "'") or die(mysqli_error($con));
        $nb = mysqli_num_rows($req);
    
        if (($nb == 0)) {
            $con->query("insert into typecompte(nomtypecom,codetypecom) values('" . addslashes($reg["1"]["typecompte"]) . "', "
                    . "'" . $reg["1"]["codet"] . "')") or die(mysqli_error($con));
                  
                     
    
                    
//            $con->query("insert into log(iduser,operation,dateLog) values('{$_SESSION['iduser']}','Ajout dans la table sot_pays de la valeure {$reg["1"]["pays"]}',now())") or die(mysqli_error($con));
            echo "<script language='javascript'>$('div.addok').show('slow').delay(8000).hide('slow');</script>";
            unset($_SESSION['formtypecompte']);
            $pagp = 'pmfpages/pmfparametre/pmftypecompte/lister_typecompte';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        } else {
            echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'pmfpages/pmfparametre/pmftypecompte/pmfajouter/ajout_typecompte';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        }
    }
}

//fonction pour lister les types de comptes
function lister_typecompte($con) {
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    $rsltuser = $con->query('select * from typecompte') or die(mysqli_error($con));
    while ($recuser = mysqli_fetch_assoc($rsltuser)) {
        ?>
        <tr >
            <td></td>
            <td><?php print nl2br(htmlspecialchars($recuser["idtypecom"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["codetypecom"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["nomtypecom"])) ?></td>
            <td>
                <a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmftypecompte/pmfediter/edit_typecompte'); ?>&idpays=<?php echo $recuser["idtypecom"]; ?>" >
                    <span title="Modifier ce type de compte" alt="editer"><i class="glyphicon glyphicon-edit"></i></span>
                </a>
                &nbsp;&nbsp;
                <a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmftypecompte/lister_compte'); ?>&idtypecom=<?php echo $recuser["idtypecom"]; ?>" >
                    <span title="Lister les comptes de ce type de compte" alt="compte"><i class="glyphicon glyphicon-list-alt"></i></span>
                </a>
                &nbsp;&nbsp;
                <a href='<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmftypecompte/typecompte_ajax'); ?>&idtypecom=<?php echo $recuser["idtypecom"]; ?>&supprimer=supprimer' onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Supprimer ce type de compte ?'));" >
                    <span title="Supprimer ce type de compte " alt="suppr">  <i class="glyphicon glyphicon-trash"></i></span>
                </a>
            </td>
        </tr>
        <?php
    }
}

function update_typecompte($reg, $con) {
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    if (($reg != NULL) && isset($reg["1"])) {
        $req = $con->query("select * from typecompte where codetypecom='" . $reg["1"]["codete"] . "' or nomtypecom='" . addslashes($reg["1"]["typecomptee"]) . "'") or die(mysqli_error($con));
        $nb = mysqli_num_rows($req);
        if (($nb == 0)) {
            $con->query("update typecompte set codetypecom='" . $reg["1"]["codete"] . "', nomtypecom='" . addslashes($reg["1"]["typecomptee"]) . "' where idtypecom='" . $reg["1"]["idtypecom"] . "'") or die(mysqli_error($con));
//            $con->query("insert into log(iduser,operation,dateLog) values('{$_SESSION['iduser']}','Mise a jour dans la table sot_pays de la valeure {$reg["1"]["pays"]}',now())") or die(mysqli_error($con));
            unset($_SESSION['formtypecomtee']);
            echo "<script language='javascript'>$('div.editok').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'pmfpages/pmfparametre/pmftypecompte/lister_typecompte';
            die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        } else {
            $ok = true;
            while ($rowv = mysqli_fetch_assoc($req)) {
                if ($rowv["idtypecom"] != $reg["1"]["idtypecom"]) {
                    $ok = FALSE;
                }
            }
            if ($ok) {
                $con->query("update typecompte set codetypecom='" . $reg["1"]["codete"] . "', nomtypecom='" . addslashes($reg["1"]["typecomptee"]) . "' where idtypecom='" . $reg["1"]["idtypecom"] . "'") or die(mysqli_error($con));
//            $con->query("insert into log(iduser,operation,dateLog) values('{$_SESSION['iduser']}','Mise a jour dans la table sot_pays de la valeure {$reg["1"]["pays"]}',now())") or die(mysqli_error($con));
                unset($_SESSION['formtypecome']);
                echo "<script language='javascript'>$('div.editok').show('slow').delay(8000).hide('slow');</script>";
                $pagp = 'pmfpages/pmfparametre/pmftypecom/lister_typecom';
                die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
            } else {
                echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
                $pagp = 'pmfpages/pmfparametre/pmftypecompte/pmfediter/edit_typecom';
                die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '&idtypecom=' . $reg["1"]["idtypecom"] . '">');
            }
        }
    }
}

//fonction pour lister les comptes
function lister_compte_typecompte($id, $con) {
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    $rsltuser = $con->query("select * from compte as c left join typecompte as t on c.idtypecom=t.idtypecom where c.idtypecom='".$id."'") or die(mysqli_error($con));
    while ($recuser = mysqli_fetch_assoc($rsltuser)) {
        ?>
        <tr >
            <td></td>
            <td><?php print nl2br(htmlspecialchars($recuser["idcompte"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($recuser["nomclient"])) ?></td>
            <td>
                <?php
                if ($recuser["etatcompte"]) {
                    ?>
                    <a href='<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/compte_ajax'); ?>&idcompte=<?php echo $recuser["idcompte"]; ?>&desactiver=desactiver' onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Désactiver ce compte ?'));">
                        <span title="Activ&eacute;" data-toggle="tooltip" alt="oui" class="label-success label">Activ&eacute;</span>
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/compte_ajax'); ?>&idcompte=<?php echo $recuser["idcompte"]; ?>&activer=activer" onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Activer ce compte ?'));">
                        <span title="D&eacute;sactiv&eacute; " data-toggle="tooltip" alt="non" class="label-warning label">D&eacute;sactiv&eacute;</span>
                    </a>
                    <?php
                }
                ?>
            </td>
            <td><?php print nl2br(htmlspecialchars($recuser["dateCreationCompte"])) ?></td>
            <td>
                <a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/pmfediter/edit_compte'); ?>&idcompte=<?php echo $recuser["idcompte"]; ?>" >
                    <span title="Modifier ce compte" alt="editer"><i class="glyphicon glyphicon-edit"></i></span>
                </a>
                &nbsp;&nbsp;
                <a href='<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/compte_ajax'); ?>&idcompte=<?php echo $recuser["idcompte"]; ?>&supprimer=supprimer' onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Supprimer ce compte ?'));" >
                    <span title="Supprimer ce compte " alt="suppr">  <i class="glyphicon glyphicon-trash"></i></span>
                </a>
            </td>
        </tr>
        <?php
    }
}

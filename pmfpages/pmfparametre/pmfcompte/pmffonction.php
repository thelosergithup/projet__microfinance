<?php

//fonction pour ajouter un compte
function inserer_compte($reg, $con) {
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    echo $_POST['typecompte'];
    
    $con->query("insert into compte(libellecompte,idpays,datecompte) values('" . addslashes($reg["1"]["compte"]) . "', '" . $reg["1"]["pays"] . "',now())") or die(mysqli_error($con));
//            $con->query("insert into log(iduser,operation,dateLog) values('{$_SESSION['iduser']}','Ajout dans la table sot_compte de la valeure {$reg["1"]["compte"]}',now())") or die(mysqli_error($con));
            echo "<script language='javascript'>$('div.addok').show('slow').delay(8000).hide('slow');</script>";
            unset($_SESSION['formcompte']);
            $pagp = 'pmfpages/pmfparametre/pmfcompte/lister_compte';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
//    if (($reg != NULL) && isset($reg["1"])) {
//        $req = $con->query("select * from compte where idcompte='" . addslashes($reg["1"]["compte"]) . "'") or die(mysqli_error($con));
//        $nb = mysqli_num_rows($req);
//        
//        
//        if (($nb == 0)) {
//            
//        } else {
//            echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
//            $pagp = 'pmfpages/pmfparametre/pmfcompte/pmfajouter/ajout_compte';
//            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
//        }
//    }
}


//fonction pour lister les comptes
function lister_compte($con) {

    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);

    $rsltcompte = $con->query("
        SELECT *
        FROM compte c
        LEFT JOIN client cl ON c.idclient = cl.idclient
        LEFT JOIN typecompte tc ON c.idtypecom = tc.idtypecom") or die(mysqli_error($con));

    while ($reccompte = mysqli_fetch_assoc($rsltcompte)) {
        ?>

        <tr>
            <td></td>
            <td><?php print nl2br(htmlspecialchars($reccompte["idcompte"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($reccompte["nomclient"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($reccompte["idclient"]))?></td>
            <td><?php print nl2br(htmlspecialchars($reccompte["nomtypecom"]))?></td>
            
           <td>
                <?php
                if ($reccompte["etatCompte"]) {
                    ?>
                   <a href='<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/compte_ajax'); ?>&idcompte=<?php echo $recuser["idcompte"]; ?>&desactiver=desactiver' onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Désactiver ce compte ?'));">
                       <span title="Activ&eacute;" data-toggle="tooltip" alt="oui" class="label-success label">Activ&eacute;</span>
                    </a>
                    <?php
                }else{
                    ?>
                    <a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/compte_ajax'); ?>&idcompte=<?php echo $recuser["idcompte"]; ?>&activer=activer" onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Activer ce compte ?'));">
                        <span title="D&eacute;sactiv&eacute; " data-toggle="tooltip" alt="non" class="label-warning label">D&eacute;sactiv&eacute;</span>
                    </a>
                    <?php 
                }
                ?>
            </td>
            <td><?php print nl2br(htmlspecialchars($reccompte["solde"])) ?></td>
            <td><?php print nl2br(htmlspecialchars($reccompte["deviseCompte"])) ?></td>
             <td><?php print nl2br(htmlspecialchars($reccompte["dateCreation"])) ?></td>
            <td>
<!--                <a href="<?= $url; ?>?page=<?php //echo base64_encode('pmfpages/pmfparametre/pmfcompte/pmfediter/edit_compte'); ?>&idcompte=<?php// echo $reccompte["idcompte"]; ?>" >
                    <span title="Modifier ce compte" alt="editer"><i class="glyphicon glyphicon-edit"  style="color: "></i></span>
                </a>-->
                 <a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/pmfretrait/form_debiter'); ?>&idcompte=<?php echo $reccompte["idcompte"]; ?>" >
                    <span title="effectuer un retrait" alt="retrait"><i class="glyphicon glyphicon-minus-sign"  style="color: orange;"></i></span>
                </a>
                 <a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/pmfediter/edit_compte'); ?>&idcompte=<?php echo $reccompte["idcompte"]; ?>" >
                    <span title="effectuer un depot" alt="depot"><i class="glyphicon glyphicon-plus-sign   " style="color: greenyellow;"></i></span>
                </a>
                 <a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/pmfediter/edit_compte'); ?>&idcompte=<?php echo $reccompte["idcompte"]; ?>" >
                    <span title="effectuer un transfert" alt="transfert"><i class="glyphicon glyphicon-transfer   " style="color: blue;"></i></span>
                </a>
                
            </td>
            
            
           

        </tr>

        <?php
    }
}
function update_compte($reg, $con) {
    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    if (($reg != NULL) && isset($reg["1"])) {
        $req = $con->query("select * from sot_compte where libellecompte='" . addslashes($reg["1"]["comptee"]) . "'") or die(mysqli_error($con));
        $nb = mysqli_num_rows($req);
        if (($nb == 0)) {
            $con->query("update sot_compte set idpays='" . $reg["1"]["payse"] . "', libellecompte='" . addslashes($reg["1"]["comptee"]) . "' where idcompte='" . $reg["1"]["idcompte"] . "'") or die(mysqli_error($con));
//            $con->query("insert into log(iduser,operation,dateLog) values('{$_SESSION['iduser']}','Mise a jour dans la table sot_compte de la valeure {$reg["1"]["compte"]}',now())") or die(mysqli_error($con));
            unset($_SESSION['formcomptee']);
            echo "<script language='javascript'>$('div.editok').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'pmfpages/pmfparametre/pmfcompte/lister_compte';
            die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        } else {
            $rowv = mysqli_fetch_assoc($req);
            if ($rowv["idcompte"] == $reg["1"]["idcompte"]) {
                $con->query("update sot_compte set idpays='" . $reg["1"]["payse"] . "', libellecompte='" . addslashes($reg["1"]["comptee"]) . "' where idcompte='" . $reg["1"]["idcompte"] . "'") or die(mysqli_error($con));
//            $con->query("insert into log(iduser,operation,dateLog) values('{$_SESSION['iduser']}','Mise a jour dans la table sot_compte de la valeure {$reg["1"]["compte"]}',now())") or die(mysqli_error($con));
                unset($_SESSION['formcomptee']);
                echo "<script language='javascript'>$('div.editok').show('slow').delay(8000).hide('slow');</script>";
                $pagp = 'pmfpages/pmfparametre/pmfcompte/lister_compte';
                die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
            } else {
                echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
                $pagp = 'pmfpages/pmfparametre/pmfcompte/pmfediter/edit_compte';
                die('<meta http-equiv="refresh" content="3; URL=' . $url . '?page=' . base64_encode($pagp) . '&idcompte=' . $reg["1"]["idcompte"] . '">');
            }
        }
    }
}


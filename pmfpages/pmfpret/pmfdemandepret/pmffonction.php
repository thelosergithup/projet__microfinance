<?php

//fonction pour ajouter une demande de pret
function inserer_demandepret($reg, $con){

    $path = $_SERVER['PHP_SELF'];
    $url = basename($path);
    if (($reg != NULL) && isset($reg["1"])) {

        /*  $req = $con->query("select * from demandepret where codetypecom='" . $reg["1"]["codet"] . "'") or die(mysqli_error($con));
        $nb = mysqli_num_rows($req);

        if (($nb == 0)) { */

        $rclient = $con->query("select * from client where loginclient='" . $reg["1"]["login"] . "'") or die(mysqli_error($con));
       
        
        if ($recuser = mysqli_fetch_assoc($rclient)) {

            $idclt = $recuser["idclient"] ;
          
        }

        $con->query("insert into demandepret(idclient,montantdemande,dureedemande,motifdemande,date) values('$idclt','" . addslashes($reg["1"]["montant"]) . "','" . $reg["1"]["duree"] . "','" . addslashes($reg["1"]["motif"]) . "', NOW())") or die(mysqli_error($con));





        //            $con->query("insert into log(iduser,operation,dateLog) values('{$_SESSION['iduser']}','Ajout dans la table sot_pays de la valeure {$reg["1"]["pays"]}',now())") or die(mysqli_error($con));
        echo "<script language='javascript'>$('div.addok').show('slow').delay(8000).hide('slow');</script>";
        unset($_SESSION['formdemandepret']);
        $pagp = 'pmfpages/pmfpret/pmfdemandepret/pmfajouter/form_demande_pret';
        die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        /*  } else {
            echo "<script language='javascript'>$('div.addko').show('slow').delay(8000).hide('slow');</script>";
            $pagp = 'pmfpages/pmfparametre/pmfdemandepret/pmfajouter/ajout_demandepret';
            die('<meta http-equiv="refresh" content="3 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
        } */
    }
}

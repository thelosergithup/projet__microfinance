<?php

if (isset($_REQUEST["supprimer"])) {
    $id = trim($_REQUEST["iddemande"]);
/*     $req = $con->query("select * from sot_ville where idpays='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    if (($nb == 0)) { */
        $con->query(" delete from demandepret where iddemande='" . $id . "' ") or die(mysqli_error($con));

        echo "<script language='javascript'>alert('Suppression terminée')</script>";
        $pagp = 'pmfpages/pmfpret/pmfdemandepret/lister_pret';
        die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
   /*  } else {

        echo "<script language='javascript'>alert('Impossible de surprimer ce Pays car il y a des Villes !!!')</script>";
        $pagp = 'pmfpages/pmfpret/pmfdemandepret/demandepret_ajax';
        die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
    } */
}
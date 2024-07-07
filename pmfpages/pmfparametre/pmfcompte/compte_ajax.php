<?php

if (isset($_REQUEST["desactiver"])) {
    $id = trim($_REQUEST["idcompte"]);
    $con->query(" update compte set etatCompte=0 where idcompte='" . $id . "' ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert(' compte Désactivé avec succes')</script>";
    $pagp = 'pmfpages/pmfparametre/pmfcompe/lister_compte';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}

if (isset($_REQUEST["desactiver"])) {
    $id = trim($_REQUEST["idville"]);
    $con->query(" update sot_ville set etatville=0 where idville='" . $id . "' ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert('Ville Désactivée avec succes')</script>";
    $pagp = 'sotcocogpages/sotcocogparametre/sotcocogville/lister_ville';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}

if (isset($_REQUEST["activer"])) {
    $id = trim($_REQUEST["idcompte"]);
    $con->query(" update compte set etatCompte=1 where idcompte='" . $id . "' ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert(' compte Activé avec succes')</script>";
    $pagp = 'pmfpages/pmfparametre/pmfcompte/lister_compte';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}


?>
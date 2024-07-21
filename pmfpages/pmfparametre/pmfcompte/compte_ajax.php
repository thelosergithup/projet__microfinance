<?php

if (isset($_REQUEST["desactiver"])) {
    $id = trim($_REQUEST["idcompte"]);
    $con->query(" update compte set etatCompte= 0 where idcompte=$id ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert(' compte Désactivé avec succes')</script>";
    $pagp = 'pmfpages/pmfparametre/pmfcompte/lister_compte';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}
/* 
if (isset($_REQUEST["desactiver"])) {
    $id = trim($_REQUEST["idcompte"]);
    $con->query(" update compte set etatCompte=1 where idcompte=18 ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert('compte Désactivée avec succes')</script>";
    $pagp = 'pmfpages/pmfparametre/pmfcompte/lister_compte';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
} */

if (isset($_REQUEST["activer"])) {
    $id = trim($_REQUEST["idcompte"]);
    $con->query(" update compte set etatCompte=1 where idcompte=$id ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert(' compte Activé avec succes')</script>";
    $pagp = 'pmfpages/pmfparametre/pmfcompte/lister_compte';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}


?>
<?php

if (isset($_REQUEST["desactiver"])) {
    $id = trim($_REQUEST["idclient"]);
    $con->query(" update client set etatclient=0 where idclient ='" . $id . "' ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert('client Désactivé avec succes')</script>";
    $pagp = 'micropages/microclient/lister_client';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}

if (isset($_REQUEST["activer"])) {
    $id = trim($_REQUEST["idclient"]);
    $con->query(" update client set etatclient=1 where idclient='" . $id . "' ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert('client Activé avec succes')</script>";
    $pagp = 'clientpages/microclient/lister_client';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}

?>
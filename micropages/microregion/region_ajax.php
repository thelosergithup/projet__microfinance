<?php

if (isset($_REQUEST["desactiver"])) {
    $id = trim($_REQUEST["idregion"]);
    $con->query(" update region set etatregion=0 where idregion='" . $id . "' ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert('region Désactivé avec succes')</script>";
    $pagp = 'micropages/microregion/lister_region';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}

if (isset($_REQUEST["activer"])) {
    $id = trim($_REQUEST["idregion"]);
    $con->query(" update region set etatregion=1 where idregion='" . $id . "' ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert('region Activé avec succes')</script>";
    $pagp = 'micropages/microregion/lister_region';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}

if (isset($_REQUEST["supprimer"])) {
    $id = trim($_REQUEST["idregion"]);
    $req = $con->query("select * from ville where idregion='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    if (($nb == 0)) {
        $con->query(" delete from region where idregion='" . $id . "' ") or die(mysqli_error($con));

        echo "<script language='javascript'>alert('Suppression terminée')</script>";
        $pagp = 'micropages/microregion/lister_region';
        die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
    } else {

        echo "<script language='javascript'>alert('Impossible de surprimer cette region car il y a des Villes !!!')</script>";
        $pagp = 'micropages/microregion/lister_region';
        die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
    }
}
?>

<?php

if (isset($_REQUEST["desactiver"])) {
    $id = trim($_REQUEST["idville"]);
    $con->query(" update ville set etatville=0 where idville='" . $id . "' ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert('Ville Désactivée avec succes')</script>";
    $pagp = 'micropages/microville/lister_ville';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}

if (isset($_REQUEST["activer"])) {
    $id = trim($_REQUEST["idville"]);
    $con->query(" update ville set etatville=1 where idville='" . $id . "' ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert('Ville Activée avec succes')</script>";
    $pagp = 'micropages/microville/lister_ville';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}

if (isset($_REQUEST["supprimer"])) {
    $id = trim($_REQUEST["idville"]);
    $req = $con->query("select * from entreprise where idville='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    
    $reqe = $con->query("select * from entete where idville='" . $id . "'") or die(mysqli_error($con));
    $nbe = mysqli_num_rows($reqe);
    if (($nb == 0) && ($nbe == 0)) {
        $con->query(" delete from ville where idville='" . $id . "' ") or die(mysqli_error($con));

        echo "<script language='javascript'>alert('Suppression terminée')</script>";
        $pagp = 'micropages/microville/lister_ville';
        die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
    } else {

        echo "<script language='javascript'>alert('Impossible de surprimer cette Ville car il y a des Entreprises et des Entêtes !!!')</script>";
        $pagp = 'micropages/microville/lister_ville';
        die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
    }
}
?>
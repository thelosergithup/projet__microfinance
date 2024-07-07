<?php

if (isset($_REQUEST["desactiver"])) {
    $id = trim($_REQUEST["idutilisateur"]);
    $con->query(" update utilisateur set etatuser=0 where iduser='" . $id . "' ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert('Utilisateur Désactivé avec succes')</script>";
    $pagp = 'pmfpages/pmfutilisateur/lister_utilisateur';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}

if (isset($_REQUEST["activer"])) {
    $id = trim($_REQUEST["idutilisateur"]);
    $con->query(" update utilisateur set etatuser=1 where iduser='" . $id . "' ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert('Utilisateur Activé avec succes')</script>";
    $pagp = 'pmfpages/pmfutilisateur/lister_utilisateur';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}

?>
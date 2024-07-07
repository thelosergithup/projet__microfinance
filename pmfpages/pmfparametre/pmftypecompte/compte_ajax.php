<?php

if (isset($_REQUEST["desactiver"])) {
    $id = trim($_REQUEST["idtypecom"]);
    $con->query(" update typecompte set etatpays=0 where idtypecom='" . $id . "' ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert('type de compte Désactivé avec succes')</script>";
    $pagp = 'pmfpages/pmfparametre/pmftypecompe/lister_typecompte';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}

if (isset($_REQUEST["activer"])) {
    $id = trim($_REQUEST["idtypecom"]);
    $con->query(" update typecompte set etattyprcom=1 where idtypecom='" . $id . "' ") or die(mysqli_error($con));

    echo "<script language='javascript'>alert('type de compte Activé avec succes')</script>";
    $pagp = 'pmfpages/pmfparametre/pmftypecompte/lister_typecompte';
    die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
}

if (isset($_REQUEST["supprimer"])) {
    $id = trim($_REQUEST["idtypecom"]);
    $req = $con->query("select * from compte where idtypecom='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    if (($nb == 0)) {
        $con->query(" delete from typecompte where idtypecom='" . $id . "' ") or die(mysqli_error($con));

        echo "<script language='javascript'>alert('Suppression terminée')</script>";
        $pagp = 'pmfpages/pmfparametre/pmftypecompte/lister_typecompte';
        die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
    } else {

        echo "<script language='javascript'>alert('Impossible de surprimer ce type de compte car il y a des comptes !!!')</script>";
        $pagp = 'pmfpages/pmfparametre/pmftypecompte/lister_typecompte';
        die('<meta http-equiv="refresh" content="0 ; URL=' . $url . '?page=' . base64_encode($pagp) . '">');
    }
}
?>
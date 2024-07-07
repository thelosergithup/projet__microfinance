<?php

session_start();

@include("../../pmfconnexion/connexion.php");

// This function will return  
// A random string of specified length 
function random_code($limit) {
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
}

if (isset($_POST["dellangue"])) {
    $id = trim($_POST["dellangue"]);
    $req = $con->query("select * from sot_courrier where idlangue='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    $reqe = $con->query("select * from sot_entreprise where idlangue='" . $id . "'") or die(mysqli_error($con));
    $nbe = mysqli_num_rows($reqe);
    if (($nb == 0) && ($nbe == 0)) {
        $con->query(" delete from sot_langue where idlangue='" . $id . "' ") or die(mysqli_error($con));
        echo 'Surpression termine avec succes !';
    } else {
        echo 'Impossible de surprimer ce langue car il conteint des villes !!!';
    }
}
if (isset($_POST["desaclangue"])) {
    $id = trim($_POST["desaclangue"]);
    $con->query("update sot_langue set etatlangue = 0 where  idlangue='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["aclangue"])) {
    $id = trim($_POST["aclangue"]);
    $con->query("update sot_langue set etatlangue=1 where  idlangue='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["deldevise"])) {
    $id = trim($_POST["deldevise"]);
    $req = $con->query("select * from sot_etat_paiement where iddevise='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    if (($nb == 0)) {
        $con->query(" delete from sot_devise where iddevise='" . $id . "' ") or die(mysqli_error($con));
        echo 'Surpression termine avec succes !';
    } else {
        echo 'Impossible de surprimer ce devise car il conteint des villes !!!';
    }
}
if (isset($_POST["desacdevise"])) {
    $id = trim($_POST["desacdevise"]);
    $con->query("update sot_devise set etatdevise = 0 where  iddevise='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["acdevise"])) {
    $id = trim($_POST["acdevise"]);
    $con->query("update sot_devise set etatdevise=1 where  iddevise='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["delpays"])) {
    $id = trim($_POST["delpays"]);
    $req = $con->query("select * from sot_ville where idpays='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    if (($nb == 0)) {
        $con->query(" delete from sot_pays where idpays='" . $id . "' ") or die(mysqli_error($con));
        echo 'Surpression termine avec succes !';
    } else {
        echo 'Impossible de surprimer ce pays car il conteint des villes !!!';
    }
}
if (isset($_POST["desacpays"])) {
    $id = trim($_POST["desacpays"]);
    $con->query("update sot_pays set etatpays = 0 where  idpays='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["acpays"])) {
    $id = trim($_POST["acpays"]);
    $con->query("update sot_pays set etatpays=1 where  idpays='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["delbanque"])) {
    $id = trim($_POST["delbanque"]);
    $req = $con->query("select * from sot_compte_bancaire where idbanque='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    if (($nb == 0)) {
        $con->query(" delete from sot_banque where idbanque='" . $id . "' ") or die(mysqli_error($con));
        echo 'Surpression terminé avec succes !';
    } else {
        echo 'Impossible de surprimer ce banque car il conteint des villes !!!';
    }
}
if (isset($_POST["desacbanque"])) {
    $id = trim($_POST["desacbanque"]);
    $con->query("update sot_banque set etatbanque = 0 where  idbanque='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["acbanque"])) {
    $id = trim($_POST["acbanque"]);
    $con->query("update sot_banque set etatbanque=1 where  idbanque='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["delville"])) {
    $id = trim($_POST["delville"]);
    $req = $con->query("select * from sot_entete where idvillee='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    $reqe = $con->query("select * from sot_entreprise where idvilleen='" . $id . "'") or die(mysqli_error($con));
    $nbe = mysqli_num_rows($reqe);
    if (($nb == 0) && ($nbe == 0)) {
        $con->query(" delete from sot_ville where idville='" . $id . "' ") or die(mysqli_error($con));
        echo "suppression terminée";
    } else {
        echo 'Impossible de surprimer cette ville car elle conteint des entetes ou des entreprises !!!';
    }
}
if (isset($_POST["desacville"])) {
    $id = trim($_POST["desacville"]);
    $con->query("update sot_ville set etatville = 0 where  idville='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["acville"])) {
    $id = trim($_POST["acville"]);
    $con->query("update sot_ville set etatville=1 where  idville='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["deltypefournisseur"])) {
    $id = trim($_POST["deltypefournisseur"]);
    $req = $con->query("select * from sot_fournisseur where idtypefournisseur='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    if (($nb == 0)) {
        $con->query(" delete from sot_type_fournisseur where idtypefournisseur='" . $id . "' ") or die(mysqli_error($con));
        echo "suppression terminée";
    } else {
        echo 'Impossible de surprimer cette typefournisseur car elle conteint des entetes ou des entreprises !!!';
    }
}
if (isset($_POST["desactypefournisseur"])) {
    $id = trim($_POST["desactypefournisseur"]);
    $con->query("update sot_type_fournisseur set etattypefournisseur = 0 where  idtypefournisseur='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["actypefournisseur"])) {
    $id = trim($_POST["actypefournisseur"]);
    $con->query("update sot_type_fournisseur set etattypefournisseur=1 where  idtypefournisseur='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["delentreprise"])) {
    $id = trim($_POST["delentreprise"]);
    $req = $con->query("select * from sot_entete where identreprise='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    $reqe = $con->query("select * from sot_departement where identreprise='" . $id . "'") or die(mysqli_error($con));
    $nbe = mysqli_num_rows($reqe);
    if (($nb == 0) && ($nbe == 0)) {
        $con->query(" delete from sot_entreprise where identreprise='" . $id . "' ") or die(mysqli_error($con));
        echo "suppression terminée";
    } else {
        echo 'Impossible de surprimer cet entreprise car elle conteint des entetes ou des départements !!!';
    }
}
if (isset($_POST["desacentreprise"])) {
    $id = trim($_POST["desacentreprise"]);
    $con->query("update sot_entreprise set etatentreprise = 0 where  identreprise='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["acentreprise"])) {
    $id = trim($_POST["acentreprise"]);
    $con->query("update sot_entreprise set etatentreprise=1 where  identreprise='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["delentete"])) {
    $id = trim($_POST["delentete"]);
    $req = $con->query("select * from sot_utilisateur where identete='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    $reqe = $con->query("select * from sot_compte_bancaire where identete='" . $id . "'") or die(mysqli_error($con));
    $nbe = mysqli_num_rows($reqe);
    if (($nb == 0) && ($nbe == 0)) {
        $con->query(" delete from sot_entete where identete='" . $id . "' ") or die(mysqli_error($con));
        echo "suppression terminée";
    } else {
        echo 'Impossible de surprimer cet entete car elle conteint des utilisateur ou des comptes bancaires !!!';
    }
}
if (isset($_POST["desacentete"])) {
    $id = trim($_POST["desacentete"]);
    $con->query("update sot_entete set etatentete = 0 where  identete='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["acentete"])) {
    $id = trim($_POST["acentete"]);
    $con->query("update sot_entete set etatentete=1 where  identete='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["delmemo"])) {
    $id = trim($_POST["delmemo"]);
    $req = $con->query("select * from sot_decaissement where idmemo='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    if (($nb == 0)) {
        $con->query(" delete from sot_memo where idmemo='" . $id . "' ") or die(mysqli_error($con));
        echo "suppression terminée";
    } else {
        echo 'Impossible de surprimer ce memo car il est decaissé !!!';
    }
}
if (isset($_POST["desacmemo"])) {
    $id = trim($_POST["desacmemo"]);
    $con->query("update sot_memo set etatmemo = 0 where  idmemo='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["acmemo"])) {
    $id = trim($_POST["acmemo"]);
    $con->query("update sot_memo set etatmemo=1 where  idmemo='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["delprojet"])) {
    $id = trim($_POST["delprojet"]);
    $req = $con->query("select * from sot_courrier where idprojet='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    $reqe = $con->query("select * from sot_etat_paiement where idprojet='" . $id . "'") or die(mysqli_error($con));
    $nbe = mysqli_num_rows($reqe);
    if (($nb == 0) && ($nbe == 0)) {
        $con->query(" delete from sot_projet where idprojet='" . $id . "' ") or die(mysqli_error($con));
        echo "suppression terminée";
    } else {
        echo 'Impossible de surprimer ce projet car il y a un courrier ou un etat de paiement !!!';
    }
}
if (isset($_POST["desacprojet"])) {
    $id = trim($_POST["desacprojet"]);
    $con->query("update sot_projet set etatprojet = 0 where  idprojet='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["acprojet"])) {
    $id = trim($_POST["acprojet"]);
    $con->query("update sot_projet set etatprojet=1 where  idprojet='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["delcharge"])) {
    $id = trim($_POST["delcharge"]);
    $req = $con->query("select * from sot_decaissement where idcharge='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    if (($nb == 0) && ($nbe == 0)) {
        $con->query(" delete from sot_charge where idcharge='" . $id . "' ") or die(mysqli_error($con));
        echo "suppression terminée";
    } else {
        echo 'Impossible de surprimer cette charge car elle est en cours de décaissement !!!';
    }
}
if (isset($_POST["desaccharge"])) {
    $id = trim($_POST["desaccharge"]);
    $con->query("update sot_charge set etatcharge = 0 where  idcharge='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["accharge"])) {
    $id = trim($_POST["accharge"]);
    $con->query("update sot_charge set etatcharge=1 where  idcharge='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["deldepartement"])) {
    $id = trim($_POST["deldepartement"]);
    $req = $con->query("select * from sot_utilisateur where iddepartement='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    if (($nb == 0)) {
        $con->query(" delete from sot_departement where iddepartement='" . $id . "' ") or die(mysqli_error($con));
        echo "suppression terminée";
    } else {
        echo 'Impossible de surprimer cet departement car elle conteint des utilisateur ou des Utilisateurs!!!';
    }
}
if (isset($_POST["desacdepartement"])) {
    $id = trim($_POST["desacdepartement"]);
    $con->query("update sot_departement set etatdepartement = 0 where  iddepartement='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["acdepartement"])) {
    $id = trim($_POST["acdepartement"]);
    $con->query("update sot_departement set etatdepartement=1 where  iddepartement='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["desacutilisateur"])) {
    $id = trim($_POST["desacutilisateur"]);
    $con->query("update sot_utilisateur set etatuser = 0 where  iduser='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["acutilisateur"])) {
    $id = trim($_POST["acutilisateur"]);
    $con->query("update sot_utilisateur set etatuser=1 where  iduser='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}
if (isset($_POST["acutilisateursign"])) {
    $id = trim($_POST["acutilisateursign"]);
    $req = $con->query("select * from sot_signature where idsignature='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    if ($nb != 0) {
        $row = mysqli_fetch_assoc($req);
        $con->query("update sot_signature set etatsignature=0 where  iduser='" . $row["iduser"] . "'") or die(mysqli_error($con));
    }
    $con->query("update sot_signature set etatsignature=1 where  idsignature='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["desacfournisseur"])) {
    $id = trim($_POST["desacfournisseur"]);
    $con->query("update sot_fournisseur set etatfournisseur = 0 where  idfournisseur='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["acfournisseur"])) {
    $id = trim($_POST["acfournisseur"]);
    $con->query("update sot_fournisseur set etatfournisseur=1 where  idfournisseur='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["delcomptebancaire"])) {
    $id = trim($_POST["delcomptebancaire"]);
    $req = $con->query("select * from sot_compte_positionnement where idcomptebancaire='" . $id . "'") or die(mysqli_error($con));
    $nb = mysqli_num_rows($req);
    if (($nb == 0)) {
        $con->query(" delete from sot_compte_bancaire where idcomptebancaire='" . $id . "' ") or die(mysqli_error($con));
        echo "suppression terminée";
    } else {
        echo 'Impossible de surprimer cet comptebancaire car elle conteint des positionnement !!!';
    }
}
if (isset($_POST["desaccomptebancaire"])) {
    $id = trim($_POST["desaccomptebancaire"]);
    $con->query("update sot_compte_bancaire set etatcomptebancaire = 0 where  idcomptebancaire='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["accomptebancaire"])) {
    $id = trim($_POST["accomptebancaire"]);
    $con->query("update sot_compte_bancaire set etatcomptebancaire=1 where  idcomptebancaire='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}

if (isset($_POST["desaccourrier"])) {
    $id = trim($_POST["desaccourrier"]);
    $con->query("update sot_courrier set etatcourrier = 0 where  idcourrier='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}
if (isset($_POST["accourrier"])) {
    $id = trim($_POST["accourrier"]);
    $con->query("update sot_courrier set etatcourrier=1 where  idcourrier='" . $id . "'") or die(mysqli_error($con));
    $butc = "Validation";
        $con->query("insert into sot_user_courrier(idcourrier, iduser, butusercourrier, dateusercourrier) "
                        . "values('" . $id . "', '" . $_SESSION['iduser'] . "', '" . $butc . "', NOW())") or die(mysqli_error($con));

    echo "Activation terminée";
}
if (isset($_POST["archibocourrier"])) {
    $id = trim($_POST["archibocourrier"]);
    $req = $con->query("select * from sot_courrier where idcourrier='" . $id . "'") or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($req);
    if (($row["payercourrier"])) {
        $con->query("update sot_courrier set archiverbo = 1 where  idcourrier='" . $id . "'") or die(mysqli_error($con));
        $butc = "Archivage";
        $con->query("insert into sot_user_courrier(idcourrier, iduser, butusercourrier, dateusercourrier) "
                        . "values('" . $id . "', '" . $_SESSION['iduser'] . "', '" . $butc . "', NOW())") or die(mysqli_error($con));

		echo "Archivage terminé";
    } else {
        echo 'Impossible d\'archiver ce Courrier car il n\'est pas payé !!!';
    }
}
if (isset($_POST["archicdcourrier"])) {
    $id = trim($_POST["archicdcourrier"]);
    $req = $con->query("select * from sot_courrier where idcourrier='" . $id . "'") or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($req);
    if (($row["payercourrier"])) {
        $con->query("update sot_courrier set archivecd = 1 where  idcourrier='" . $id . "'") or die(mysqli_error($con));
$butc = "Archivage";
        $con->query("insert into sot_user_courrier(idcourrier, iduser, butusercourrier, dateusercourrier) "
                        . "values('" . $id . "', '" . $_SESSION['iduser'] . "', '" . $butc . "', NOW())") or die(mysqli_error($con));
echo "Archivage terminé";
    } else {
        echo 'Impossible d\'archiver ce Courrier car il n\'est pas payé !!!';
    }
}
if (isset($_POST["archiccourrier"])) {
    $id = trim($_POST["archiccourrier"]);
    $req = $con->query("select * from sot_courrier where idcourrier='" . $id . "'") or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($req);
    if (($row["payercourrier"])) {
        $con->query("update sot_courrier set archivec = 1 where  idcourrier='" . $id . "'") or die(mysqli_error($con));
        $butc = "Archivage";
        $con->query("insert into sot_user_courrier(idcourrier, iduser, butusercourrier, dateusercourrier) "
                        . "values('" . $id . "', '" . $_SESSION['iduser'] . "', '" . $butc . "', NOW())") or die(mysqli_error($con));
echo "Archivage terminé";
    } else {
        echo 'Impossible d\'archiver ce Courrier car il n\'est pas payé !!!';
    }
}
if (isset($_POST["archifcourrier"])) {
    $id = trim($_POST["archifcourrier"]);
    $req = $con->query("select * from sot_courrier where idcourrier='" . $id . "'") or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($req);
    if (($row["payercourrier"])) {
        $con->query("update sot_courrier set archivef = 1 where  idcourrier='" . $id . "'") or die(mysqli_error($con));
        $butc = "Archivage";
        $con->query("insert into sot_user_courrier(idcourrier, iduser, butusercourrier, dateusercourrier) "
                        . "values('" . $id . "', '" . $_SESSION['iduser'] . "', '" . $butc . "', NOW())") or die(mysqli_error($con));
echo "Archivage terminé";
    } else {
        echo 'Impossible d\'archiver ce Courrier car il n\'est pas payé !!!';
    }
}
if (isset($_POST["probencourrier"])) {
    $id = trim($_POST["probencourrier"]);
    $con->query("update sot_courrier set projetbenefique=1 where  idcourrier='" . $id . "'") or die(mysqli_error($con));
    echo "Activation terminée";
}
if (isset($_POST["probencourriern"])) {
    $id = trim($_POST["probencourriern"]);
    $con->query("update sot_courrier set projetbenefique=0 where  idcourrier='" . $id . "'") or die(mysqli_error($con));
    echo "Désactivation terminée";
}

if (isset($_POST["validerpayepositionnement"])) {
    $id = trim($_POST["validerpayepositionnement"]);
    $paye = 1;
    $reqp = $con->query("select * from sot_positionnement where idpositionnement='" . $id . "'") or die(mysqli_error($con));
    $rowp = mysqli_fetch_assoc($reqp);

    $reqcb = $con->query("select * from sot_compte_bancaire where idcomptebancaire='" . $rowp["idcomptebancaire"] . "'") or die(mysqli_error($con));
    $rowcb = mysqli_fetch_assoc($reqcb);
    $newsolde = $rowcb["soldecomptebancaire"] - $rowp["totalpositionnement"];

    $con->query("update sot_compte_bancaire set soldecomptebancaire = '" . $newsolde . "' where  idcomptebancaire='" . $rowp["idcomptebancaire"] . "'") or die(mysqli_error($con));

    $con->query("update sot_positionnement set etatpositionnement = '" . $paye . "' where  idpositionnement='" . $id . "'") or die(mysqli_error($con));
    $reqd = $con->query("select * from sot_decaissement where iddecaissement='" . $rowp["iddecaissement"] . "'") or die(mysqli_error($con));
    $rowd = mysqli_fetch_assoc($reqd);
    $reqpn = $con->query("select SUM(totalpositionnement) as pos from sot_positionnement where iddecaissement='" . $rowp["iddecaissement"] . "' and etatpositionnement=true") or die(mysqli_error($con));
    $rowpn = mysqli_fetch_assoc($reqpn);
    $montdec=0;
    if(($rowd["montantdec1"]!=NULL) && ($rowd["montantdec1"]!=0)){
        $montdec=$rowd["montantdec1"];
    }else if(($rowd["montantdec2"]!=NULL) && ($rowd["montantdec2"]!=0)){
        $montdec=$rowd["montantdec2"];
    }else if(($rowd["montantdec3"]!=NULL) && ($rowd["montantdec3"]!=0)){
        $montdec=$rowd["montantdec3"];
    }
    if ($rowpn["pos"] == $montdec) {
        $con->query("update sot_decaissement set payerdecaissement = '" . $paye . "' where  iddecaissement='" . $rowd["iddecaissement"] . "'") or die(mysqli_error($con));

        if ($rowd["idcharge"] != NULL) {
            $con->query("update sot_charge set payercharge = '" . $paye . "' where  idcharge='" . $rowd["idcharge"] . "'") or die(mysqli_error($con));
        }
        if ($rowd["idcourrier"] != NULL) {
            $con->query("update sot_courrier set payercourrier = '" . $paye . "' where  idcourrier='" . $rowd["idcourrier"] . "'") or die(mysqli_error($con));
        }
        if ($rowd["idmemo"] != NULL) {
            $con->query("update sot_memo set payermemo = '" . $paye . "' where  idmemo='" . $rowd["idmemo"] . "'") or die(mysqli_error($con));
        }
        if ($rowd["idavanceep"] != NULL) {
            $con->query("update sot_avance_etat_paiement set payeravanceep = '" . $paye . "' where  idavanceep='" . $rowd["idavanceep"] . "'") or die(mysqli_error($con));

            $reqep = $con->query("select * from sot_avance_etat_paiement as aep left join sot_etat_paiement as ep on aep.idetatpaiement=ep.idetatpaiement "
                    . "where aep.idavanceep='" . $rowd["idavanceep"] . "'") or die(mysqli_error($con));
            $rowep = mysqli_fetch_assoc($reqep);
            $newavance = $rowep["montantavanceep"] + $rowep["avanceanterieuretatpaiement"];
            $newencours = 'null';
            if ($rowep["montantetatpaiement"] == $newavance) {
                $con->query("update sot_etat_paiement set avanceanterieuretatpaiement = '" . $newavance . "', "
                                . "avanceencoursetatpaiement = " . $newencours . ", payerep = '" . $paye . "' where "
                                . "idetatpaiement='" . $rowep["idetatpaiement"] . "'") or die(mysqli_error($con));
                $reqc = $con->query("select * from sot_courrier as c where c.idetatpaiementc='" . $rowep["idetatpaiement"] . "' "
                        . "order by montantcourrier asc") or die(mysqli_error($con));
                while ($rowc = mysqli_fetch_assoc($reqc)) {
                    $con->query("update sot_courrier set avancecourrier = '" . $rowc["montantcourrier"] . "', payercourrier = '" . $paye . "' where "
                                    . "idcourrier='" . $rowc["idcourrier"] . "'") or die(mysqli_error($con));
                }
            } else {
                $con->query("update sot_etat_paiement set avanceanterieuretatpaiement = '" . $newavance . "', "
                                . "avanceencoursetatpaiement = " . $newencours . " where "
                                . "idetatpaiement='" . $rowep["idetatpaiement"] . "'") or die(mysqli_error($con));
                $reqc = $con->query("select * from sot_courrier as c where c.idetatpaiementc='" . $rowep["idetatpaiement"] . "' "
                        . "order by montantcourrier asc") or die(mysqli_error($con));
                $montcourrier = 0;
                while ($rowc = mysqli_fetch_assoc($reqc)) {
                    $montcourrier = ($montcourrier + $rowc["montantcourrier"]);
                    if ($montcourrier <= $newavance) {
                        $con->query("update sot_courrier set avancecourrier = '" . $rowc["montantcourrier"] . "', "
                                . "payercourrier = '" . $paye . "' where "
                                        . "idcourrier='" . $rowc["idcourrier"] . "'") or die(mysqli_error($con));
                    } else {
                        $avance=$montcourrier-$newavance;
                        $cavanc=$rowc["montantcourrier"]-$avance;
                        $avanc = $con->query("update sot_courrier set avancecourrier = '" . $cavanc . "' where "
                                . "idcourrier='" . $rowc["idcourrier"] . "'") or die(mysqli_error($con));
                        break;
                    }
                }
            }
        }
    }
    echo 'Paiement du positionnement validé avec succes !';
}

<?php ?>
<?php ?>
<?php
$tya = "Autre";
$rsltuser = $con->query("select * from sot_courrier as c left join sot_langue as l on c.idlangue=l.idlangue "
        . "where c.typecourrier<>'" . $tya . "' and c.archiverbo=false and c.archivecd=false and c.archivec=false "
        . "order by c.datecourrier desc") or die(mysqli_error($con));
$nbbo = 0;
$nbcd = 0;
$nbc = 0;
$nbf = 0;
while ($recuser = mysqli_fetch_assoc($rsltuser)) {
    if ($recuser["etatcourrier"]) {
        $rsltvcd = $con->query("select * from sot_verification_cd as c where c.idcourrier='" . $recuser["idcourrier"] . "' "
                . "order by datevcd desc limit 0,1") or die(mysqli_error($con));
        $nbvcd = mysqli_num_rows($rsltvcd);
        if ($nbvcd != 0) {
            $rowvcd = mysqli_fetch_assoc($rsltvcd);
            if ($rowvcd["validationvcd"] == "Valider") {
                $rsltvc = $con->query("select * from sot_verification_c as c where c.idcourrier='" . $recuser["idcourrier"] . "' "
                        . "order by datevc desc limit 0,1") or die(mysqli_error($con));
                $nbvc = mysqli_num_rows($rsltvc);
                if ($nbvc != 0) {
                    $rowvc = mysqli_fetch_assoc($rsltvc);
                    if ($rowvc["validationvc"] == "Valider") {
                        $nbf = $nbf + 1;
                    } else {
                        $nbc = $nbc + 1;
                    }
                } else {
                    if ($recuser["typecourrier"] == "MEMO") {
                        $nbf = $nbf + 1;
                    } else {
                        $nbc = $nbc + 1;
                    }
                }
            } else {
                $nbcd = $nbcd + 1;
            }
        } else {
            $nbcd = $nbcd + 1;
        }
    } else {
        $rsltvcd = $con->query("select * from sot_verification_cd as c where c.idcourrier='" . $recuser["idcourrier"] . "' "
                . "order by datevcd desc limit 0,1") or die(mysqli_error($con));
        $nbvcd = mysqli_num_rows($rsltvcd);
        if ($nbvcd != 0) {
            $rowvcd = mysqli_fetch_assoc($rsltvcd);
            if ($rowvcd["validationvcd"] == "Valider") {
                $rsltvc = $con->query("select * from sot_verification_c as c where c.idcourrier='" . $recuser["idcourrier"] . "' "
                        . "order by datevc desc limit 0,1") or die(mysqli_error($con));
                $nbvc = mysqli_num_rows($rsltvc);
                if ($nbvc != 0) {
                    $rowvc = mysqli_fetch_assoc($rsltvc);
                    if ($rowvc["validationvc"] != "Valider") {
                        $nbcd = $nbcd + 1;
                    }
                }
            } else {
                $nbbo = $nbbo + 1;
            }
        } else {
            $nbbo = $nbbo + 1;
        }
    }
}

$rsltuserep = $con->query("select * from sot_avance_etat_paiement as aep left join sot_etat_paiement as ep on aep.idetatpaiement=ep.idetatpaiement "
        . "left join sot_fournisseur as f on ep.idfournisseur=f.idfournisseur where aep.payeravanceep=false and ep.etatetatpaiement=true "
        . "order by dateavanceep desc") or die(mysqli_error($con));

$nbep = mysqli_num_rows($rsltuserep);
if (($_SESSION["roleuser"] == "Administrateur") || ($_SESSION["roleuser"] == "Directeur Général Adjoint") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "Directeur Administratif et Finance") || ($_SESSION["roleuser"] == "Chef Finance")) {
    ?>


    <?php
} else if (($_SESSION["roleuser"] == "Finance")) {
    ?>
   
    <?php
} else if (($_SESSION["roleuser"] == "Chef Comptable") || ($_SESSION["roleuser"] == "Comptable")) {
    ?>
   
    <?php
} else if (($_SESSION["roleuser"] == "Contrôleur de Dépenses")) {
    ?>
    
    <?php
} else if (($_SESSION["roleuser"] == "Bureau d'Ordre")) {
    ?>
    
    <?php
} else {
    include 'sotcocogpages/sotcocogcourrier/lister_courrier.php';
}
?>

<div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Computer Technologies</h5>
                                <h2>$<span class="counter">5000</span> <span class="tuition-fees">Tuition Fees</span></h2>
                                <span class="text-success">20%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Accounting Technologies</h5>
                                <h2>$<span class="counter">3000</span> <span class="tuition-fees">Tuition Fees</span></h2>
                                <span class="text-danger">30%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Electrical Engineering</h5>
                                <h2>$<span class="counter">2000</span> <span class="tuition-fees">Tuition Fees</span></h2>
                                <span class="text-info">60%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Chemical Engineering</h5>
                                <h2>$<span class="counter">3500</span> <span class="tuition-fees">Tuition Fees</span></h2>
                                <span class="text-inverse">80%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">230% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Computer Technologies</h5>
                                <h2>$<span class="counter">5000</span> <span class="tuition-fees">Tuition Fees</span></h2>
                                <span class="text-success">20%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Accounting Technologies</h5>
                                <h2>$<span class="counter">3000</span> <span class="tuition-fees">Tuition Fees</span></h2>
                                <span class="text-danger">30%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Electrical Engineering</h5>
                                <h2>$<span class="counter">2000</span> <span class="tuition-fees">Tuition Fees</span></h2>
                                <span class="text-info">60%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Chemical Engineering</h5>
                                <h2>$<span class="counter">3500</span> <span class="tuition-fees">Tuition Fees</span></h2>
                                <span class="text-inverse">80%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">230% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="box-content row">
                <div class="col-lg-12 col-md-12" style="text-align: center">
                    <img src="sotcocogupload/logoaccueil/logo.png" style="height: 300px; width:300px" > 
                </div>

                <!-- Ads end -->

            </div>

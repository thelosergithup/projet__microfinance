<?php
$rsltuser = $con->query("select * from demandepret d JOIN client c ON d.idclient = c.idclient where iddemande='".$_SESSION['iddemande']."'") or die(mysqli_error($con));
    $recuser = mysqli_fetch_assoc($rsltuser);
    
?>
<!--<div class="row">-->
    <div class="col-sm-6 col-xs-12 col-lg-6 col-sm-offset-3">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4>Informations sur le  pret :</h4>
            </div>
            <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <img class="img-rounded" style="width: 100%;" src="pmfupload/profil/<?php print nl2br(htmlspecialchars($recuser["photoclient"])); ?>"> 
                </div>
                <div class="col-md-9 col-sm-9 col-xs-9">
                <b><u>Montant:</u></b> &nbsp;<?= $recuser['montantdemande']; ?>
                <br><br>
                <b><u>Durée (mois):</u></b> &nbsp;<?= $recuser['dureedemande']; ?>
                <br><br>
                <b><u>Num&eacute;ro de t&eacute;l&eacute;phone:</u></b> &nbsp;<?= $recuser['telclient']; ?>
                <br><br>
                <b><u>Motif:</u></b> &nbsp;<?= $recuser['motifdemande']; ?>
                <br><br>
                <b><u>Date de la demande:</u></b> &nbsp;<?= $recuser['datedemande']; ?>
                <br><br>
                <b><u>Nom du client:</u></b> &nbsp;<?= $recuser['nomclient']; ?>
                <br><br>
                <b><u>Adresse em@il:</u></b> &nbsp;<?= $recuser['emailclient']; ?>
                </div>
            </div>
            </div>
            <div class="panel-footer"><br>
                &nbsp;&nbsp;
                <a href="javascript:history.go(-1)" class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Quitter</a>
                &nbsp;&nbsp;
                <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogutilisateur/sotcocogediterprofil/edit_utilisateur'); ?>&idutilisateur=<?php echo $recuser["iduser"]; ?>" class="btn btn-info">
                    <span title="Modifier mon compte utilisateur" alt="editer"></span>
                    <i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;<b>Notifier le client</b>
                </a>
               
                
                <br><br>
            </div>
        </div>
    </div>
<!--</div>-->
<?php
$rsltuser = $con->query("select * from utilisateur where iduser='".$_SESSION["iduser"]."'") or die(mysqli_error($con));
    $recuser = mysqli_fetch_assoc($rsltuser);

?>
<!--<div class="row">-->
    <div class="col-sm-6 col-xs-12 col-lg-6 col-sm-offset-3">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4>Informations de <?= $recuser['nomuser']; ?>&nbsp;<?= $recuser['prenomuser']; ?></h4>
            </div>
            <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <img class="img-rounded" style="width: 100%;" src="pmfupload/profil/<?php print nl2br(htmlspecialchars($recuser["photouser"])); ?>"> 
                </div>
                <div class="col-md-9 col-sm-9 col-xs-9">
                <b><u>Nom:</u></b> &nbsp;<?= $recuser['nomuser']; ?>
                <br><br>
                <b><u>Prenom:</u></b> &nbsp;<?= $recuser['prenomuser']; ?>
                <br><br>
                <b><u>Num&eacute;ro de t&eacute;l&eacute;phone:</u></b> &nbsp;<?= $recuser['teluser']; ?>
                <br><br>
               
                <b><u>Login:</u></b> &nbsp;<?= $recuser['loginuser']; ?>
                <br><br>
                <b><u>Num&eacute;ro de la CNI:</u></b> &nbsp;<?= $recuser['cniuser']; ?>
                <br><br>
                
                <b><u>R&ocirc;le:</u></b> &nbsp;<?= $recuser['roleuser']; ?>
                <br><br>
                <b><u>Adresse em@il:</u></b> &nbsp;<?= $recuser['emailuser']; ?>
                <br><br>
                <b><u>Etat:</u></b> &nbsp;<?= $recuser['etatuser']; ?>
                </div>
            </div>
            </div>
            <div class="panel-footer"><br>
                &nbsp;&nbsp;
                <a href="javascript:history.go(-1)" class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Quitter</a>
                &nbsp;&nbsp;
                <a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfutilisateur/pmfediterprofil/edit_utilisateur'); ?>&idutilisateur=<?php echo $recuser["iduser"]; ?>" class="btn btn-info">
                    <span title="Modifier mon compte utilisateur" alt="editer"></span>
                    <i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;<b>Modifier mon compte</b>
                </a>
               
                
                <br><br>
            </div>
        </div>
    </div>
<!--</div>-->
<?php
if (isset($_REQUEST["idutilisateur"])) {
    $id = $_REQUEST["idutilisateur"];
    $rslt = $con->query("select * from sot_utilisateur where iduser='" . $id . "'") or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($rslt);
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default"> 
                <!--            <div class="row ">-->
                <div class="panel-heading">
                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogutilisateur/sotcocogsignature/sotcocogajouter/ajout_signature'); ?>&idutilisateur=<?php echo $_REQUEST["idutilisateur"]; ?>" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Ajouter</a>
                    <center><h4 style="font-weight: bold;">Liste des Signatures</h4></center>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-region">
                            <thead>
                                <tr class="btn-primary">
                                    <th>N&deg;</th>
                                    <th>Code</th>
                                    <th>Etat</th>
                                    <th>Date</th>
                                    <th>Op&eacute;ration</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td colspan="3"><center style="font-weight: bold;">Nombre total des signatures</center></td>
                            <td colspan="2">
                                <?php
                                $nb = $con->query("select count(idsignature) as nombre from sot_signature where iduser='".$_REQUEST["idutilisateur"]."'") or die(mysqli_error($con));
                                $nbr = mysqli_fetch_assoc($nb);
                                echo'<div style="text-align: center;font-weight: bold;">', $nbr['nombre'], '</div>';
                                ?>
                            </td>
                            </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                lister_signature($id, $con);
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php
}
?>

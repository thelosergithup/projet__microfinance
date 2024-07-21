<div class="single-product-tab-area mg-tb-15">
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Formulaire de retrait d'argent</h1>
                            </div>
                        </div>
                        <form id="retrait_argent" name="formretrait" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/pmfretrait/edit_retrdait'); ?>&pagecom=<?php echo NUM_PAGE + 1; ?>" style="padding: 2%;">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">Identifiant du compte&nbsp;<g style="color:red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formretrait'][NUM_PAGE]["compte"]; ?>" class="form-control" placeholder="" type="text" name="numcompte" id="numcompte" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">Montant à retirer&nbsp;<g style="color:red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formretrait'][NUM_PAGE]["montant"]; ?>" class="form-control" placeholder="" type="text" name="montant" id="montant" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">Motif du retrait&nbsp;<g style="color:red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
                                                <textarea class="form-control" placeholder="Entrez le motif du retrait" name="motif" id="motif" rows="3"><?php echo $_SESSION['formretrait'][NUM_PAGE]["motif"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class=" panel-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <b style="color: red">Champs Obligatoires *</b>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <center><button id="validateBtn" type="submit" name="retrait" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Valider</button></center>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
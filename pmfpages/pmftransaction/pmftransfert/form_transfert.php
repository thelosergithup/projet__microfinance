<div class="single-product-tab-area mg-tb-15 animated zoomIn">
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Formulaire de transfert d'argent</h1>
                            </div>
                        </div>
                        <form id="transfert_argent" name="formtransfert" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmftransaction/pmftransfert/edit_transfert'); ?>" style="padding: 2%;">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label">Login &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input class="form-control" placeholder=" " type="text" name="login" id="login" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label">Mot de passe &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                <input class="form-control" placeholder=" " type="password" name="mot_de_passe" id="mot_de_passe" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label">Numéro de compte source &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                                <input class="form-control" placeholder=" " type="text" name="numero_compte_source" id="numero_compte_source" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label">Numéro de compte destination &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                                <input class="form-control" placeholder=" " type="text" name="numero_compte_destination" id="numero_compte_destination" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label">Montant &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
                                                <input class="form-control" placeholder=" " type="number" step="0.01" name="montant" id="montant" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Motif du transfert &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                                <textarea class="form-control" placeholder=" " name="motif" id="motif" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Soumettre</button>
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

<script type="text/javascript">
document.getElementById("transfert_argent").addEventListener("submit", function(event) {
    var numeroCompteSource = document.getElementById("numero_compte_source").value;
    var numeroCompteDestination = document.getElementById("numero_compte_destination").value;
    var montant = parseFloat(document.getElementById("montant").value);

    // Vérifier que tous les champs sont remplis
    if (!numeroCompteSource || !numeroCompteDestination || !montant) {
        alert("Tous les champs doivent être remplis.");
        event.preventDefault();
        return;
    }

    // Vérifier que le montant est valide
    if (isNaN(montant) || montant <= 0) {
        alert("Veuillez entrer un montant valide.");
        event.preventDefault();
        return;
    }
});
</script>
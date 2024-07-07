<div class="single-product-tab-area mg-tb-15 animated zoomIn">
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Formulaire de dépôt d'argent</h1>
                            </div>
                        </div>
                        <form id="depot_argent" name="formdepot" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmftransaction/pmfdepot/edit_depot'); ?>" style="padding: 2%;">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label">Numéro de compte &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input class="form-control" placeholder=" " type="text" name="numero_compte" id="numero_compte" required />
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
                                                <input class="form-control" placeholder=" " type="number" name="montant" id="montant" required />
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
document.getElementById("depot_argent").addEventListener("submit", function(event) {
    var numeroCompte = document.getElementById("numero_compte").value;
    var montant = parseFloat(document.getElementById("montant").value);

    // Vérifier que tous les champs sont remplis
    if (!numeroCompte || !montant) {
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
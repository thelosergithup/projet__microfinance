<div class="single-product-tab-area mg-tb-15 animated zoomIn">
    <!-- Single pro tab review Start-->
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
<!--                         <form id="retrait_argent" name="formretrait" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('/pmfpages/pmftransaction/pmfretraift/edit_retrait.php'); ?>&pagecom=<?php echo NUM_PAGE + 1; ?>" style="padding: 2%;">
 -->                    <form id="retrait_argent" name="formretrait" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmftransaction/pmfretrait/edit_retrait'); ?>" style="padding: 2%;">

                        <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
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
                                <div class="col-md-4 col-sm-4 col-xs-4">
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
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">Login utilisateur &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input class="form-control" placeholder=" " type="text" name="login_utilisateur" id="login_utilisateur" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">Motif &nbsp;</label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                                <input class="form-control" placeholder=" " type="text" name="motif" id="motif" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">Mot de passe &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                <input class="form-control" placeholder=" " type="password" name="mot_de_passe" id="mot_de_passe" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">Confirmer le mot de passe &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                <input class="form-control" placeholder=" " type="password" name="confirm_mot_de_passe" id="confirm_mot_de_passe" vrequired />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Soumettreeee</button>
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
    document.getElementById("retrait_argent").addEventListener("submit", function(event) {
        var numeroCompte = document.getElementById("numero_compte").value;
        var montant = parseFloat(document.getElementById("montant").value);
        var loginUtilisateur = document.getElementById("login_utilisateur").value;
        var motDePasse = document.getElementById("mot_de_passe").value;
        var confirmMotDePasse = document.getElementById("confirm_mot_de_passe").value;

        // Vérifier que tous les champs sont remplis
        if (!numeroCompte || !montant || !loginUtilisateur || !motDePasse || !confirmMotDePasse) {
            alert("Tous les champs doivent être remplis.");
            event.preventDefault();
            return;
        }

        // Vérifier que les mots de passe correspondent
        if (motDePasse !== confirmMotDePasse) {
            alert("Les mots de passe ne correspondent pas.");
            event.preventDefault();
            return;
        }

        // Vérifier que le montant est un nombre réel
        if (isNaN(montant) || montant <= 0) {
            alert("Veuillez entrer un montant valide.");
            event.preventDefault();
            return;
        }

        // Le reste des vérifications sera fait côté serveur
    });
</script>
<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Formulaire de demande de pret</h1>
                            </div>
                        </div>
                        <?php define('NUM_PAGE', 1); ?>

                        <form id="ajout_demandepret" name="formdemandepret" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfpret/pmfdemandepret/pmfajouter/ajout_demandepret'); ?>&pagecom=<?php echo NUM_PAGE + 1; ?>" style="padding: 2%;">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">Votre login&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formdemandepret'][NUM_PAGE]["login"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="" class="form-control" placeholder="" type="text" name="login" id="login" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">montant de la demande&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
                                                <input value="<?php echo $_SESSION['formdemandepret'][NUM_PAGE]["montant"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="" class="form-control" placeholder="" type="number" name="montant" id="montant" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">durée &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                                <input value="<?php echo $_SESSION['formdemandepret'][NUM_PAGE]["duree"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="" class="form-control" placeholder="" type="number" name="duree" id="duree" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">motif de la demande&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                                <input value="<?php echo $_SESSION['formdemandepret'][NUM_PAGE]["motif"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="" class="form-control" placeholder="" type="text" name="motif" id="motif" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" panel-footer">
                                <div class="row">
                                    <br>
                                    <div class="col-sm-12">
                                        <b style="color: red">Champs Obligatoires *</b>
                                    </div>
                                    <br>
                                    <div class="col-sm-12 text-center">
                                        <center><button id="validateBtn" type="submit" name="inscompte" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Soumettre</button>
                                            <button type="reset" id="resetBtn" class="btn btn-primary"><i class="glyphicon glyphicon-remove"></i> Effacer</button>
                                            <a href="javascript:history.go(-1)" class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Quitter</a>
                                        </center><br>
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
    $(document).ready(function() {
                // Generate a simple captcha
                function randomNumber(min, max) {
                    return Math.floor(Math.random() * (max - min + 1) + min);
                };
                $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

                $('#ajout_demandepret').bootstrapValidator({
                        //        live: 'disabled',
                        message: 'Cette valeur est invalide',
                        feedbackIcons: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            login: {
                                message: 'login utilisateur invalide',
                                validators: {
                                    notEmpty: {
                                        message: 'votre login est obligatoire'
                                    },
                                    stringLength: {
                                        min: 4,
                                        message: 'Le login doit avoir au moins 4 characteres de long'
                                    },
                                    remote: {
                                        type: 'POST',
                                        url: './pmfpages/pmfpret/pmfdemandepret/remoteformvalidationcompte.php',
                                        message: 'Le nom doit etre unique'
                                    }
                                }
                            },
                            montant: {
                                validators: {
                                    notEmpty: {
                                        message: 'Le montant est obligatoire'
                                    }
                                }
                            }
                        },
                        duree: {
                            validators: {
                                notEmpty: {
                                    message: 'La durée est obligatoire'
                                },
                                greaterThanOrEqualTo: {
                                    value: 0,
                                    message: 'La durée ne peut pas être inférieur à 0'
                                }
                            }
                        },
                        motif: {
                            validators: {
                                notEmpty: {
                                    message: 'Le motif est obligatoire'
                                }
                            }
                        }
                    });
                });


            // Validate the form manually
            //    $('#validateBtn').click(function() {
            //        $('#ajout_compte').bootstrapValidator('validate');
            //    });
            //
            //    $('#resetBtn').click(function() {
            //        $('#ajout_compte').data('bootstrapValidator').resetForm(true);
            //    });
</script>
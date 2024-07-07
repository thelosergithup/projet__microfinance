<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Formulaire de creation d'un compte</h1>
                            </div>
                        </div>
                        <form id="ajout_compte" name="formcompte" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/pmfajouter/ajout_compte'); ?>&pagecom=<?php echo NUM_PAGE + 1; ?>" style="padding: 2%;">

                            <input value="<?php echo $_SESSION['formcompte'][NUM_PAGE]["idclient"]; ?>" type="hidden" name="idclient" id="idville" />
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">type de compte&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <?php
                                                $rsltp = $con->query('select * from typecompte ORDER BY idtypecom DESC') or die(mysqli_error($con));
                                                ?>
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <select class="form-control" name="typecompte" id="typecompte">
                                                    <option value=""> - Choisissez le type de compte- </option>
                                                    <?php
                                                    while ($rowp = mysqli_fetch_assoc($rsltp)) {
                                                    ?>
                                                        <option value="<?php echo $rowp["idtypecom"]; ?>" <?php if ($rowp["idtypecom"] == $_SESSION['formcompte'][NUM_PAGE]["typecompte"]) { ?> selected <?php } ?>><?php echo $rowp["nomtypecom"]; ?></option>

                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">client&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <?php
                                                $rsltp = $con->query('select * from client') or die(mysqli_error($con));
                                                ?>
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <select class="form-control" name="client" id="client">
                                                    <option value=""> - Choisissez un client - </option>
                                                    <?php
                                                    while ($rowp = mysqli_fetch_assoc($rsltp)) {
                                                    ?>
                                                        <option value="<?php echo $rowp["idclient"]; ?>" <?php if ($rowp["idclient"] == $_SESSION['formcompte'][NUM_PAGE]["client"]) { ?> selected <?php } ?>><?php echo $rowp["nomclient"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input value="<?php echo $_SESSION['formcompte'][NUM_PAGE]["idclient"]; ?>" type="hidden" name="idclient" id="idclient" />

                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">Nom client&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formcompte'][NUM_PAGE]["compte"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" class="form-control" placeholder="" type="text" name="compte" id="compte" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">Solde&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formcompte'][NUM_PAGE]["solde"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" class="form-control" placeholder="" type="text" name="solde" id="solde" />
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">Devise&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formcompte'][NUM_PAGE]["devise"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" class="form-control" placeholder="" type="text" name="devise" id="devise" />
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
                                        <center><button id="validateBtn" type="submit" name="inscompte" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Enregistrer</button>
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

                $('#ajout_compte').bootstrapValidator({
                        //        live: 'disabled',
                        message: 'Cette valeur est invalide',
                        feedbackIcons: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            compte: {
                                message: 'Nom du compte invalide',
                                validators: {
                                    notEmpty: {
                                        message: 'Le nom du compte est obligatoire'
                                    },
                                    stringLength: {
                                        min: 2,
                                        message: 'Le nom du compte doit avoir au moins 2 characteres de long'
                                    },
                                    remote: {
                                        type: 'POST',
                                        url: './pmfpages/pmfparametre/pmfcompte/remoteformvalidationcompte.php',
                                        message: 'Le nom doit etre unique'
                                    }
                                }
                            },
                            typecompte: {
                                validators: {
                                    notEmpty: {
                                        message: 'Le type de compte est obligatoire'
                                    }
                                }
                            }
                        },
                        solde: {
                            validators: {
                                notEmpty: {
                                    message: 'Le solde est obligatoire'
                                },
                                greaterThanOrEqualTo: {
                                    value: 0,
                                    message: 'Le solde ne peut pas être inférieur à 0'
                                }
                            }
                        }
                    },
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
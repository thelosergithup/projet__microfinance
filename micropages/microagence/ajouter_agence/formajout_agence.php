
<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Formulaire d'ajout d'une agence</h1>
                            </div>
                        </div>
                        <form id="ajout_agence" name="formagence" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('micropages/microagence/ajouter_agence/ajout_agence'); ?>&pagecom=<?php echo NUM_PAGE + 1; ?>" style="padding: 2%;">

                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">ville&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <?php
                                                $rsltp = $con->query('select * from ville') or die(mysqli_error($con));
                                                ?>
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <select class="form-control" name="idville" id="ville">
                                                    <option value=""> - Choisissez une ville - </option>                                                                                                     
                                                    <?php
                                                    while ($rowp = mysqli_fetch_assoc($rsltp)) {
                                                        ?>
                                                        <option value="<?php echo $rowp["idville"]; ?>" <?php if ($rowp["idville"] == $_SESSION['formagence'][NUM_PAGE]["agence"]) { ?> selected <?php } ?>><?php echo $rowp["nomville"]; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label" > agence&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formagence'][NUM_PAGE]["agence"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" class="form-control" placeholder="" type="text" name="agence" id="agence" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label" >adresse&nbsp;</label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formagence'][NUM_PAGE]["adresse"]; ?>" class="form-control" placeholder="" type="text" name="adresse" id="adresse" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label class="control-label" >T&eacute;l&eacute;phone&nbsp;</label>
                                                <div class="inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                        <input value="<?php echo $_SESSION['formagence'][NUM_PAGE]["tel"]; ?>" min="9" maxlength="9" class="form-control" placeholder="" type="text" name="tel" id="tel" />
<!--                                                        <input value="//<?php echo $_SESSION['formagence'][NUM_PAGE]["tel"]; ?>" min="9" maxlength="9" class="form-control" placeholder="" type="text" name="tel" id="tel" />-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label class="control-label">E-Mail&nbsp;</label>
                                                <div class="inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                        <input value="<?php echo $_SESSION['formagence'][NUM_PAGE]["email"]; ?>" class="form-control" placeholder="" type="text" name="email" id="email" />
<!--                                                        <input value="<?php echo $_SESSION['formagence'][NUM_PAGE]["email"]; ?>" class="form-control" placeholder=" " type="text" name="email" id="email" />-->
                                                    </div>
                                                </div>
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
                                        <center><button id="validateBtn" type="submit" name="insville" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Enregistrer</button>
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
        }
        ;
        $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

        $('#ajout_agence').bootstrapValidator({
//        live: 'disabled',
            message: 'Cette valeur est invalide',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                ville: {
                    message: 'Nom de la ville invalide',
                    validators: {
                        notEmpty: {
                            message: 'Le nom de la ville est obligatoire'
                        },
                        stringLength: {
                            min: 2,
                            message: 'Le nom de la ville doit avoir au moins 2 characteres de long'
                        },
                        remote: {
                            type: 'POST',
                            url: './micropages/microagence/remoteformvalidation_agence.php',
                            message: 'Le nom doit etre unique'
                        }
                    }
                },
                agence: {
                    validators: {
                        notEmpty: {
                            message: 'L\agence est obligatoire'
                        }
                    }
                }
            },
              },
                adresse: {
                    message: 'cni de l\'utilisateur invalide',
                    validators: {
                        message: 'La cni doit contenir seulement les chiffres and les lettres de l\'alphabet'
                    }
                }
             email: {
                    validators: {
                        emailAddress: {
                            message: 'Adresse mail invalide'
                        }
                    }
                },
                tel: {
                    message: 'Téléphone de l\'utilisateur invalide',
                    validators: {
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Le Téléphone doit contenir seulement les chiffres'
                        }
                    }
              
        });

        // Validate the form manually
//    $('#validateBtn').click(function() {
//        $('#ajout_ville').bootstrapValidator('validate');
//    });
//
//    $('#resetBtn').click(function() {
//        $('#ajout_ville').data('bootstrapValidator').resetForm(true);
//    });
    });
</script>


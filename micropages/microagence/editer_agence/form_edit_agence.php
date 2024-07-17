
<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Formulaire de modification d'une agence</h1>
                            </div>
                        </div>
                        <form id="edit_agence" name="formagencee" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('micropages/microagence/editer_agence/edit_agence'); ?>&pagecom=<?php echo NUM_PAGE + 1; ?>&idagence=<?php echo $_REQUEST["idagence"]; ?>" style="padding: 2%;">

                            <input value="<?php echo $_SESSION['formagencee'][NUM_PAGE]["idagence"]; ?>" type="hidden" name="idagence" id="idagence" />

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">ville&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <?php
                                                $rsltp = $con->query('select * from ville') or die(mysqli_error($con));
                                                ?>
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <select class="form-control" name="villee" id="villee">
                                                    <option value=""> - Choisissez la ville - </option>
                                                    <?php
                                                    while ($rowp = mysqli_fetch_assoc($rsltp)) {
                                                        ?>
                                                        <option value="<?php echo $rowp["idville"]; ?>" <?php if ($rowp["idville"] == $_SESSION['formagencee'][NUM_PAGE]["villee"]) { ?> selected <?php } ?>><?php echo $rowp["nomville"]; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                              
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label" >Nom agence&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formagencee'][NUM_PAGE]["agencee"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" class="form-control" placeholder="" type="text" name="agencee" id="agencee" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">adresse &nbsp;</label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formagencee'][NUM_PAGE]["adressee"]; ?>" class="form-control" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" placeholder="" type="text" name="adressee" id="adressee" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label" >T&eacute;l&eacute;phone&nbsp;</label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                                <input value="<?php echo $_SESSION['formagencee'][NUM_PAGE]["tele"]; ?>" min="9" maxlength="9" class="form-control" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" placeholder="" type="text" name="tele" id="tele" />
                                            </div>
                                        </div>
                                    </div>
                                </div>                                     
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">E-Mail&nbsp;</label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formagencee'][NUM_PAGE]["emaile"]; ?>" class="form-control" placeholder=" " type="text" name="emaile" id="emaile" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <br>
                                    <div class="col-sm-12">
                                        <b style="color: red">Champs Obligatoires *</b>
                                    </div>
                                    <br>
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" id="validateBtnpe" name="" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Modifier</button>
                                        <button type="reset" id="resetBtnpe" class="btn btn-primary"><i class="glyphicon glyphicon-remove"></i> Effacer</button>
                                        <a href="javascript:history.go(-1)" class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Quitter</a>
                                        <br>
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
            var idagence = document.getElementById('idag').value;
//        alert(idville);
            $('#edit_agence').bootstrapValidator({
//        live: 'disabled',
    message: 'Cette valeur est invalide',
            feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
            agencee: {
            message: 'Nom du ville invalide',
                    validators: {
                    notEmpty: {
                    message: 'Le nom de l'agence est obligatoire'
                    },
                            stringLength: {
                            min: 2,
                                    message: 'Le nom de l'agence doit avoir au moins 2 characteres de long'
                            },
                            remote: {
                            type: 'POST',
                                    data: {idville: idville},
                                    dataType: 'json',
                                    url: './micropages/microagence/remoteformvalidation_agence.php',
                                    message: 'Le nom doit etre unique'
                            }
                    }
            },
                    villee: {
                    validators: {
                    notEmpty: {
                    message: 'La ville de l'agence est obligatoire'
                    }
                    }
                    }
            }
    });
            // Validate the form manually
//        $('#validateBtnpe').click(function () {
//            $('#edit_ville').bootstrapValidator('validate');
//        });

//        $('#resetBtnpe').click(function () {
//            $('#edit_ville').data('bootstrapValidator').resetForm(true);
//        });
    });
</script>

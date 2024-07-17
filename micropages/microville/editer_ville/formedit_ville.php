
<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Formulaire de modification d'une Ville</h1>
                            </div>
                        </div>
                        <form id="edit_ville" name="formvillee" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('micropages/microville/editer_ville/edit_ville'); ?>&pagecom=<?php echo NUM_PAGE + 1; ?>&idville=<?php echo $_REQUEST["idville"]; ?>" style="padding: 2%;">

                            <input value="<?php echo $_SESSION['formvillee'][NUM_PAGE]["idville"]; ?>" type="hidden" name="idville" id="idville" />

                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">region&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <?php
                                                $rsltp = $con->query('select * from region') or die(mysqli_error($con));
                                                ?>
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <select class="form-control" name="regione" id="regione">
                                                    <option value=""> - Choisissez la region- </option>
                                                    <?php
                                                    while ($rowp = mysqli_fetch_assoc($rsltp)) {
                                                        ?>
                                                        <option value="<?php echo $rowp["idregion"]; ?>" <?php if ($rowp["idregion"] == $_SESSION['formvillee'][NUM_PAGE]["regione"]) { ?> selected <?php } ?>><?php echo $rowp["nomregion"]; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label" > ville&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formvillee'][NUM_PAGE]["villee"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" class="form-control" placeholder="" type="text" name="nomvillee" id="nomvillee" />
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

        var idville = document.getElementById('idville').value;
//        alert(idville);
        $('#edit_ville').bootstrapValidator({
//        live: 'disabled',
            message: 'Cette valeur est invalide',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                villee: {
                    message: 'Nom du ville invalide',
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
                            data: {idville: idville},
                            dataType: 'json',
                            url: './micropages/microclient/remoteformvalidationville.php',
                            message: 'Le nom doit etre unique'
                        }
                    }
                },
                regione: {
                    validators: {
                        notEmpty: {
                            message: 'La region de la ville est obligatoire'
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

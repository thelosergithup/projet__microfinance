
<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Formulaire de modification d'un compte</h1>
                            </div>
                        </div>
        <form id="edit_compte" name="formcomptee" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/pmfediter/edit_compte'); ?>&pagecom=<?php echo NUM_PAGE + 1; ?>&idcompte=<?php echo $_REQUEST["idcompte"]; ?>" style="padding: 2%;">
        
            <input value="<?php echo $_SESSION['formcomptee'][NUM_PAGE]["idcompte"]; ?>" type="" name="idcompte" id="idcompte" />

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group" style="margin-left:15px;">
                    <label class="control-label">type de compte&nbsp;<g style="color: red">*</g></label>
                        <div class="inputGroupContainer">
                            <a href="form_edit_compte.php"></a>
                            <div class="input-group">
                                <?php
                                $rsltp = $con->query('select * from typecompte') or die(mysqli_error($con));
                                ?>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <select class="form-control" name="comptee" id="comptee">
                                    <option value=""> - Choisissez le type de compte - </option>
                                    <?php
                                    while ($rowp = mysqli_fetch_assoc($rsltp)) {
                                        ?>
                                        <option value="<?php echo $rowp["idtypecom"]; ?>" <?php if ($rowp["idtypecom"] == $_SESSION['formcomptee'][NUM_PAGE]["comptee"]) { ?> selected <?php } ?>><?php echo $rowp["nomtypecom"]; ?></option>
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
                    <label class="control-label" >Nom client&nbsp;<g style="color: red">*</g></label>
                    <div class="inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input value="<?php echo $_SESSION['formcomptee'][NUM_PAGE]["nomcliente"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" class="form-control" placeholder="" type="text" name="nomcliente" id="nomcliente" />
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group" style="margin-left:15px;">
                    <label class="control-label" >Solde&nbsp;<g style="color: red">*</g></label>
                    <div class="inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input value="<?php echo $_SESSION['formcomptee'][NUM_PAGE]["soldee"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" class="form-control" placeholder="" type="text" name="solde" id="soldee" />
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group" style="margin-left:15px;">
                    <label class="control-label" >Devise&nbsp;<g style="color: red">*</g></label>
                    <div class="inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input value="<?php echo $_SESSION['formcomptee'][NUM_PAGE]["devisee"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" class="form-control" placeholder="" type="text" name="devisee" id="devisee" />
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
    $(document).ready(function () {
        // Generate a simple captcha
        function randomNumber(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        }
        ;
        $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

        var idcompte = document.getElementById('idcompte').value;
//        alert(idcompte);
        $('#edit_compte').bootstrapValidator({
//        live: 'disabled',
            message: 'Cette valeur est invalide',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nomcliente: {
                    message: 'Nom du compte invalide',
                    validators: {
                        notEmpty: {
                            message: 'Le nom du cloient du  compte est obligatoire'
                        },
                        stringLength: {
                            min: 2,
                            message: 'Le nom du client du  compte doit avoir au moins 2 characteres de long'
                        },
                        remote: {
                            type: 'POST',
                            data: {idcompte: idcompte},
                            dataType: 'json',
                            url: './pmfpages/pmfparametre/pmfcompte/remoteformvalidationcompte.php',
                            message: 'Le nom doit etre unique'
                        }
                    }
                },
                payse: {
                    validators: {
                        notEmpty: {
                            message: 'Le type de compte  du compte est obligatoire'
                        }
                    }
                }
            }
        });

        // Validate the form manually
//        $('#validateBtnpe').click(function () {
//            $('#edit_compte').bootstrapValidator('validate');
//        });

//        $('#resetBtnpe').click(function () {
//            $('#edit_compte').data('bootstrapValidator').resetForm(true);
//        });
    });
</script>

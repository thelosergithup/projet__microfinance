<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Formulaire d'ajout d'un type de compte</h1>
                            </div>
                        </div>
        <form id="ajout_pays" name="formtypecompte" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmftypecompte/pmfajouter/ajout_typecompte'); ?>&pagecom=<?php echo NUM_PAGE + 1; ?>" style="padding: 2%;">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group" style="margin-left:15px;">
                        <label class="control-label">Code&nbsp;<g style="color: red">*</g></label>
                        <div class="inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input value="<?php echo $_SESSION['formtypecompte'][NUM_PAGE]["codet"]; ?>" onkeyup="this.value = this.value.toUpperCase();" class="form-control" placeholder=" " type="text" name="codet" id="codet" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group" style="margin-left:15px;">
                        <label class="control-label" >Nom typecompte&nbsp;<g style="color: red">*</g></label>
                        <div class="inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input value="<?php echo $_SESSION['formtypecompte'][NUM_PAGE]["typecompte"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" class="form-control" placeholder="" type="text" name="typecompte" id="typecompte" />
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
                        <center><button id="validateBtn" type="submit" name="instypecompte" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Enregistrer</button>
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

    $('#ajout_pays').bootstrapValidator({
//        live: 'disabled',
        message: 'Cette valeur est invalide',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            codep: {
                message: 'Code du pays invalide',
                validators: {
                    notEmpty: {
                        message: 'Le code du pays est obligatoire'
                    },
                    stringLength: {
                        min: 1,
                        max: 5,
                        message: 'Le code du pays doit etre entre 1 et 5 characteres de long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'Le code du pays peut contenir seulement les lettres de l\'alphabet et les chiffres'
                    },
                    remote: {
                        type: 'POST',
                        url: './sotcocogpages/sotcocogparametre/sotcocogpays/remoteformvalidationpays.php',
                        message: 'Le code doit etre unique'
                    }
                }
            },
            pays: {
                validators: {
                    notEmpty: {
                        message: 'Le nom du pays est obligatoire'
                    },
                    remote: {
                        type: 'POST',
                        url: './sotcocogpages/sotcocogparametre/sotcocogpays/remoteformvalidationpays.php',
                        message: 'Le nom doit etre unique'
                    }
                }
            },
            indice: {
                message: 'Indice du pays invalide',
                validators: {
                    notEmpty: {
                        message: 'L\'indice du pays est obligatoire'
                    },
                    stringLength: {
                        min: 2,
                        max: 8,
                        message: 'L\'indice du pays doit etre entre 2 et 8 characteres de long'
                    },
                    regexp: {
                        regexp: /^[+0-9]+$/,
                        message: 'L\'indice du pays peut contenir seulement le caractere plus et les chiffres'
                    },
                    remote: {
                        type: 'POST',
                        url: './sotcocogpages/sotcocogparametre/sotcocogpays/remoteformvalidationpays.php',
                        message: 'L\'indice doit etre unique'
                    }
                }
            }
        }
    });

    // Validate the form manually
//    $('#validateBtn').click(function() {
//        $('#ajout_pays').bootstrapValidator('validate');
//    });
//
//    $('#resetBtn').click(function() {
//        $('#ajout_pays').data('bootstrapValidator').resetForm(true);
//    });
});
</script>

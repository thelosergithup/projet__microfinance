<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1" >
    <div class="panel panel-warning panel-warning-insription">
        <div class="panel-heading">
            <h4>Formulaire d'Ajout d'une signature</h4>  
        </div>
        <form id="ajout_signature" name="formsignature" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogutilisateur/sotcocogsignature/sotcocogajouter/ajout_signature'); ?>&idutilisateur=<?php echo $_REQUEST["idutilisateur"]; ?>&pagecom=<?php echo NUM_PAGE + 1; ?>" style="padding: 2%;">

            <input value="<?php echo $_SESSION['formsignature'][NUM_PAGE]["idutilisateur"]; ?>" type="hidden" name="idutilisateur" id="idutilisateur" />

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group" style="margin-left:15px;">
                        <label class="control-label">Code &nbsp;<g>*</g></label>
                        <div class="inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input value="<?php echo $_SESSION['formsignature'][NUM_PAGE]["code"]; ?>" class="form-control" placeholder=" " type="text" name="code" id="code" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" panel-footer">
                    <div class="row">
                        <br>
                        <div class="col-sm-12">
                            <b style="color: red">Champs Obligatoires *</b>
                        </div>
                        <br>
                        <div class="col-sm-12 text-center">
                            <center><button id="validateBtn" type="submit" name="insutilisateur" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Enregistrer</button>
                                <button type="reset" id="resetBtn" class="btn btn-primary"><i class="glyphicon glyphicon-remove"></i> Effacer</button>
                                <a href="javascript:history.go(-1)" class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Quitter</a>
                            </center><br>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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

//        var idutilisateur = document.getElementById('idutilisateur').value;
        $('#ajout_signature').bootstrapValidator({
//        live: 'disabled',
            message: 'Cette valeur est invalide',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                code: {
                    message: 'code de la signature invalide',
                    validators: {
                        notEmpty: {
                            message: 'Le code de la signature est obligatoire'
                        },
                        remote: {
                            type: 'POST',
//                            data: {idutilisateur: idutilisateur},
//                            dataType: 'json',
                            url: './sotcocogpages/sotcocogutilisateur/remoteformvalidationutilisateur.php',
                            message: 'Le code de la signature doit etre unique'
                        }
                    }
                }
            }
        });

        // Validate the form manually
//    $('#validateBtn').click(function() {
//        $('#ajout_signature').bootstrapValidator('validate');
//    });
//
//    $('#resetBtn').click(function() {
//        $('#ajout_signature').data('bootstrapValidator').resetForm(true);
//    });
    });
</script>

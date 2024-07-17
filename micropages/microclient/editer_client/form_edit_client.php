
<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Formulaire de modification d'un client</h1>
                            </div>
                        </div>
                        <form id="edit_utilisateur" name="formcliente" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('micropages/microclient/editer_client/edit_client'); ?>&idclient=<?php echo $_REQUEST["idclient"]; ?>&pagecom=<?php echo NUM_PAGE + 1; ?>" style="padding: 2%;">

                            <input value="<?php echo $_SESSION['formcliente'][NUM_PAGE]["idclient"]; ?>" type="hidden" name="idclient" id="idclient" />


                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">agence&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <?php
                                                $rsltp = $con->query('select * from agence') or die(mysqli_error($con));
                                                ?>
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <select class="form-control" name="agencee" id="agencee">
                                                    <option value=""> - Choisissez une agence - </option>
                                                    <?php
                                                    while ($rowp = mysqli_fetch_assoc($rsltp)) {
                                                        ?>
                                                        <option value="<?php echo $rowp["idag"]; ?>" <?php if ($rowp["idag"] == $_SESSION['formcliente'][NUM_PAGE]["agencee"]) { ?> selected <?php } ?>><?php echo $rowp["nomag"]; ?></option>
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
                                        <label class="control-label">utilisateur&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <?php
                                                $rsltp = $con->query('select * from utilisateur') or die(mysqli_error($con));
                                                ?>
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <select class="form-control" name="utilisateure" id="utilisateure">
                                                    <option value=""> - Choisissez un utilisateur - </option>
                                                    <?php
                                                    while ($rowp = mysqli_fetch_assoc($rsltp)) {
                                                        ?>
                                                        <option value="<?php echo $rowp["iduser"]; ?>" <?php if ($rowp["iduser"] == $_SESSION['formcliente'][NUM_PAGE]["nome"]) { ?> selected <?php } ?>><?php echo $rowp["nomuser"]; ?></option>
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
                                        <label class="control-label" >Nom client&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formcliente'][NUM_PAGE]["nome"]; ?>" onkeyup="this.value = this.value.toUpperCase();" style="text-transform: capitalize;" class="form-control" placeholder="" type="text" name="nome" id="nome" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">Pr&eacute;nom &nbsp;</label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formcliente'][NUM_PAGE]["prenome"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" class="form-control" placeholder="" type="text" name="prenome" id="prenome" />
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                    
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">sexe client &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <select class="form-control" name="sexee" id="sexee">
                                                    <option value=""> genre </option>
                                                    <option value="femimin"> Femimin </option>
                                                    <option value="masculin"> Masculin </option>
                                                    <option value="<?php echo $_SESSION['formcliente'][NUM_PAGE]["sexee"]; ?>" class="form-control" onkeyup="this.value = this.value.toLowerCase();" placeholder=" " type="text" name="sexee" id="sexee" </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">date naissance client &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formcliente'][NUM_PAGE]["dateNaisse"]; ?>" class="form-control" onkeyup="this.value = this.value.toLowerCase();" placeholder=" " type="date" name="dateNaisse" id="dateNaisse" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label" >cni &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formcliente'][NUM_PAGE]["cnie"]; ?>"onkeyup="this.value = this.value.toUpperCase();" style="text-transform: capitalize;"class="form-control" onkeyup="this.value = this.value.toLowerCase();" placeholder=" " type="text" name="cnie" id="cnie" />
                                            </div>
                                        </div>
                                    </div>
                                </div>                                 
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label" >T&eacute;l&eacute;phone&nbsp;</label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formcliente'][NUM_PAGE]["tele"]; ?>" min="9" maxlength="9" class="form-control" placeholder="" type="text" name="tele" id="tele" />
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
                                                <input value="<?php echo $_SESSION['formcliente'][NUM_PAGE]["emaile"]; ?>" class="form-control" placeholder=" " type="text" name="emaile" id="emaile" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label" >nationalite&nbsp;</label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formcliente'][NUM_PAGE]["nationalitee"]; ?>"onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;"   class="form-control" placeholder="" type="text" name="nationalitee" id="nationalitee" />
                                            </div>
                                        </div>
                                    </div>
                                </div>                                    
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label>Photo :</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-preview thumbnail" style="width: 90px; height: 95px;"></div>
                                            <div>
                                                <span class="btn btn-file btn-primary"><span class="fileupload-new">Sélectionner une image</span>
                                                    <span class="fileupload-exists">Changer</span><input type="file" name="photo" id="photo" /></span>
                                                <a href="#" class="btn btn-primary fileupload-exists" data-dismiss="fileupload">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label" >Login &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formcliente'][NUM_PAGE]["logine"]; ?>" class="form-control" placeholder="" type="text" name="login" id="logine" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label" >Mot de passe &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-mail-forward"></i></span>
                                                <input value="<?php echo $_SESSION['formcliente'][NUM_PAGE]["pass1e"]; ?>" class="form-control" placeholder="" type="password" name="pass1e" id="pass1e" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label" >Confirmer le Mot de passe &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-mail-forward"></i></span>
                                                <input value="<?php echo $_SESSION['formcliente'][NUM_PAGE]["pass2e"]; ?>" class="form-control" placeholder="" type="password" name="pass2e" id="pass2e" />
                                            </div>
                                        </div>
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
                                <button type="submit" id="validateBtnpe" name="" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Modifier</button>
                                <button type="reset" id="resetBtnpe" class="btn btn-primary"><i class="glyphicon glyphicon-remove"></i> Effacer</button>
                                <a href="javascript:history.go(-1)" class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Quitter</a>
                                </center><br>
                            </div>
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

        var idutilisateur = document.getElementById('idutilisateur').value;
        $('#edit_utilisateur').bootstrapValidator({
//        live: 'disabled',
            message: 'Cette valeur est invalide',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nome: {
                    message: 'Nom de l\'utilisateur invalide',
                    validators: {
                        notEmpty: {
                            message: 'Le nom de l\'utilisateur est obligatoire'
                        }
                    }
                },
                entetee: {
                    message: 'Entête de l\'utilisateur invalide',
                    validators: {
                        notEmpty: {
                            message: 'L\'Entête de l\'utilisateur est obligatoire'
                        }
                    }
                },
                departemente: {
                    message: 'Département de l\'utilisateur invalide',
                    validators: {
                        notEmpty: {
                            message: 'Le Département de l\'utilisateur est obligatoire'
                        }
                    }
                },
                rolee: {
                    message: 'Rôle de l\'utilisateur invalide',
                    validators: {
                        notEmpty: {
                            message: 'Le Rôle de l\'utilisateur est obligatoire'
                        }
                    }
                },
                logine: {
                    message: 'Login de l\'utilisateur invalide',
                    validators: {
                        remote: {
                            type: 'POST',
                            data: {idutilisateur: idutilisateur},
                            dataType: 'json',
                            url: './sotcocogpages/sotcocogutilisateur/remoteformvalidationutilisateur.php',
                            message: 'Le login doit etre unique'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'Le login doit contenir seulement les lettres de l\'alphabet, les chiffres, le point and la barre de 8(_)'
                        }
                    }
                },
                pass1e: {
                    validators: {
                        identical: {
                            field: 'pass2e'
                        },
                        remote: {
                            type: 'POST',
                            data: {idutilisateur: idutilisateur},
                            dataType: 'json',
                            url: './sotcocogpages/sotcocogutilisateur/remoteformvalidationutilisateur.php',
                            message: 'Le nom doit etre unique'
                        }
                    }
                },
                pass2e: {
                    validators: {
                        identical: {
                            field: 'pass1e'
                        }
                    }
                },
                emaile: {
                    validators: {
                        emailAddress: {
                            message: 'Adresse mail invalide'
                        }
                    }
                },
                tele: {
                    message: 'Téléphone de l\'utilisateur invalide',
                    validators: {
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Le Téléphone doit contenir seulement les chiffres'
                        }
                    }
                },
                lignee: {
                    message: 'Ligne de l\'utilisateur invalide',
                    validators: {
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'La Ligne doit contenir seulement les chiffres'
                        }
                    }
                },
                photoe: {
                    validators: {
                        file: {
//                        extension: 'png',
//                        extension: {'png', 'PNG', 'jpeg', 'JPEG', 'gif', 'GIF'},
//                        extension: ('png', 'PNG', 'jpeg', 'JPEG', 'gif', 'GIF'),
//                        extension: ('png', 'JPEG'),
//                        maxSize: 5*1024*1024,
                            message: 'Veuillez choisir une taille inferieur à 5M'
                        }
                    }
                }
            }
        });

        // Validate the form manually
//    $('#validateBtn').click(function() {
//        $('#edit_utilisateur').bootstrapValidator('validate');
//    });
//
//    $('#resetBtn').click(function() {
//        $('#edit_utilisateur').data('bootstrapValidator').resetForm(true);
//    });
    });
</script>

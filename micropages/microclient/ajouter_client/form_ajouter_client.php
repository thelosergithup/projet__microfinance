<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Formulaire d'ajout d'un clientr</h1>
                            </div>
                        </div>
                        <form id="ajout_client" name="formclient" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('micropages/microclient/ajouter_client/ajout_client'); ?>&pagecom=<?php echo NUM_PAGE + 1; ?>" style="padding: 2%;">

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
                                                <select class="form-control" name="idag" id="agence">
                                                    <option value=""> - Choisissez une agence - </option>
                                                    <?php
                                                    while ($rowp = mysqli_fetch_assoc($rsltp)) {
                                                    ?>
                                                        <option value="<?php echo $rowp["idag"]; ?>" <?php if ($rowp["idag"] == $_SESSION['formclient'][NUM_PAGE]["agence"]) { ?> selected <?php } ?>><?php echo $rowp["nomag"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">Pr&eacute;nom &nbsp;</label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formclient'][NUM_PAGE]["prenom"]; ?>" class="form-control" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" placeholder="" type="text" name="prenom" id="prenom" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group" style="margin-left:15px;">
                                        <label class="control-label">Nom client&nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formclient'][NUM_PAGE]["nom"]; ?>" onkeyup="this.value = this.value.toUpperCase();" style="text-transform: capitalize;" class="form-control" placeholder="" type="text" name="nom" id="nom" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">nationalite&nbsp;</label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formclient'][NUM_PAGE]["nationalite"]; ?>" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" class="form-control" placeholder="" type="text" name="nationalite" id="nationalite" />
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
                                                <select class="form-control" name="sexe" id="sexe">
                                                    <option value=""> genre </option>
                                                    <option value="femimin"> Femimin </option>
                                                    <option value="masculin"> Masculin </option>
                                                    <option value="<?php echo $_SESSION['formclient'][NUM_PAGE]["sexe"]; ?>" class="form-control" onkeyup="this.value = this.value.toLowerCase();" placeholder=" " type="text" name="sexe" id="sexe" </option>
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
                                                <input value="<?php echo $_SESSION['formclient'][NUM_PAGE]["dateNaiss"]; ?>" class="form-control" onkeyup="this.value = this.value.toLowerCase();" placeholder=" " type="date" name="dateNaiss" id="dateNaiss" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">cni &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formclient'][NUM_PAGE]["cni"]; ?>" class="form-control" onkeyup="this.value = this.value.toUpperCase();" style="text-transform: capitalize;" placeholder=" " type="text" name="cni" id="cni" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">T&eacute;l&eacute;phone&nbsp;</label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formclient'][NUM_PAGE]["tel"]; ?>" min="9" maxlength="9" class="form-control" placeholder="" type="text" name="tel" id="tel" />
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
                                                <input value="<?php echo $_SESSION['formclient'][NUM_PAGE]["email"]; ?>" class="form-control" placeholder=" " type="text" name="email" id="email" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                

                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">Login &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formclient'][NUM_PAGE]["login"]; ?>" class="form-control" placeholder="" type="text" name="login" id="login" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">Mot de passe &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-mail-forward"></i></span>
                                                <input value="<?php echo $_SESSION['formclient'][NUM_PAGE]["pass1"]; ?>" class="form-control" placeholder="" type="password" name="pass1" id="pass1" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            <div class="row">
                            
                            </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">Confirmer le Mot de passe &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-mail-forward"></i></span>
                                                <input value="<?php echo $_SESSION['formclient'][NUM_PAGE]["pass2"]; ?>" class="form-control" onkeyup="this.value = this.value.toLowerCase();" placeholder="" type="password" name="pass2" id="pass2" />
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

        $('#ajout_utilisateur').bootstrapValidator({
                //        live: 'disabled',
                message: 'Cette valeur est invalide',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nom: {
                        message: 'Nom de l\'utilisateur invalide',
                        validators: {
                            notEmpty: {
                                message: 'Le nom de l\'utilisateur est obligatoire'
                            }
                        }
                    },
                    role: {
                        message: 'Rôle de l\'utilisateur invalide',
                        validators: {
                            notEmpty: {
                                message: 'Le Rôle de l\'utilisateur est obligatoire'
                            }
                        }
                    },
                    login: {
                        message: 'Login de l\'utilisateur invalide',
                        validators: {
                            notEmpty: {
                                message: 'Le login de l\'utilisateur est obligatoire'
                            },
                            remote: {
                                type: 'POST',
                                url: './micropages/Utilisateurs/remoteformvalidation_utilisateur.php',
                                message: 'Le login doit etre unique'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: 'Le login doit contenir seulement les lettres de l\'alphabet, les chiffres, le point and la barre de 8(_)'
                            }
                        }
                    },
                    pass1: {
                        validators: {
                            notEmpty: {
                                message: 'Le mot de passe de l\'utilisateur est obligatoire'
                            },
                            identical: {
                                field: 'pass2'
                            },
                            remote: {
                                type: 'POST',
                                url: './micropages/Utilisateurs/remoteformvalidation_utilisateur.php',
                                message: 'Le mot de passe doit etre unique'
                            }
                        }
                    },
                    pass2: {
                        validators: {
                            identical: {
                                field: 'pass1'
                            }
                        }
                    },
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
                    },
                    ligne: {
                        message: 'cni de l\'utilisateur invalide',
                        validators: {
                            message: 'La ligne doit contenir seulement les chiffres and les lettres de l\'alphabet'
                        }
                    }
                },
                photo: {
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
    //        $('#ajout_utilisateur').bootstrapValidator('validate');
    //    });
    //
    //    $('#resetBtn').click(function() {
    //        $('#ajout_utilisateur').data('bootstrapValidator').resetForm(true);
    //    });
    });
</script>
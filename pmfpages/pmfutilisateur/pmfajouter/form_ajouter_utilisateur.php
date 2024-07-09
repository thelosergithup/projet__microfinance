<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Formulaire d'ajout d'un Utilisateur</h1>
                            </div>
                        </div>
                        <form id="ajout_utilisateur" name="formutilisateur" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfutilisateur/pmfajouter/ajout_utilisateur'); ?>&pagecom=<?php echo NUM_PAGE + 1; ?>" style="padding: 2%;">



                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">Nom &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formutilisateur'][NUM_PAGE]["nom"]; ?>" class="form-control" onkeyup="this.value = this.value.toUpperCase();" placeholder=" " type="text" name="nom" id="nom" />
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
                                                <input value="<?php echo $_SESSION['formutilisateur'][NUM_PAGE]["prenom"]; ?>" class="form-control" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" placeholder="" type="text" name="prenom" id="prenom" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">R&ocirc;le &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

                                                <select class="form-control" name="role" id="role">
                                                    <option value=""> - Choisissez un r&ocirc;le - </option>
                                                    <option value="Directeur Général" <?php if ($_SESSION['formutilisateur'][NUM_PAGE]["role"] == "Directeur Général") { ?> selected <?php } ?>>Directeur Général</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">Login &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input value="<?php echo $_SESSION['formutilisateur'][NUM_PAGE]["login"]; ?>" class="form-control" placeholder="" type="text" name="login" id="login" />
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
                                                <input value="<?php echo $_SESSION['formutilisateur'][NUM_PAGE]["pass1"]; ?>" class="form-control" placeholder="" type="password" name="pass1" id="pass1" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">Confirmer le Mot de passe &nbsp;<g style="color: red">*</g></label>
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-mail-forward"></i></span>
                                                <input value="<?php echo $_SESSION['formutilisateur'][NUM_PAGE]["pass2"]; ?>" class="form-control" placeholder="" type="password" name="pass2" id="pass2" />
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
                                                <label class="control-label">T&eacute;l&eacute;phone&nbsp;</label>
                                                <div class="inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                        <input value="<?php echo $_SESSION['formutilisateur'][NUM_PAGE]["tel"]; ?>" min="9" maxlength="9" class="form-control" placeholder="" type="text" name="tel" id="tel" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label class="control-label">Numero CNI &nbsp;<g style="color: red">*</g></label>
                                                <div class="inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                        <input value="<?php echo $_SESSION['formutilisateur'][NUM_PAGE]["cni"]; ?>" class="form-control" placeholder="" type="text" name="cni" id="cni" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" >Ligne&nbsp;</label>
                                                                                        <div class="inputGroupContainer">
                                                                                            <div class="input-group">
                                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                                <input value="<?php //echo $_SESSION['formutilisateur'][NUM_PAGE]["ligne"];    
                                                                                                                ?>" class="form-control" placeholder="" type="text" name="ligne" id="ligne" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label class="control-label">E-Mail&nbsp;</label>
                                                <div class="inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                        <input value="<?php echo $_SESSION['formutilisateur'][NUM_PAGE]["email"]; ?>" class="form-control" placeholder=" " type="text" name="email" id="email" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label class="control-label">Genre &nbsp;</label>
                                                <div class="inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                        <select class="form-control" name="genre" id="genre">
                                                            <option value=""> - Choisissez un genre - </option>
                                                            <option value="Monsieur" <?php if ($_SESSION['formutilisateur'][NUM_PAGE]["genre"] == "Monsieur") { ?> selected <?php } ?>>Monsieur</option>
                                                            <option value="Madame" <?php if ($_SESSION['formutilisateur'][NUM_PAGE]["genre"] == "Madame") { ?> selected <?php } ?>>Madame</option>
                                                            <option value="Mademoiselle" <?php if ($_SESSION['formutilisateur'][NUM_PAGE]["genre"] == "Mademoiselle") { ?> selected <?php } ?>>Mademoiselle</option>
                                                        </select>
                                                    </div>
                                                </div>
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
                : {
                    message: 'Entête de l\'utilisateur invalide',
                    validators: {
                        notEmpty: {
                            message: 'L\'Entête de l\'utilisateur est obligatoire'
                        }
                    }
                },
                departement: {
                    message: 'Département de l\'utilisateur invalide',
                    validators: {
                        notEmpty: {
                            message: 'Le Département de l\'utilisateur est obligatoire'
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
                            url: './pmfpages/pmfutilisateur/remoteformvalidationutilisateur.php',
                            message: 'Le login doit etre unique'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'Le login doit contenir seulement les lettres de l\'alphabet, les chiffres, le point and la barre de 8(_)'
                        }
                    }
                },
                cni: {
                    message: 'numero de la CNI de l\'utilisateur invalide',
                    validators: {
                        notEmpty: {
                            message: 'Le login de l\'utilisateur est obligatoire'
                        },
                        remote: {
                            type: 'POST',
                            url: './pmfpages/pmfutilisateur/remoteformvalidationutilisateur.php',
                            message: 'Le numero de cni doit etre unique'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9\]+$/,
                            message: 'Le login doit contenir seulement les lettres de l\'alphabet et les chiffres'
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
                            url: './pmfpages/pmfutilisateur/remoteformvalidationutilisateur.php',
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
                    message: 'Ligne de l\'utilisateur invalide',
                    validators: {
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'La Ligne doit contenir seulement les chiffres'
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
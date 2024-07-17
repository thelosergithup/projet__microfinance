
<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Formulaire de modification d'un Utilisateur</h1>
                            </div>
                        </div>
        <form id="edit_utilisateur" name="formutilisateure" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogutilisateur/sotcocogediter/edit_utilisateur'); ?>&idutilisateur=<?php echo $_REQUEST["idutilisateur"]; ?>&pagecom=<?php echo NUM_PAGE + 1; ?>" style="padding: 2%;">

            <input value="<?php echo $_SESSION['formutilisateure'][NUM_PAGE]["idutilisateur"]; ?>" type="hidden" name="idutilisateur" id="idutilisateur" />

            
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        <label class="control-label">Nom &nbsp;<g style="color: red">*</g></label>
                        <div class="inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input value="<?php echo $_SESSION['formutilisateure'][NUM_PAGE]["nome"]; ?>" class="form-control" onkeyup="this.value = this.value.toUpperCase();" placeholder=" " type="text" name="nome" id="nome" />
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
                                <input value="<?php echo $_SESSION['formutilisateure'][NUM_PAGE]["prenome"]; ?>" class="form-control" onkeyup="this.value = this.value.toLowerCase();" style="text-transform: capitalize;" placeholder="" type="text" name="prenome" id="prenome" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group">
                                <label class="control-label" >R&ocirc;le &nbsp;<g style="color: red">*</g></label>
                                <div class="inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

                                        <select class="form-control" name="rolee" id="rolee">
                                            <option value=""> - Choisissez un r&ocirc;le - </option>
                                            <option value="Chef Matériel" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["rolee"] == "Chef Matériel") { ?> selected <?php } ?>>Chef Mat&eacute;riel</option>
                                            <option value="Chef d'Achat" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["rolee"] == "Chef d'Achat") { ?> selected <?php } ?>>Chef d'Achat</option>
                                            <option value="Chef d'Opération" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["rolee"] == "Chef d'Opération") { ?> selected <?php } ?>>Chef d'Op&eacute;ration</option>
                                            <option value="Bureau d'Ordre" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["rolee"] == "Bureau d'Ordre") { ?> selected <?php } ?>>Bureau d'Ordre</option>
                                            <option value="Contrôleur de Dépenses" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["rolee"] == "Contrôleur de Dépenses") { ?> selected <?php } ?>>Contrôleur de D&eacute;penses</option>
                                            <option value="Chef Comptable" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["rolee"] == "Chef Comptable") { ?> selected <?php } ?>>Chef Comptable</option>
                                            <option value="Comptable" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["rolee"] == "Comptable") { ?> selected <?php } ?>>Comptable</option>
                                            <option value="Chef Finance" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["rolee"] == "Chef Finance") { ?> selected <?php } ?>>Chef Finance</option>
                                            <option value="Finance" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["rolee"] == "Finance") { ?> selected <?php } ?>>Finance</option>
                                            <option value="Directeur Administratif et Finance" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["rolee"] == "Directeur Administratif et Finance") { ?> selected <?php } ?>>Directeur Administratif et Finance</option>
                                            <option value="Directeur Général Adjoint" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["rolee"] == "Directeur Général Adjoint") { ?> selected <?php } ?>>Directeur Général Adjoint</option>
                                            <option value="Directeur Général" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["rolee"] == "Directeur Général") { ?> selected <?php } ?>>Directeur Général</option>
                                        </select>
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
                                        <input value="<?php echo $_SESSION['formutilisateure'][NUM_PAGE]["logine"]; ?>" class="form-control" placeholder="" type="text" name="logine" id="logine" />
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group">
                                <label class="control-label" >Mot de passe &nbsp;<g style="color: red">*</g></label>
                                <div class="inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-mail-forward"></i></span>
                                        <input value="<?php echo $_SESSION['formutilisateure'][NUM_PAGE]["pass1e"]; ?>" class="form-control" placeholder="" type="password" name="pass1e" id="pass1e" />
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
                                        <input value="<?php echo $_SESSION['formutilisateure'][NUM_PAGE]["pass2e"]; ?>" class="form-control" placeholder="" type="password" name="pass2e" id="pass2e" />
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
                                <input value="<?php echo $_SESSION['formutilisateure'][NUM_PAGE]["tele"]; ?>" class="form-control" placeholder="" type="text" name="tele" id="tele" />
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label class="control-label" >Ligne&nbsp;</label>
                        <div class="inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input value="<?php echo $_SESSION['formutilisateure'][NUM_PAGE]["lignee"]; ?>" class="form-control" placeholder="" type="text" name="lignee" id="lignee" />
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label class="control-label">E-Mail&nbsp;</label>
                        <div class="inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input value="<?php echo $_SESSION['formutilisateure'][NUM_PAGE]["emaile"]; ?>" class="form-control" placeholder=" " type="text" name="emaile" id="emaile" />
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
                                <select class="form-control" name="genree" id="genree">
                                    <option value=""> - Choisissez un genre - </option>
                                    <option value="Monsieur" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["genree"] == "Monsieur") { ?> selected <?php } ?>>Monsieur</option>
                                    <option value="Madame" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["genree"] == "Madame") { ?> selected <?php } ?>>Madame</option>
                                    <option value="Mademoiselle" <?php if ($_SESSION['formutilisateure'][NUM_PAGE]["genree"] == "Mademoiselle") { ?> selected <?php } ?>>Mademoiselle</option>
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
                            <input type="hidden" name="photostring" value="<?php echo $_SESSION['formutilisateure'][NUM_PAGE]['photostring']; ?>">
                            <img src="sotcocogupload/profil/<?php echo $_SESSION['formutilisateure'][NUM_PAGE]['photostring']; ?>" style="width: 20mm; height: 20mm;">
                            <div class="fileupload-preview thumbnail" style="width: 90px; height: 95px;"></div>
                            <div>
                                <span class="btn btn-file btn-primary"><span class="fileupload-new">Sélectionner une image</span>
                                    <span class="fileupload-exists">Changer</span><input type="file" name="photoe" id="photoe" /></span>
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
    $(document).ready(function () {
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

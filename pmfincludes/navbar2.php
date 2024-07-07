<div class="container-fluid">
    <div class="row">
        <div class="col-md-1 col-lg-1 col-sm-2 col-xs-2">
            <?php
            if (($_SESSION["roleuser"] == "Administrateur") || ($_SESSION["roleuser"] == "Directeur Général Adjoint") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "Directeur Administratif et Finance") || ($_SESSION["roleuser"] == "Chef Finance")) {
                ?><br>
                <div id="dl-menu" class="dl-menuwrapper">
                    <button class="dl-trigger">Menu</button>
                    <ul class="dl-menu">
                        <li>
                            <a href="#">Paramètre</a>
                            <ul class="dl-submenu">
                                <li>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogparametre/sotcocoglangue/lister_langue'); ?>">Langue</a>
                                </li>
                                <li>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogparametre/sotcocogdevise/lister_devise'); ?>">D&eacute;vise</a>
                                </li>
                                <li>
                                    <a href="#">
                                        Pays
                                    </a>
                                    <ul class="dl-submenu">
                                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogparametre/sotcocogpays/lister_pays'); ?>">Pays</a></li>
                                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogparametre/sotcocogville/lister_ville'); ?>">Ville</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        Entreprise
                                    </a>
                                    <ul class="dl-submenu">
                                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogparametre/sotcocogentreprise/lister_entreprise'); ?>">Entreprise</a></li>
                                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogparametre/sotcocogentete/lister_entete'); ?>">Entête</a></li>
                                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogparametre/sotcocogdepartement/lister_departement'); ?>">D&eacute;partement</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#">
                                        Banque
                                    </a>
                                    <ul class="dl-submenu">
                                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogparametre/sotcocogbanque/lister_banque'); ?>">Banque</a></li>
                                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogparametre/sotcocogcomptebancaire/lister_comptebancaire'); ?>">Compte Bancaire</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogparametre/sotcocogtypefournisseur/lister_typefournisseur'); ?>">Type Fourniseur</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /dl-menuwrapper -->
                <?php
            }
            ?>
        </div>
        
    </div>
</div>
<div class="header-top-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="header-top-menu tabl-d-n">
                    <ul class="nav navbar-nav mai-top-nav ">
                        <li class="nav-item"><a href="<?= $url; ?>"  class="nav-link area" style="padding-left: 5px; padding-right: 5px;" >Accueil</a></li>
                        <?php
                        if (($_SESSION["roleuser"] == "Administrateur") || ($_SESSION["roleuser"] == "Directeur Général Adjoint") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "Directeur Administratif et Finance") || ($_SESSION["roleuser"] == "Chef Finance")) {
                            ?>
                            <li class="nav-item"><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogutilisateur/lister_utilisateur'); ?>" class="nav-link area" style="padding-left: 5px; padding-right: 5px;"  >Utilisateur</a>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if (($_SESSION["roleuser"] == "Administrateur") || ($_SESSION["roleuser"] == "Directeur Général Adjoint") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "Directeur Administratif et Finance") || ($_SESSION["roleuser"] == "Chef Finance")) {
                            ?>
                            <li class="nav-item"><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogfournisseur/lister_fournisseur'); ?>" class="nav-link" style="padding-left: 5px; padding-right: 5px;">Fournisseur</a>
                            </li>

                            <?php
                        }
                        ?>
                        <?php
                        if (($_SESSION["roleuser"] != "Chef Matériel") && ($_SESSION["roleuser"] != "Chef d'Achat") && ($_SESSION["roleuser"] != "Chef d'Opération")) {
                            ?>
                            <li class="nav-item"><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogprojet/lister_projet'); ?>" class="nav-link" style="padding-left: 5px; padding-right: 5px;" >Projet</a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" style="padding-left: 5px; padding-right: 5px;"  >Courrier <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                            <div role="menu" class="dropdown-menu animated zoomIn">
                                <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogcourrier/lister_courrier'); ?>" class="dropdown-item">Gestion des courriers</a>
                                <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogcourrier/courrier_archive_form'); ?>" class="dropdown-item">Courriers archiv&eacute;s</a>

                            </div>
                        </li>
                        <?php
                        if (($_SESSION["roleuser"] != "Chef Matériel") && ($_SESSION["roleuser"] != "Chef d'Achat") && ($_SESSION["roleuser"] != "Chef d'Opération") && ($_SESSION["roleuser"] != "Bureau d'Ordre") && ($_SESSION["roleuser"] != "Contrôleur de Dépenses")) {
                            ?>
                            <li class="nav-item">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" style="padding-left: 5px; padding-right: 5px;">Etat de paiement <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                <div role="menu" class="dropdown-menu animated zoomIn">
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogetatpaiement/lister_etatpaiement'); ?>" class="dropdown-item">Gestion des &eacute;tats de paiement</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogetatpaiement/etatpaiement_paye_form'); ?>" class="dropdown-item">Engagement Tiers</a>

                                </div>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="nav-item"><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogmemo/lister_memo'); ?>" class="nav-link" style="padding-left: 5px; padding-right: 5px;" >Memo</a>
                        </li>
                        <?php
                        if (($_SESSION["roleuser"] == "Administrateur") || ($_SESSION["roleuser"] == "Directeur Général Adjoint") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "Directeur Administratif et Finance") || ($_SESSION["roleuser"] == "Chef Finance")) {
                            ?>
                            <li class="nav-item"><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogcharge/lister_charge'); ?>" class="nav-link" style="padding-left: 5px; padding-right: 5px;" >Charges</a>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if (($_SESSION["roleuser"] == "Administrateur") || ($_SESSION["roleuser"] == "Directeur Général Adjoint") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "Directeur Administratif et Finance")) {
                            ?>
                            <li class="nav-item"><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogdecompte/lister_decompte'); ?>" class="nav-link" style="padding-left: 5px; padding-right: 5px;" >Décompte</a>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if (($_SESSION["roleuser"] != "Chef Matériel") && ($_SESSION["roleuser"] != "Chef d'Achat") && ($_SESSION["roleuser"] != "Chef d'Opération") && ($_SESSION["roleuser"] != "Bureau d'Ordre") && ($_SESSION["roleuser"] != "Contrôleur de Dépenses") && ($_SESSION["roleuser"] != "Comptable") && ($_SESSION["roleuser"] != "Chef Comptable")) {
                            $annee = date('Y');
                            ?>
                            <li class="nav-item">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" style="padding-left: 5px; padding-right: 5px;" >Budget <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                <div role="menu" class="dropdown-menu animated zoomIn">
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogtrimestre/lister_trimestre'); ?>" class="dropdown-item">Trimestre</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogencaissement/lister_encaissement'); ?>" class="dropdown-item">Encaissement</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/lister_budget'); ?>" class="dropdown-item">Tr&eacute;sorerie</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/afficher_budget_annee'); ?>&annee=<?php echo $annee; ?>" class="dropdown-item">Budget Annuel</a>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if (($_SESSION["roleuser"] == "Administrateur") || ($_SESSION["roleuser"] == "Directeur Général Adjoint") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "Directeur Administratif et Finance") || ($_SESSION["roleuser"] == "Chef Finance")) {
                            $mois1 = "Janvier";
                            $mois2 = "Février";
                            $mois3 = "Mars";
                            $mois4 = "Avril";
                            $mois5 = "Mai";
                            $mois6 = "Juin";
                            $mois7 = "Juillet";
                            $mois8 = "Août";
                            $mois9 = "Septembre";
                            $mois10 = "Octobre";
                            $mois11 = "Novembre";
                            $mois12 = "Décembre";
                            $year = date('Y');
                            ?>
                            <li class="nav-item">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" style="padding-left: 5px; padding-right: 5px;" >Liquidation <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                <div role="menu" class="dropdown-menu animated zoomIn">

                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois1; ?>&annee=<?php echo $year; ?>">Janvier</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois2; ?>&annee=<?php echo $year; ?>">F&eacute;vrier</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois3; ?>&annee=<?php echo $year; ?>">Mars</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois4; ?>&annee=<?php echo $year; ?>">Avril</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois5; ?>&annee=<?php echo $year; ?>">Mai</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois6; ?>&annee=<?php echo $year; ?>">Juin</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois7; ?>&annee=<?php echo $year; ?>">Juillet</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois8; ?>&annee=<?php echo $year; ?>">Ao&ucirc;t</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois9; ?>&annee=<?php echo $year; ?>">Septembre</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois10; ?>&annee=<?php echo $year; ?>">Octobre</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois11; ?>&annee=<?php echo $year; ?>">Novembre</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois12; ?>&annee=<?php echo $year; ?>">D&eacute;cembre</a>

                                </div>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if (($_SESSION["roleuser"] == "Administrateur") || ($_SESSION["roleuser"] == "Directeur Général Adjoint") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "Directeur Administratif et Finance") || ($_SESSION["roleuser"] == "Chef Finance")) {
                            ?>
                            <li class="nav-item">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"  class="nav-link dropdown-toggle" style="padding-left: 5px; padding-right: 5px;">Statistique<span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                <div role="menu" class="dropdown-menu animated zoomIn">
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogfournisseur/historiquefournisseur/lister_fournisseur'); ?>" class="dropdown-item">Historique de fournisseurs</a>
                                    <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogstatistique/statistique_form'); ?>" class="dropdown-item">Statistique annuel</a>

                                </div>
                            </li>

                            <?php
                        }
                        ?>

                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" style="padding-left: 5px; padding-right: 5px;">                      
                                <span class="fa fa-user">
                                    <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                </span>
                            </a>
                            <div role="menu" class="dropdown-menu animated zoomIn">                                           
                                <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogutilisateur/info_user'); ?>" class="edu-icon edu-user-rounded author-log-ic">Mon Profil</a>
                                <a href="javascript:deconnexion();">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> 
                                    D&eacute;connexion
                                </a>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="index.html">Dashboard v.1</a></li>
                                    <li><a href="index-1.html">Dashboard v.2</a></li>
                                    <li><a href="index-3.html">Dashboard v.3</a></li>
                                    <li><a href="analytics.html">Analytics</a></li>
                                    <li><a href="widgets.html">Widgets</a></li>
                                </ul>
                            </li>
                            <li><a href="events.html">Event</a></li>
                            <li><a data-toggle="collapse" data-target="#demoevent" href="#">Professors <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="demoevent" class="collapse dropdown-header-top">
                                    <li><a href="all-professors.html">All Professors</a>
                                    </li>
                                    <li><a href="add-professor.html">Add Professor</a>
                                    </li>
                                    <li><a href="edit-professor.html">Edit Professor</a>
                                    </li>
                                    <li><a href="professor-profile.html">Professor Profile</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demopro" href="#">Students <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="demopro" class="collapse dropdown-header-top">
                                    <li><a href="all-students.html">All Students</a>
                                    </li>
                                    <li><a href="add-student.html">Add Student</a>
                                    </li>
                                    <li><a href="edit-student.html">Edit Student</a>
                                    </li>
                                    <li><a href="student-profile.html">Student Profile</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#democrou" href="#">Courses <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="democrou" class="collapse dropdown-header-top">
                                    <li><a href="all-courses.html">All Courses</a>
                                    </li>
                                    <li><a href="add-course.html">Add Course</a>
                                    </li>
                                    <li><a href="edit-course.html">Edit Course</a>
                                    </li>
                                    <li><a href="course-profile.html">Courses Info</a>
                                    </li>
                                    <li><a href="course-payment.html">Courses Payment</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demolibra" href="#">Library <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="demolibra" class="collapse dropdown-header-top">
                                    <li><a href="library-assets.html">Library Assets</a>
                                    </li>
                                    <li><a href="add-library-assets.html">Add Library Asset</a>
                                    </li>
                                    <li><a href="edit-library-assets.html">Edit Library Asset</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demodepart" href="#">Departments <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="demodepart" class="collapse dropdown-header-top">
                                    <li><a href="departments.html">Departments List</a>
                                    </li>
                                    <li><a href="add-department.html">Add Departments</a>
                                    </li>
                                    <li><a href="edit-department.html">Edit Departments</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="demo" class="collapse dropdown-header-top">
                                    <li><a href="mailbox.html">Inbox</a>
                                    </li>
                                    <li><a href="mailbox-view.html">View Mail</a>
                                    </li>
                                    <li><a href="mailbox-compose.html">Compose Mail</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                    <li><a href="google-map.html">Google Map</a>
                                    </li>
                                    <li><a href="data-maps.html">Data Maps</a>
                                    </li>
                                    <li><a href="pdf-viewer.html">Pdf Viewer</a>
                                    </li>
                                    <li><a href="x-editable.html">X-Editable</a>
                                    </li>
                                    <li><a href="code-editor.html">Code Editor</a>
                                    </li>
                                    <li><a href="tree-view.html">Tree View</a>
                                    </li>
                                    <li><a href="preloader.html">Preloader</a>
                                    </li>
                                    <li><a href="images-cropper.html">Images Cropper</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="Chartsmob" class="collapse dropdown-header-top">
                                    <li><a href="bar-charts.html">Bar Charts</a>
                                    </li>
                                    <li><a href="line-charts.html">Line Charts</a>
                                    </li>
                                    <li><a href="area-charts.html">Area Charts</a>
                                    </li>
                                    <li><a href="rounded-chart.html">Rounded Charts</a>
                                    </li>
                                    <li><a href="c3.html">C3 Charts</a>
                                    </li>
                                    <li><a href="sparkline.html">Sparkline Charts</a>
                                    </li>
                                    <li><a href="peity.html">Peity Charts</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="Tablesmob" class="collapse dropdown-header-top">
                                    <li><a href="static-table.html">Static Table</a>
                                    </li>
                                    <li><a href="data-table.html">Data Table</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="formsmob" class="collapse dropdown-header-top">
                                    <li><a href="basic-form-element.html">Basic Form Elements</a>
                                    </li>
                                    <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                    </li>
                                    <li><a href="password-meter.html">Password Meter</a>
                                    </li>
                                    <li><a href="multi-upload.html">Multi Upload</a>
                                    </li>
                                    <li><a href="tinymc.html">Text Editor</a>
                                    </li>
                                    <li><a href="dual-list-box.html">Dual List Box</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">App views <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                    <li><a href="basic-form-element.html">Basic Form Elements</a>
                                    </li>
                                    <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                    </li>
                                    <li><a href="password-meter.html">Password Meter</a>
                                    </li>
                                    <li><a href="multi-upload.html">Multi Upload</a>
                                    </li>
                                    <li><a href="tinymc.html">Text Editor</a>
                                    </li>
                                    <li><a href="dual-list-box.html">Dual List Box</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="Pagemob" class="collapse dropdown-header-top">
                                    <li><a href="login.html">Login</a>
                                    </li>
                                    <li><a href="register.html">Register</a>
                                    </li>
                                    <li><a href="lock.html">Lock</a>
                                    </li>
                                    <li><a href="password-recovery.html">Password Recovery</a>
                                    </li>
                                    <li><a href="404.html">404 Page</a></li>
                                    <li><a href="500.html">500 Page</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->
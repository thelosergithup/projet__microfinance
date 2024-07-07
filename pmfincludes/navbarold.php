
<nav class="navbar navbar-custom navbar-fixed-top " >

    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--<a class="navbar-brand" href="#">CORE</a>-->
            <?php
            if (($_SESSION["roleuser"] == "Administrateur") || ($_SESSION["roleuser"] == "Directeur Général Adjoint") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "Directeur Administratif et Finance") || ($_SESSION["roleuser"] == "Chef Finance")) {
                ?>
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
            <?php
            ?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?= $url; ?>"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Accueil</a></li>
                <?php
                if (($_SESSION["roleuser"] == "Administrateur") || ($_SESSION["roleuser"] == "Directeur Général Adjoint") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "Directeur Administratif et Finance") || ($_SESSION["roleuser"] == "Chef Finance")) {
                    ?>
                    <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogutilisateur/lister_utilisateur'); ?>"> Utilisateur</a></li>
                    <?php
                }
                if (($_SESSION["roleuser"] != "Chef Matériel") && ($_SESSION["roleuser"] != "Chef d'Achat") && ($_SESSION["roleuser"] != "Chef d'Opération")) {
                    ?>
                    <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogfournisseur/lister_fournisseur'); ?>"> Fournisseur</a></li>
                    <?php
                }
                if (($_SESSION["roleuser"] != "Chef Matériel") && ($_SESSION["roleuser"] != "Chef d'Achat") && ($_SESSION["roleuser"] != "Chef d'Opération")) {
                    ?>
                    <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogprojet/lister_projet'); ?>"> Projet</a></li>
                    <?php
                }
                ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Courrier <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogcourrier/lister_courrier'); ?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Gestion des courriers</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogcourrier/courrier_archive_form'); ?>"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Courriers archiv&eacute;s</a></li>
                    </ul>
                </li>
                <?php
                if (($_SESSION["roleuser"] != "Chef Matériel") && ($_SESSION["roleuser"] != "Chef d'Achat") && ($_SESSION["roleuser"] != "Chef d'Opération") && ($_SESSION["roleuser"] != "Bureau d'Ordre") && ($_SESSION["roleuser"] != "Contrôleur de Dépenses")) {
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Etat de paiement <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogetatpaiement/lister_etatpaiement'); ?>">Gestion des &eacute;tats de paiement</a></li>
                            <li role="separator" class="divider"></li>
                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogetatpaiement/etatpaiement_paye_form'); ?>"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Engagement Tiers</a></li>
                    </ul>
                    </li>
                    <?php
                }
                ?>
                    
                    <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogmemo/lister_memo'); ?>"> Memo</a></li>
                    
                    <?php
                if (($_SESSION["roleuser"] == "Administrateur") || ($_SESSION["roleuser"] == "Directeur Général Adjoint") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "Directeur Administratif et Finance") || ($_SESSION["roleuser"] == "Chef Finance")) {
                    ?>
                    <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogcharge/lister_charge'); ?>"> Charge</a></li>
                    <?php
                }
                ?>
                    <?php
                if (($_SESSION["roleuser"] == "Administrateur") || ($_SESSION["roleuser"] == "Directeur Général Adjoint") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "Directeur Administratif et Finance")) {
                    ?>
                    <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogdecompte/lister_decompte'); ?>"> D&eacute;compte</a></li>
                    <?php
                }
                ?>
                <?php
                if (($_SESSION["roleuser"] != "Chef Matériel") && ($_SESSION["roleuser"] != "Chef d'Achat") && ($_SESSION["roleuser"] != "Chef d'Opération") && ($_SESSION["roleuser"] != "Bureau d'Ordre") && ($_SESSION["roleuser"] != "Contrôleur de Dépenses") && ($_SESSION["roleuser"] != "Comptable") && ($_SESSION["roleuser"] != "Chef Comptable")) {
                    $annee=date('Y');
					?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Budget <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogtrimestre/lister_trimestre'); ?>">Trimestre</a></li>
                            <!--<li><a href="#">Decaissement</a></li>-->
                            <li role="separator" class="divider"></li>
                                                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogencaissement/lister_encaissement'); ?>">Encaissement</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/lister_budget'); ?>">Tr&eacute;sorerie</a></li>
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/afficher_budget_annee'); ?>&annee=<?php echo $annee; ?>">Budget Annuel</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
                <?php
                if (($_SESSION["roleuser"] == "Administrateur") || ($_SESSION["roleuser"] == "Directeur Général Adjoint") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "Directeur Administratif et Finance") || ($_SESSION["roleuser"] == "Chef Finance")) {
                    $mois1="Janvier";
                    $mois2="Février";
                    $mois3="Mars";
                    $mois4="Avril";
                    $mois5="Mai";
                    $mois6="Juin";
                    $mois7="Juillet";
                    $mois8="Août";
                    $mois9="Septembre";
                    $mois10="Octobre";
                    $mois11="Novembre";
                    $mois12="Décembre";
                    $year=date('Y');
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Liquidation <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois1; ?>&annee=<?php echo $year; ?>">Janvier</a></li>
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois2; ?>&annee=<?php echo $year; ?>">F&eacute;vrier</a></li>
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois3; ?>&annee=<?php echo $year; ?>">Mars</a></li>
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois4; ?>&annee=<?php echo $year; ?>">Avril</a></li>
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois5; ?>&annee=<?php echo $year; ?>">Mai</a></li>
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois6; ?>&annee=<?php echo $year; ?>">Juin</a></li>
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois7; ?>&annee=<?php echo $year; ?>">Juillet</a></li>
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois8; ?>&annee=<?php echo $year; ?>">Ao&ucirc;t</a></li>
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois9; ?>&annee=<?php echo $year; ?>">Septembre</a></li>
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois10; ?>&annee=<?php echo $year; ?>">Octobre</a></li>
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois11; ?>&annee=<?php echo $year; ?>">Novembre</a></li>
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogbudget/sotcocogpositionnement/afficher_positionnement'); ?>&mois=<?php echo $mois12; ?>&annee=<?php echo $year; ?>">D&eacute;cembre</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
                    <?php
                if (($_SESSION["roleuser"] == "Administrateur") || ($_SESSION["roleuser"] == "Directeur Général Adjoint") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "Directeur Administratif et Finance") || ($_SESSION["roleuser"] == "Chef Finance")) {
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Statistique <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogfournisseur/historiquefournisseur/lister_fournisseur'); ?>">Historique de fournisseurs</a></li>
                    <li role="separator" class="divider"></li>
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogstatistique/statistique_form'); ?>">Statistique annuel</a></li>
                    </ul>
                    </li>
                        <?php
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION["prenomuser"]; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= $url; ?>?page=<?php echo base64_encode('sotcocogpages/sotcocogutilisateur/info_user'); ?>" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Mon profil</a>
                        </li>
                        <li>
                            <a href="javascript:deconnexion();">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> 
                                D&eacute;connexion
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

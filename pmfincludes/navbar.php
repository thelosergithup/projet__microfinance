<div class="container-fluid">
    <div class="row">
        <div class="col-md-1 col-lg-1 col-sm-2 col-xs-2">
            <?php
            if (($_SESSION["roleuser"] == "administrateur")) {
            ?><br>
                <div id="dl-menu" class="dl-menuwrapper">
                    <button class="dl-trigger">Menu</button>
                    <ul class="dl-menu">
                        <li>
                            <a href="#">Paramètre</a>
                            <ul class="dl-submenu">

                                <li>
                                    <a href="#">
                                        typecompte
                                    </a>
                                    <ul class="dl-submenu">
                                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmftypecompte/lister_typecompte'); ?>">typecompte</a></li>
                                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/lister_compte'); ?>">compte</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div><!-- /dl-menuwrapper -->
            <?php
            } else {
            ?>
                &nbsp;<br>
            <?php
            }
            ?>
        </div>

    </div>
</div>
<div class="container-fluid">
    <?php //include('./pmfincludes/sidebar.php'); 
    ?>
</div>
<div class="header-top-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <div class="header-top-menu tabl-d-n">
                    <ul class="nav navbar-nav mai-top-nav ">
                        <li class="nav-item"><a href="<?= $url; ?>" class="nav-link area" style="padding-left: 5px; padding-right: 5px;">Accueil</a></li>
                        <?php
                        if (($_SESSION["roleuser"] == "administrateur")) {
                        ?>
                            <li class="nav-item"><a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfutilisateur/lister_utilisateur'); ?>" class="nav-link area" style="padding-left: 5px; padding-right: 5px;">Utilisateur</a>
                            <li class="nav-item"><a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/lister_compte'); ?>" class="nav-link area" style="padding-left: 5px; padding-right: 5px;">Comptes</a>
                            </li>


                            <li class="dropdown  ">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">transaction <b class="caret"></b></a>
                                <ul class="dropdown-menu animated zoomIn">

                                    <!--  <li><a href="pmfpages/pmftransaction/pmfdepot/form_depot">depot</a></li> -->
                                    <li class=""><a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmftransaction/pmfdepot/form_depot'); ?>" class="nav-link area" style="padding-left: 5px; padding-right: 5px;">depot</a>
                                    <li class="divider"></li>
                                    <li class=""><a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmftransaction/pmfretrait/form_retrait'); ?>" class="nav-link area" style="padding-left: 5px; padding-right: 5px;">retrait</a>
                                    <li class="divider"></li>
                                    <li class=""><a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmftransaction/pmftransfert/form_transfert'); ?>" class="nav-link area" style="padding-left: 5px; padding-right: 5px;">transfert</a>

                                    <li class="divider"></li>
                                    <li class=""><a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfpret/demande_pret'); ?>" class="nav-link area" style="padding-left: 5px; padding-right: 5px;">demande pret</a>
                                    <li class="divider"></li>
                                    <li class=""><a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfpret/calendrier_remboursement'); ?>" class="nav-link area" style="padding-left: 5px; padding-right: 5px;">calendrier de remboursement</a>

                                </ul>
                            </li>
                        <?php }
                        ?>


                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="header-right-info">
                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                <img src="pmfupload/profil/<?php echo $_SESSION["photouser"]; ?>" alt="" />
                                <span class="admin-name"><?php echo $_SESSION["nomuser"]; ?></span>
                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>

                            </a>
                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                <li><a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfutilisateur/info_user'); ?>"><span class="edu-icon edu-user-rounded author-log-ic"></span>Mon Profil</a>
                                </li>
                                <li><a href="javascript:deconnexion();"><span class="edu-icon edu-locked author-log-ic"></span>D&eacute;connexion</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu start -->
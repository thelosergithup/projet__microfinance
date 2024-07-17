<div class="row">
    <div class="col-sm-6">
        <?php include './pmfincludes/sidebar.php' ; ?>

    </div>
</div>    
<div class="row">
    <div class="col-sm-6">
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-10">
                        <div class="header-top-menu tabl-d-n">
                            <ul class="nav navbar-nav mai-top-nav ">
                                <?php
                                if (($_SESSION["roleuser"] == "administrateur")) {
                                ?>
                                    </li>



                                <?php }
                                ?>
                            <li class="nav-item"><a href="<?= $url; ?>" class="nav-link area" style="padding-left: 200px; padding-right: 40px;">Accueil</a></li>
<!--                             <li class="nav-item"><a href="<?= $url; ?>" class="nav-link area" href="" style="padding-left: 200px; padding-right: 40px;">A propos</a></li>
 -->                            <li><a title="Login" href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/a_propos'); ?>"><i class="" aria-hidden="true"></i><span class="mini-sub-pro">A propos</span></a></li>


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
    </div>
</div>
<!-- Mobile Menu start -->
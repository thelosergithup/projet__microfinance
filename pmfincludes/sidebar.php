<nav id="sidebar" class="">
    <div class="sidebar-header">
<!--                    <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
        <strong><a href="index.html"><img src="img/logo/logosn.png" alt="" /></a></strong>-->
    </div>
    <div class="left-custom-menu-adp-wrap comment-scrollbar">
        <nav class="sidebar-nav left-sidebar-menu-pro">
            <ul class="metismenu" id="menu1">
                <!--<li class="active">-->
                <li>
                    <a class="has-arrow" href="<?= $url; ?>" aria-expanded="true">
                        <i class="fa big-icon fa-home icon-wrap"></i>
                        <span class="mini-click-non">Param&egrave;tre</span>
                    </a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('#'); ?>"><i class="fa fa-language sub-icon-mg" aria-hidden="true"  title="Langue"></i> <span class="mini-sub-pro">Langue</span></a></li>
                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('#'); ?>"><i class="fa fa-money sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Devise</span></a></li>
                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('#'); ?>"><i class="fa fa-home sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Region</span></a></li>
                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('#'); ?>"><i class="fa fa-home sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Ville</span></a></li>
                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('#'); ?>"><i class="fa fa-home sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Partenaires</span></a></li>
                    </ul>
                </li>
                <?php
                if (($_SESSION["roleuser"] == "administrateur") || ($_SESSION["roleuser"] == "Directeur Général")) {
                    ?>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false">
                            <i class="fa big-icon fa-buysellads icon-wrap"></i> 
                            <span class="mini-click-non">Compte</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="" href="<?= $url; ?>?page=<?php echo base64_encode('#'); ?>"><i class="fa fa-mercury sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">cr&eacute;er un compte client</span></a></li>
                            <li><a title="" href="<?= $url; ?>?page=<?php echo base64_encode('#'); ?>"><i class="fa fa-paypal sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">consulter les comptes</span></a></li>
                        </ul>
                    </li>
                    <?php
                }
                
                if (($_SESSION["roleuser"] == "administrateur") ||($_SESSION["roleuser"] == "Directeur Général")) {
                    ?>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false">
                            <i class="fa big-icon fa-opera icon-wrap"></i> 
                            <span class="mini-click-non">Op&eacute;ration</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="" href="<?= $url; ?>?page=<?php echo base64_encode('#'); ?>"><i class="fa fa-users sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">D&eacute;pot</span></a></li>
                            <li><a title="" href="<?= $url; ?>?page=<?php echo base64_encode('#'); ?>"><i class="fa fa-users sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Retrait</span></a></li>

                        </ul>
                    </li>
                    <?php
                }
                
                if (($_SESSION["roleuser"] == "administrateur") || ($_SESSION["roleuser"] == "Directeur Général")) {
                    ?>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false">
                            <i class="fa big-icon fa-user icon-wrap"></i> 
                            <span class="mini-click-non">Utilisateur</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Login" href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfutilisateur/lister_utilisateur'); ?>"><i class="fa fa-user-circle sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">lister les Utilisateur</span></a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </nav>
    </div>
</nav>
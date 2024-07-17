<nav id="sidebar" class="" style="background-color: teal;">
    <div class="sidebar-header">
<!--                    <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
        <strong><a href="index.html"><img src="img/logo/logosn.png" alt="" /></a></strong>-->
    </div>
    <div class="left-custom-menu-adp-wrap comment-scrollbar">
        <nav class="sidebar-nav left-sidebar-menu-pro">
            <ul class="metismenu" id="menu1">
                <!--<li class="active">-->
                <li>
                    <a class="has-arrow" href="<?= $url; ?>" aria-expanded="true"  style="background-color: teal; color: white;">
                        <i class="fa big-icon fa-home icon-wrap"></i>
                        <span class="mini-click-non">Param&egrave;tre</span>
                    </a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmftypecompte/lister_typecompte'); ?>"><i class="fa fa-language sub-icon-mg" aria-hidden="true"  title="Langue"></i> <span class="mini-sub-pro">Types de Comptes</span></a></li>
                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('micropages/microagence/lister_agence'); ?>"><i class="fa fa-money sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Agences</span></a></li>
                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('micropages/microagence/lister_region'); ?>"><i class="fa fa-home sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Region</span></a></li>
                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('micropages/microagence/lister_ville'); ?>"><i class="fa fa-home sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Ville</span></a></li>
                        <li><a href="<?= $url; ?>?page=<?php echo base64_encode('#'); ?>"><i class="fa fa-home sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Partenaires</span></a></li>
                    </ul>
                </li>
                <?php
                if (($_SESSION["roleuser"] == "administrateur") || ($_SESSION["roleuser"] == "Directeur Général")) {
                    ?>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false" style="background-color: teal; color: white;">
                            <i class="fa big-icon fa-buysellads icon-wrap"></i> 
                            <span class="mini-click-non">Compte</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">

                            <li><a title="" href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/lister_compte'); ?>"><i class="fa fa-list sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">consulter les comptes</span></a></li>
                            <?php
                            if (($_SESSION["roleuser"] == "administrateur") ||  ($_SESSION["roleuser"] == "Directeur Général")||  ($_SESSION["roleuser"] == "Agent de pret") ) {
                                ?>
                                
                                <li><a title="" href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfparametre/pmfcompte/pmfajouter/ajout_compte'); ?>"><i class="fa fa-plus sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">cr&eacute;er un compte client</span></a></li>
                                
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                }
                
                if (($_SESSION["roleuser"] == "administrateur") ||($_SESSION["roleuser"] == "Directeur Général")) {
                    ?>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false" style="background-color: teal; color: white;">
                            <i class="fa big-icon fa-opera icon-wrap"></i> 
                            <span class="mini-click-non">Op&eacute;ration</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="" href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmftransaction/pmfdepot/form_depot'); ?>"><i class="fa fa-download sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">D&eacute;pot</span></a></li>
                            <li><a title="" href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmftransaction/pmfretrait/form_retrait'); ?>"><i class="fa fa-upload sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Retrait</span></a></li>
                            <li><a title="" href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmftransaction/pmftransfert/form_transfert'); ?>"><i class="fa fa-exchange sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Transfert</span></a></li>

                            
                        </ul>
                    </li>
                    <?php
                }
                
                if (($_SESSION["roleuser"] == "administrateur") || ($_SESSION["roleuser"] == "Directeur Général")) {
                    ?>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false" style="background-color: teal; color: white;">
                            <i class="fa big-icon fa-user icon-wrap"></i> 
                            <span class="mini-click-non">Utilisateur</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Login" href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfutilisateur/lister_utilisateur'); ?>"><i class="fa fa-list sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">lister les Utilisateur</span></a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
<?php
                if (($_SESSION["roleuser"] == "client") || ($_SESSION["roleuser"] == "Gestionnaire")|| ($_SESSION["roleuser"] == "administrateur")) {
                    ?>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false" style="background-color: teal; color: white;">
                            <i class="fa big-icon fa-user icon-wrap"></i> 
                            <span class="mini-click-non">clients</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Login" href="<?= $url; ?>?page=<?php echo base64_encode('micropages/microclient/lister_client'); ?>"><i class="fa fa-list sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">liste des clients</span></a></li>
                            
                            <li><a href="<?= $url; ?>?page=<?php echo base64_encode('micropages/microclient/editer_client/edit_client'); ?>&idclient=<?php echo $recuser["idclient"]; ?>">
                                <span title="Modifier cette client" alt="editer"><i class="glyphicon glyphicon-edit"></i> Modifier</span>
                            </a></li>
                            
                            <!-- <li></li><a href='<?= $url; ?>?page=<?php// echo base64_encode('micropages/microclient/client_ajax'); ?>&idclient=<?php// echo $recuser["idclient"]; ?>&supprimer=supprimer' onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Supprimer ce client ?'));">
                                <span title="Supprimer ce client " alt="suppr"> <i class="glyphicon glyphicon-trash"></i> </span>
                            </a></li> -->
                        
                        </ul>
                    </li>
                    <?php
                }
                ?>
                <?php
                if (($_SESSION["roleuser"] == "client") || ($_SESSION["roleuser"] == "Gestionnaire")|| ($_SESSION["roleuser"] == "administrateur")) {
                    ?>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false" style="background-color: teal; color: white;">
                            <i class="fa big-icon  fa-credit-card icon-wrap"></i> 
                            <span class="mini-click-non">prets</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Login" href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfpret/pmfdemandepret/pmfajouter/form_demande'); ?>"><i class="fa fa-list sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">demande de pret</span></a></li>
                            <li><a title="Login" href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfpret/pmfdemandepret/pmfajouter/form_demande'); ?>"><i class="fa fa-file-text sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">liste des demandes</span></a></li>
                            <li><a title="Login" href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfpret/pmfdemandepret/pmfajouter/form_demande'); ?>"><i class="fa fa-money sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">liste des prets</span></a></li>

                        </ul>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </nav>
    </div>
</nav>
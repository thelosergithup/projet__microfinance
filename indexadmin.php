<?php
session_start();
ob_start();

include('pmfconnexion/connexion.php');
include('./pmfincludes/fonctionglobale.php');

include './pmfincludes/get_url.php';
include 'pmfsms/envoyersmsbon.php';
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AGENCE MICRO FINANCE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
                    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="pmfupload/logo/logo.png">


    <!-- Bootstrap CSS
                    ============================================ -->
    <link rel="stylesheet" href="pmfcss/bootstrap.min.css">

    <!-- menu -->
    <link href="pmfplugin/menu/css/component.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap CSS
                    ============================================ -->
    <link rel="stylesheet" href="pmfcss/font-awesome.min.css">
    <!-- owl.carousel CSS
                    ============================================ -->

    <!-- animate CSS
                    ============================================ -->
    <link rel="stylesheet" href="pmfcss/animate.css">
    <!-- normalize CSS
                    ============================================ -->
    <link rel="stylesheet" href="pmfcss/normalize.css">
    <!-- meanmenu icon CSS
                    ============================================ -->
    <link rel="stylesheet" href="pmfcss/meanmenu.min.css">
    <!-- main CSS
                    ============================================ -->
    <link rel="stylesheet" href="pmfcss/main.css">
    <!-- educate icon CSS
                    ============================================ -->
    <link rel="stylesheet" href="pmfcss/educate-custon-icon.css">
    <!-- morrisjs CSS
                    ============================================ -->
    <link rel="stylesheet" href="pmfcss/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
                    ============================================ -->
    <link rel="stylesheet" href="pmfcss/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
                    ============================================ -->
    <link rel="stylesheet" href="pmfcss/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="pmfcss/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
                    ============================================ -->
    <link rel="stylesheet" href="pmfcss/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="pmfcss/calendar/fullcalendar.print.min.css">

    <!-- normalize CSS
                    ============================================ -->
    <link rel="stylesheet" href="pmfcss/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="pmfcss/data-table/bootstrap-editable.css">
    <!-- style CSS
                    ============================================ -->

    <link rel="stylesheet" href="pmfcss/responsive.css">

    <link rel="stylesheet" href="style.css">
    <!-- jquery
                    ============================================ -->
    <script src="pmfjs/vendor/jquery-1.12.4.min.js"></script>
    <!-- modernizr JS
                    ============================================ -->
    <script src="pmfjs/vendor/modernizr-2.8.3.min.js"></script>


    <!-- validation des formulaires -->
    <link href="pmfplugin/bootstrapvalidator/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css" />
    <link type="text/css" rel="stylesheet" href="pmfcss/bootstrap-fileupload.min.css" /><!--pour la confirmation des fichier et images-->

    <!--Pour previsualiser les images du dossier-->
    <script src="pmfjs/jquery.imagebox.js"></script>

    <!-- les dates -->
    <link rel="stylesheet" href="pmfplugin/datetimepicker/css/bootstrap-datetimepicker.min.css">
    <!--<link rel="stylesheet" href="plugin/datetimepicker/css/bootstrap-combined.min.css">-->



    <script src="pmfckeditor/ckeditor.js"></script>
    <script src="pmfckfinder/ckfinder.js"></script>

    <style>
        body {
            font-family: Book Antiqua !important;
        }

        thead th {
            white-space: nowrap;
        }

        .panel-heading {
            padding: 1px;
        }
    </style>

    <style>
        th {
            text-transform: uppercase;
            text-align: center;
        }
    </style>
</head>

<?php
if (!($_SESSION["loginuser"]) || !($_SESSION["passuser"]) || (!$_SESSION["etatuser"]) || ($_SESSION["roleuser"] != "administrateur")) {
    header("location:index.php");
}
?>

<body>
    <!--<div class="container-fluid">-->
    <?php include('./pmfincludes/navbar.php'); ?>

    <div class="container-fluid" style="padding-top: 50px; margin-left: 0px;">
        <!--[if lt IE 8]>
                        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
                <![endif]-->

        <?php
        include './micropages/microclient/clientfonction.php';
        include './pmfpages/pmfprets/pmffonction.php';
        include './pmfpages/pmfparametre/pmftypecompte/pmffonction.php';
        include './pmfpages/pmfparametre/pmfcompte/pmffonction.php';
        include './pmfpages/pmfutilisateur/pmffonction.php';


        ?>
        <div class="row">
            <div class="col-sm-2">
                <?php// include './pmfincludes/sidebar.php' ; ?>

            </div>
            
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="javascript:history.go(-1)" class="btn btn-sm pull-left btn-primary">
                            <i class="glyphicon glyphicon-backward"></i> Pr&eacute;cedant</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12" id="products">
                        <?php include './pmfincludes/alertjs.php'; ?>
                        <?php
                        if (isset($_REQUEST["page"])) {
                            $page = base64_decode($_REQUEST["page"]) . ".php";
                            if (file_exists($page)) {
                                include($page);
                            } else {
                                echo 'Page nom disponible sur le serveur';
                            }
                        } else {
                            // include './pmfpages/pmfparametre/pmftypecompte/lister_typecompte.php';
                            include './pmfincludes/pmfaccueil.php';
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div><!--/.container-->

    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2024.<a href="https://github.com/thelosergithup"> Donald Nekhui. </a> <img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" width="15" height="15"> </p>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--</div>-->
    <!-- bootstrap JS
                    ============================================ -->
    <script src="pmfjs/bootstrap.min.js"></script>


    <!-- validation des formulaires -->
    <script src="pmfplugin/bootstrapvalidator/js/bootstrapValidator.min.js"></script>
    <script src="pmfplugin/bootstrapvalidator/js/language/fr_FR.js"></script>
    <script src="pmfjs/bootstrap-fileupload.js"></script>

    <!-- menu -->
    <script src="pmfplugin/menu/js/jquery.dlmenu.js"></script>
    <script>
        $(function() {
            $('#dl-menu').dlmenu();
        });
    </script>


    <!-- wow JS
                    ============================================ -->
    <script src="pmfjs/wow.min.js"></script>
    <!-- price-slider JS
                    ============================================ -->
    <script src="pmfjs/jquery-price-slider.js"></script>
    <!-- meanmenu JS
                    ============================================ -->
    <script src="pmfjs/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
                    ============================================ -->
    <script src="pmfjs/owl.carousel.min.js"></script>
    <!-- sticky JS
                    ============================================ -->
    <script src="pmfjs/jquery.sticky.js"></script>
    <!-- scrollUp JS
                    ============================================ -->
    <script src="pmfjs/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
                    ============================================ -->
    <script src="pmfjs/counterup/jquery.counterup.min.js"></script>
    <script src="pmfjs/counterup/waypoints.min.js"></script>
    <script src="pmfjs/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
                    ============================================ -->
    <script src="pmfjs/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="pmfjs/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
                    ============================================ -->
    <script src="pmfjs/metisMenu/metisMenu.min.js"></script>
    <script src="pmfjs/metisMenu/metisMenu-active.js"></script>

    <!-- data table JS
                    ============================================ -->
    <script src="pmfjs/data-table/bootstrap-table.js"></script>
    <script src="pmfjs/data-table/tableExport.js"></script>
    <script src="pmfjs/data-table/data-table-active.js"></script>
    <script src="pmfjs/data-table/bootstrap-table-editable.js"></script>
    <script src="pmfjs/data-table/bootstrap-editable.js"></script>
    <script src="pmfjs/data-table/bootstrap-table-resizable.js"></script>
    <script src="pmfjs/data-table/colResizable-1.5.source.js"></script>
    <script src="pmfjs/data-table/bootstrap-table-export.js"></script>
    <!-- morrisjs JS
                    ============================================ -->
    <script src="pmfjs/morrisjs/raphael-min.js"></script>
    <script src="sotcoc<scriptogjs/morrisjs/morris.js"></script>
    <script src="pmfjs/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
                    ============================================ -->
    <script src="pmfjs/sparkline/jquery.sparkline.min.js"></script>
    <script src="pmfjs/sparkline/jquery.charts-sparkline.js"></script>
    <script src="pmfjs/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
                    ============================================ -->
    <script src="pmfjs/calendar/moment.min.js"></script>
    <script src="pmfjs/calendar/fullcalendar.min.js"></script>
    <script src="pmfjs/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
                    ============================================ -->
    <script src="pmfjs/plugins.js"></script>
    <!-- main JS
                    ============================================ -->
    <script src="pmfjs/main.js"></script>
    <!-- tawk chat JS
                    ============================================ -->
    <!--        <script src="pmfjs/tawk-chat.js"></script>-->


    <!-- les dates -->
    <script src="pmfplugin/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="pmfplugin/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
    <script src="pmfplugin/moment/moment.min.js"></script>

    <script src="pmfjs/scriptajax.js"></script>


</body>

</html>

<?php
ob_end_flush();
?>
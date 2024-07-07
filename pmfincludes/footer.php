<style>
    #contact .box {
        background-color: #222;
        color: #999;
    }
    #contact .box h1,
    #contact .box h2,
    #contact .box h3 {
        color: #fff;
    }
    #contact .box a {
        color: #999;
    }
    #contact .box a:hover {
        color: #52b6ec;
    }
    #contact .box input[type="text"],
    #contact .box input[type="email"],
    #contact .box textarea {
        background-color: #445;
        border: 0;
        color: white;
        -webkit-transition: 300ms;
        -moz-transition: 300ms;
        -o-transition: 300ms;
        transition: 300ms;
    }
    #contact .box input[type="text"]:focus,
    #contact .box input[type="email"]:focus,
    #contact .box textarea:focus {
        background-color: #000;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
    }
    .box {
        padding: 50px 30px;
        background: #fff;
        border-bottom: 1px solid #e9e9e9;
        position: relative;
    }


    .icon-social {
        border: 0;
        color: #fff;
        border-radius: 100%;
        display: inline-block !important;
        width: 36px;
        height: 36px;
        line-height: 36px;
        text-align: center;
        padding: 0;
    }
    .icon-social.icon-facebook {
        background: #4f7dd4;
    }
    .icon-social.icon-facebook:hover {
        background: #789bde;
    }
    .icon-social.icon-twitter {
        background: #5bceff;
    }
    .icon-social.icon-twitter:hover {
        background: #8eddff;
    }
    .icon-social.icon-linkedin {
        background: #21a6d8;
    }
    .icon-social.icon-linkedin:hover {
        background: #49b9e3;
    }
    .icon-social.icon-google-plus {
        background: #dc422b;
    }
    .icon-social.icon-google-plus:hover {
        background: #e36957;
    }
    .icon-social.icon-pinterest {
        background: #cb2027;
    }
    .icon-social.icon-pinterest:hover {
        background: #e03e44;
    }
    .icon-social.icon-youtube {
        background: #ce332d;
    }
    .icon-social.icon-youtube:hover {
        background: #da5954;
    }
    .icon-social:hover {
        color: #fff;
    }

    .icon-lg {
        font-size: 48px;
        height: 108px;
        width: 108px;
        line-height: 108px;
        color: #fff;
        margin: 10px;
        background-color: rgba(0, 0, 0, 0.4);
        text-align: center;
        display: inline-block !important;
        border-radius: 100%;
    }
    .icon-md {
        font-size: 24px;
        height: 68px;
        width: 68px;
        line-height: 68px;
        color: #fff;
        margin-right: 10px;
        background-color: rgba(0, 0, 0, 0.4);
        text-align: center;
        display: inline-block;
        border-radius: 100%;
        margin-bottom: 10px;
    }
    .icon-color1 {
        background-color: #e74c3c;
    }
    .icon-color2 {
        background-color: #2ecc71;
    }
    .icon-color3 {
        background-color: #3498db;
    }
    .icon-color4 {
        background-color: #8e44ad;
    }
    .icon-color5 {
        background-color: #1abc9c;
    }
    .icon-color6 {
        background-color: #2c3e50;
    }
    .gap {
        margin-bottom: 50px;
    }
    .big-gap {
        margin-bottom: 100px;
    }

    ul.social {
        list-style: none;
        margin: 10px 0 0;
        padding: 0;
    }
    ul.social > li {
        margin: 0 0 20px;
    }
    ul.social > li > a {
        display: block;
        font-size: 18px;
    }
    ul.social > li > a i {
        margin-right: 10px;
    }
    textarea#message {
        padding: 10px 15px;
        height: 220px;
    }
    #contact .container-fluid{
        padding: 0px !important;
    }

</style>
<?php ?>
<section id="contact">
    <div class="container-fluid">

        <div class="box last">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Contactez Nous ici</h1>
                    <p>Veuillez entrer une contenu afin d'envoyer le mail &acirc; l'administrateur.</p>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form" name="contact_form" method="POST" action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" required="required" placeholder="Votre nom ...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="from" required="required" placeholder="Votre adresse em@ail ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea id="message" required="required" name="message" class="form-control" rows="4" placeholder="Votre  M&eacute;ssage ici ..."></textarea>
                                </div>
                                <div class="form-group" style="text-align: center;">
                                    <button type="submit" name="send_mail" class="btn btn-primary">Envoyer le M&eacute;ssage</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!--/.col-sm-6-->
                <div class="col-sm-6">
                    <h1>Nos Adresses</h1>
                    <div class="row">
                        <div class="col-md-5">
                            <address>
                                <h4><strong>Univers Binaire Sarl.</strong></h4>
                                <ul style="list-style-type: none; padding-left: 0px !important;">
                                    <li style="color: white !important; cursor: default;"><i class="glyphicon glyphicon-envelope"></i> info@universbinaire.com <br></li>
                                    <li style="color: white !important; cursor: default;"><i class="glyphicon glyphicon-globe"></i> <a href="https://www.universbinaire.com" target = "_blank" style="color: white !important; cursor: pointer;">www.universbinaire.com</a><br></li>
                                    <li style="color: white !important; cursor: default;"><i class="glyphicon glyphicon-globe"></i> BP: 6832<br></li>
                                    <li  style="color: white !important; cursor: default;"><i class="glyphicon glyphicon-phone" ></i> (+237) 697 866 127 | 674 783 450</li> 
                                </ul>
                                <!--<abbr title="Phone">P:</abbr> (123) 456-7890-->
                            </address>
                        </div>
                        <div class="col-md-4">
                            <address>
                                <h4><strong>Simgoun</strong></h4>
                                <ul style="list-style-type: none; padding-left: 0px !important;">
                                    <li style="color: white !important; cursor: default;"><i class="glyphicon glyphicon-envelope"></i> info@simgoun.com <br></li>
                                    <li style="color: white !important; cursor: default;"><i class="glyphicon glyphicon-globe"></i> <a href="https://www.universbinaire.com" target = "_blank" style="color: white !important; cursor: pointer;">www.simgoun.com</a><br></li>
                                    <li  style="color: white !important; cursor: default;"><i class="glyphicon glyphicon-education" ></i> Dévellopé par LEQUIPE SIMGOUN SARL</li> 
                                </ul>
                                <!--<abbr title="Phone">P:</abbr> (123) 456-7890-->
                            </address>
                        </div>
                        <div class="col-md-3">
                            <h4><strong href="" style="color: white !important;">A propos</strong></h4>
                            <a href=".modal-help" data-toggle="modal" data-target=".modal-help" title="Cliquez pour avoir de l'aide !" ><i class="glyphicon glyphicon-globe"></i>&nbsp;SIMGOUN SARL</a>
                        </div>
                    </div>
                    <h1>Contactez-Nous par</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="social">
                                <li><a href="#"><i class="fa fa-facebook icon-facebook icon-social"></i> Facebook</a></li>
                                <li><a href="#"><i class="fa fa-google-plus icon-google-plus icon-social"></i> Google Plus</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="social">
                                <li><a href="#"><i class="fa fa-twitter icon-twitter icon-social"></i> Twitter</a></li>
                                <li><a href="#"><i class="fa fa-youtube icon-youtube icon-social"></i> Youtube</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!--/.col-sm-6-->
            </div><!--/.row-->
        </div><!--/.box-->
    </div><!--/.container-->
</section><!--/#contact-->
<div class="bs-docs-footer">
    <center>
        <p style="color: white; background-color: #333;">Copyright &COPY; SIMGOUN SARL <a href="https://www.universbinaire.com" target = "_blank"> UNIVERS BINAIRE SARL</a></p>           
    </center>
</div>

<div class="modal fade modal-help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role='document'>
        <div class="modal-content modal-popup">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red; font-size: 30px;">
                    <span aria-hidden="true">&times;</span>
                </button>
               <h5 class="text-uppercase text-center" style="color: #0099aa; font-weight: bold;">Guide d'utilisation de la plate-forme SIMGOUN en cour de rédaction ...</h5>
            </div>
            <div class="modal-body">
                <embed src=pages/Guide-Utilisateur.pdfff width=100% height=500 type='application/pdf'/>
            </div>
            <div class="modal-footer">
                <center> 
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </center>
            </div>
        </div>
    </div>

</div>
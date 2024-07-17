 <div class="data-table-area mg-b-15 animated zoomIn">
     <div class="container-fluid">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="sparkline13-list">
                         <div class="sparkline13-hd">
                             <div class="main-sparkline13-hd">
                                 <center>
                                     <h1><strong> Liste des clients </strong></h1>
                                 </center>

                                 <div class="add-product">
                                     <a href="<?= $url; ?>?page=<?php echo base64_encode('micropages/microclient/ajouter_client/ajout_client'); ?>" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Ajouter</a>
                                 </div>
                                 <?php
                                    ?>
                             </div>
                         </div>
                         <div class="sparkline13-graph">
                             <div class="datatable-dashv1-list custom-datatable-overright">
                                 <div id="toolbar">
                                     <select class="form-control dt-tb">
                                         <option value="">Exporter</option>
                                         <option value="all">Exporter Tout</option>
                                         <option value="selected">Exporter la Selection</option>
                                     </select>
                                 </div>
                                 <table id="table" class="table " data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                     <thead>
                                         <tr>
                                             <th data-field="state" data-checkbox="true"></th>
                                             <th>ID</th>
                                             <th>photo</th>

                                             <th>nom</th>
                                             <th>agence</th>
                                             <!--                                             <th>utilisateur</th>
 -->
                                             <th>prenom</th>
                                             <th>sexe</th>
                                             <th>date de naissance</th>
                                             <th>cni</th>
                                             <th>T&eacute;l&eacute;phone</th>
                                             <th>E-mail</th>
                                             <th>nationalite</th>
                                             <th>Etat</th>
                                             <th>Date</th>
                                             <th>Login</th>
                                             <th>Op&eacute;ration</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            lister_client($con);
                                            ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
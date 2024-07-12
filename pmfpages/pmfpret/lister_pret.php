<!DOCTYPE html>
<html>

<head>
    <style>
        .container {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            grid-gap: 10px;
            padding: 10px;
            background-color: #f2f2f2;
        }

        .card {
            background-color: #ffffff;
            border-radius: 4px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.5);
            padding: 20px;
            text-align: center;
            width: 180px;
            height: 150px;

        }

        .card h2 {
            margin-top: 0;
        }

        .button {
            display: block;
            width: 70%;
            padding: 8px;
            font-size: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 30px;
            height: 25px; 
            position : center;
            margin-bottom: -25px;

        }

        .button-open {
            background-color: #007bff;
            color: #ffffff;
            margin-top: 30px;
        }

        .button-close {
            background-color: #dc3545;
            color: #ffffff;
        }
    </style>
</head>

<body>

<div class="row"></div>
    <?php
        $rsltp = $con->query('select * from demandepret') or die(mysqli_error($con));

        while ($rowp = mysqli_fetch_assoc($rsltp)) {
    ?>
        <div class="col-md-4 col-sm-4 col-xs-4"></div>
            <div class=" animated zoomIn">
                <div class="card">
                    <div type="hidden"> <?php //echo $rowp['iddemande']; ?> </div>
                    <?php echo $_SESSION['iddemande']=$rowp['iddemande'];?>
                    <h5> <?php echo $rowp['motifdemande']; ?> </h5> 
                    <a href="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfpret/pmfdemandepret/info_demandepret'); ?>" class="btn btn-primary btn-sm pull-center"><i class="glyphicon glyphicon-open"></i> Ouvrir</a>
<!--                     <button class="button button-open">Ouvrir</button>
                   <button class="button button-close">Rejeter</button> -->  
                   <a href='<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfpret/pmfdemandepret/demandepret_ajax'); ?>  &iddemande=<?php echo $_SESSION["iddemande"]; ?>&supprimer=supprimer' onclick="return(confirm('Etes-vous s&ucirc;r de vouloir Supprimer cette demande ?'));" class="btn btn-danger btn-sm pull-center" ><i class="glyphicon glyphicon"></i> Rejeter</a>

<!--                    <a href="<?= $url; ?>?page=<?php// echo base64_encode('pmfpages/pmfpret/pmfdemandepret/demandepret_ajax'); ?>" class="btn btn-danger btn-sm pull-center"><i class="glyphicon glyphicon"></i> Rejeter</a>
 -->
                </div>

            </div>
            <span style="margin-right: 10px;"></span> 
    <?php
        }
    ?>
</div>

</body>

</html>
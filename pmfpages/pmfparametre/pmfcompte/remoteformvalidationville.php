<?php

// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:


header('Content-type: application/json');


//sleep(5);
include('../../../pmfconnexion/connexion.php');

$valid = true;

$rsltpay = $con->query("SELECT c.*,t.nomtypecom AS typecompte FROM compte c JOIN  typecompte t ON c.idtypecompte = t.idtypecompte ") or die(mysqli_error($con));

    

    

   
$comptes = array();
$i = 0;
while ($rowpay = mysqli_fetch_array($rsltpay)) {
    $comptes[$i]["id"] = $rowpay["idcompte"];
    $comptes[$i]["compte"] = $rowpay["nomtypecom"];
    $i = $i + 1;
}
if (isset($_POST['compte'])) {
    $code = $_POST['compte'];
    foreach ($comptes as $k => $v) {
        if ($code == $comptes[$k]["compte"]) {
            $valid = false;
            break;
        }
    }
}


if (isset($_POST['comptee'])) {
    $code = $_POST['comptee'];
    $id = $_POST['idcompte'];
    foreach ($comptes as $k => $v) {
        if ($code == $comptes[$k]["compte"]) {
            if ($id != $comptes[$k]["id"]) {
                $valid = false;
                break;
            }
        }
    }
}


echo json_encode(array(
    'valid' => $valid,
));

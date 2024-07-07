<?php

// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:


header('Content-type: application/json');


//sleep(5);
include('../../../pmfconnexion/connexion.php');

$valid = true;

$rsltpay = $con->query("SELECT * FROM typecompte ") or die(mysqli_error($con));
$payss = array();
$i = 0;
while ($rowpay = mysqli_fetch_array($rsltpay)) {
    $payss[$i]["id"] = $rowpay["idtypecom"];
    $payss[$i]["pays"] = $rowpay["nomtypecom"];
    $payss[$i]["code"] = $rowpay["codepays"];
    
    $i = $i + 1;
}

if (isset($_POST['codet'])) {
    $code = $_POST['codet'];
    foreach ($typecomptes as $k => $v) {
        if ($code == $typecomptes[$k]["code"]) {
            $valid = false;
            break;
        }
    }
} else if (isset($_POST['typecompte'])) {
    $code = $_POST['typecompte'];
    foreach ($typecomptes as $k => $v) {
        if ($code == $typecomptes[$k]["typecompte"]) {
            $valid = false;
            break;
        }
    }
} 


if (isset($_POST['codete'])) {
    $code = $_POST['codete'];
    $id = $_POST['idtyppecom'];
//    echo $id;
    foreach ($typecomptes as $k => $v) {
        if ($code == $typecomptes[$k]["code"]) {
            if ($id != $typecomptes[$k]["id"]) {
                $valid = false;
                break;
            }
        }
    }
} else if (isset($_POST['typecomptee'])) {
    $code = $_POST['typecomptee'];
    $id = $_POST['idtypecompte'];
    foreach ($typecomptes as $k => $v) {
        if ($code == $payss[$k]["typecompte"]) {
            if ($id != $typecomptes[$k]["id"]) {
                $valid = false;
                break;
            }
        }
    }
} 


echo json_encode(array(
    'valid' => $valid,
));

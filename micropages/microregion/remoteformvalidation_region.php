<?php

// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:


header('Content-type: application/json');


//sleep(5);
include('../../../microconnexion/connexion.php');

$valid = true;

$rsltpay = $con->query("SELECT * FROM region ") or die(mysqli_error($con));
$regions = array();
$i = 0;
while ($rowpay = mysqli_fetch_array($rsltpay)) {
    $regionss[$i]["id"] = $rowpay["idregion"];
    $regionss[$i]["code"] = $rowpay["coderegion"];
    $regionss[$i]["region"] = $rowpay["nomregion"];
    $i = $i + 1;
}

if (isset($_POST['code'])) {
    $code = $_POST['code'];
    foreach ($regions as $k => $v) {
        if ($code == $regions[$k]["code"]) {
            $valid = false;
            break;
        }
    }
} else if (isset($_POST['region'])) {
    $code = $_POST['region'];
    foreach ($regionss as $k => $v) {
        if ($code == $regionss[$k]["region"]) {
            $valid = false;
            break;
        }
    }
} 
//else if (isset($_POST['indice'])) {
//    $code = $_POST['indice'];
//    foreach ($payss as $k => $v) {
//        if ($code == $payss[$k]["indice"]) {
//            $valid = false;
//            break;
//        }
//    }
//}


if (isset($_POST['codee'])) {
    $code = $_POST['codee'];
    $id = $_POST['idregion'];
//    echo $id;
    foreach ($regions as $k => $v) {
        if ($code == $regions[$k]["code"]) {
            if ($id != $regions[$k]["id"]) {
                $valid = false;
                break;
            }
        }
    }
} else if (isset($_POST['regione'])) {
    $code = $_POST['regione'];
    $id = $_POST['idregion'];
    foreach ($regions as $k => $v) {
        if ($code == $regions[$k]["region"]) {
            if ($id != $regions[$k]["id"]) {
                $valid = false;
                break;
            }
        }
    }
} 
//else if (isset($_POST['indicee'])) {
//    $code = $_POST['indicee'];
//    $id = $_POST['idpays'];
//    foreach ($payss as $k => $v) {
//        if ($code == $payss[$k]["indice"]) {
//            if ($id != $payss[$k]["id"]) {
//                $valid = false;
//                break;
//            }
//        }
//    }
//}


echo json_encode(array(
    'valid' => $valid,
));

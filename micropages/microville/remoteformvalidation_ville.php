<?php

// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:


header('Content-type: application/json');


//sleep(5);
include('../../../microconnexion/connexion.php');

$valid = true;

$rsltpay = $con->query("SELECT * FROM ville ") or die(mysqli_error($con));
$villes = array();
$i = 0;
while ($rowpay = mysqli_fetch_array($rsltpay)) {
    $villes[$i]["id"] = $rowpay["idville"];
    $villes[$i]["ville"] = $rowpay["nomville"];
    $i = $i + 1;
}
if (isset($_POST['ville'])) {
    $code = $_POST['ville'];
    foreach ($villes as $k => $v) {
        if ($code == $villes[$k]["ville"]) {
            $valid = false;
            break;
        }
    }
}


if (isset($_POST['villee'])) {
    $code = $_POST['villee'];
    $id = $_POST['idville'];
    foreach ($villes as $k => $v) {
        if ($code == $villes[$k]["ville"]) {
            if ($id != $villes[$k]["id"]) {
                $valid = false;
                break;
            }
        }
    }
}


echo json_encode(array(
    'valid' => $valid,
));

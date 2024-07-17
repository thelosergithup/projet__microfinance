<?php

// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:


header('Content-type: application/json');


//sleep(5);
include('../../../microconnexion/connexion.php');

$valid = true;

$rsltpay = $con->query("SELECT * FROM agence ") or die(mysqli_error($con));
$agences = array();
$i = 0;
while ($rowpay = mysqli_fetch_array($rsltpay)) {
    $agences[$i]["id"] = $rowpay["idagence"];
    $agences[$i]["agence"] = $rowpay["nomagence"];
    $i = $i + 1;
}
if (isset($_POST['agence'])) {
    $code = $_POST['agence'];
    foreach ($agences as $k => $v) {
        if ($code == $agences[$k]["agence"]) {
            $valid = false;
            break;
        }
    }
}


if (isset($_POST['agencee'])) {
    $code = $_POST['agencee'];
    $id = $_POST['idagence'];
    foreach ($agences as $k => $v) {
        if ($code == $agences[$k]["agence"]) {
            if ($id != $agences[$k]["id"]) {
                $valid = false;
                break;
            }
        }
    }
}


echo json_encode(array(
    'valid' => $valid,
));


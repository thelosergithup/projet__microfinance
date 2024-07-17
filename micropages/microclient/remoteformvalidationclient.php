<?php

// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:


header('Content-type: application/json');


//sleep(5);
include('../../microconnexion/connexion.php');

$valid = true;

$rsltpay = $con->query("SELECT * FROM client ") or die(mysqli_error($con));
$clients = array();
$i = 0;
while ($rowpay = mysqli_fetch_array($rsltpay)) {
    $clients[$i]["id"] = $rowpay["idclient"];
    $clients[$i]["login"] = $rowpay["loginclient"];
    $clients[$i]["pass"] = $rowpay["passclient"];
    $i = $i + 1;
}

if (isset($_POST['login'])) {
    $code = $_POST['login'];
    foreach ($clients as $k => $v) {
        if ($code == $clients[$k]["login"]) {
            $valid = false;
            break;
        }
    }
} else if (isset($_POST['pass1'])) {
    $code = sha1($_POST['pass1']);
    foreach ($clients as $k => $v) {
        if ($code == $clients[$k]["pass"]) {
            $valid = false;
            break;
        }
    }
}


if (isset($_POST['logine'])) {
    $code = $_POST['logine'];
    $id = $_POST['idclient'];
//    echo $id;
    foreach ($clients as $k => $v) {
        if ($code == $clients[$k]["login"]) {
            if ($id != $clients[$k]["id"]) {
                $valid = false;
                break;
            }
        }
    }
} else if (isset($_POST['pass1e'])) {
    $code = sha1($_POST['pass1e']);
    $id = $_POST['idclient'];
    foreach ($clients as $k => $v) {
        if ($code == $clients[$k]["pass"]) {
            if ($id != $clients[$k]["id"]) {
                $valid = false;
                break;
            }
        }
    }
}


echo json_encode(array(
    'valid' => $valid,
));

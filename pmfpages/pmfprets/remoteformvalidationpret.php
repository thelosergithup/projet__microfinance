<?php

// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:


header('Content-type: application/json');


//sleep(5);
include('../../sotcocogconnexion/connexion.php');

$valid = true;

$rsltpay = $con->query("SELECT * FROM sot_utilisateur ") or die(mysqli_error($con));
$utilisateurs = array();
$i = 0;
while ($rowpay = mysqli_fetch_array($rsltpay)) {
    $utilisateurs[$i]["id"] = $rowpay["iduser"];
    $utilisateurs[$i]["login"] = $rowpay["loginuser"];
    $utilisateurs[$i]["pass"] = $rowpay["motdepasseuser"];
    $i = $i + 1;
}

if (isset($_POST['login'])) {
    $code = $_POST['login'];
    foreach ($utilisateurs as $k => $v) {
        if ($code == $utilisateurs[$k]["login"]) {
            $valid = false;
            break;
        }
    }
} else if (isset($_POST['pass1'])) {
    $code = sha1($_POST['pass1']);
    foreach ($utilisateurs as $k => $v) {
        if ($code == $utilisateurs[$k]["pass"]) {
            $valid = false;
            break;
        }
    }
}


if (isset($_POST['logine'])) {
    $code = $_POST['logine'];
    $id = $_POST['idutilisateur'];
//    echo $id;
    foreach ($utilisateurs as $k => $v) {
        if ($code == $utilisateurs[$k]["login"]) {
            if ($id != $utilisateurs[$k]["id"]) {
                $valid = false;
                break;
            }
        }
    }
} else if (isset($_POST['pass1e'])) {
    $code = sha1($_POST['pass1e']);
    $id = $_POST['idutilisateur'];
    foreach ($utilisateurs as $k => $v) {
        if ($code == $utilisateurs[$k]["pass"]) {
            if ($id != $utilisateurs[$k]["id"]) {
                $valid = false;
                break;
            }
        }
    }
}


echo json_encode(array(
    'valid' => $valid,
));

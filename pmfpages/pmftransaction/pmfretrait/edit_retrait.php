<?php
session_start();
include('pmfconnexion/connexion.php');

//include('db_connection.php'); // Assurez-vous de connecter votre base de données

// Récupération du numéro de l'étape en cours
if (empty($_GET['pagecom']) or ! is_numeric($_GET['pagecom'])) {
    define('NUM_PAGE', 1);
} else {
    // En situation réelle, il faudrait vérifier l'existence de cette page
    define('NUM_PAGE', intval($_GET['pagecom']));
}

// Déclaration de la variable de session
if (empty($_SESSION['formretrait'])) {
    $_SESSION['formretrait'] = array();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_compte = $_POST['numero_compte'];
    $montant = $_POST['montant'];
    $login_utilisateur = $_POST['login_utilisateur'];
    $motif = $_POST['motif'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $confirm_mot_de_passe = $_POST['confirm_mot_de_passe'];

    // Vérifier que tous les champs sont remplis
    if (empty($numero_compte) || empty($montant) || empty($login_utilisateur) || empty($mot_de_passe) || empty($confirm_mot_de_passe)) {
        echo "Tous les champs doivent être remplis.";
        exit;
    }

    // Vérifier que le numéro de compte existe
    $query = $conn->prepare("SELECT * FROM compte WHERE idcompte = ?");
    $query->bind_param("s", $numero_compte);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows == 0) {
        echo "Le numéro de compte n'existe pas.";
        exit;
    }
    $compte = $result->fetch_assoc();

    // Vérifier que le login de l'utilisateur existe
    $query = $conn->prepare("SELECT * FROM Client WHERE idclient = ?");
    $query->bind_param("s", $login_utilisateur);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows == 0) {
        echo "Le login de l'utilisateur n'existe pas.";
        exit;
    }
    $client = $result->fetch_assoc();

    // Vérifier que le mot de passe est correct
    if ($client['passclient'] != $mot_de_passe) {
        echo "Le mot de passe est incorrect.";
        exit;
    }

    // Vérifier que le montant est valide
    $devise = strtolower($compte['devise']);
    if (($devise == 'fcfa' && $montant < 1000) || ($devise != 'fcfa' && $montant < 50)) {
        echo "Le montant doit être supérieur ou égal à 1000 FCFA ou 50 dans une autre devise.";
        exit;
    }

    // Vérifier que le montant du retrait est inférieur au solde du compte
    if ($montant > $compte['solde']) {
        echo "Le montant du retrait est supérieur au solde du compte.";
        exit;
    }

    // Effectuer le retrait
    /* $nouveau_solde = $compte['solde'] - $montant;
    $query = $conn->prepare("UPDATE compte SET solde = ? WHERE idcompte = ?");
    $query->bind_param("ds", $nouveau_solde, $numero_compte);
    $query->execute(); */
    $nouveau_solde = $compte['solde'] - $montant;
    $con->query("update compte set  solde=$nouveau_solde, where idcompte='".$reg["1"]['idcompte']."'") or die(mysqli_error($con));
                                    
   

    echo "Retrait effectué avec succès.";
}
?>
<?php

include('pmfconnexion/connexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_compte = $_POST['numero_compte'];
    $montant = $_POST['montant'];

    // Vérifier que tous les champs sont remplis
    if (empty($numero_compte) || empty($montant)) {
        echo "Tous les champs doivent être remplis.";
        exit;
    }

    // Vérifier que le numéro de compte existe
    $query = $con->prepare("SELECT * FROM compte WHERE idcompte = ?");
    $query->bind_param("s", $numero_compte);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows == 0) {
        echo "Le numéro de compte n'existe pas.";
        exit;
    }

    $compte = $result->fetch_assoc();

    /* // Vérifier que le montant est valide
    if (($compte['monnaie'] == 'FCFA' && $montant <= 1000) || ($compte['monnaie'] != 'FCFA' && $montant <= 10)) {
        echo "Le montant doit être supérieur à 1000 FCFA ou 10 pour d'autres monnaies.";
        exit;
    } */

    // Effectuer le dépôt
    $nouveau_solde = $compte['solde'] + $montant;
    $query = $con->prepare("UPDATE compte SET solde = ? WHERE idcompte = ?");
    $query->bind_param("ds", $nouveau_solde, $numero_compte);
    if ($query->execute()) {
        echo "Dépôt effectué avec succès. Le nouveau solde est " . $nouveau_solde;
    } else {
        echo "Une erreur s'est produite. Veuillez réessayer.";
    }
}
?>
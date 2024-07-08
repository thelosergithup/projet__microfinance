<?php

include('pmfconnexion/connexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $numero_compte_source = $_POST['numero_compte_source'];
    $numero_compte_destination = $_POST['numero_compte_destination'];
    $montant = $_POST['montant'];
    $motif = $_POST['motif'];

    // Vérifier que tous les champs sont remplis
    if (empty($login) || empty($mot_de_passe) || empty($numero_compte_source) || empty($numero_compte_destination) || empty($montant) || empty($motif)) {
        echo "<div class='alert alert-danger'>Tous les champs doivent être remplis.</div>";
        exit;
    }
    echo $login;
    // Vérifier que le login existe
    $query_client = $con->prepare("SELECT * FROM client WHERE loginclient = ?");
    $query_client->bind_param("s", $login);
    $query_client->execute();
    $result_client = $query_client->get_result();

    if ($result_client->num_rows == 0) {
        echo "<div class='alert alert-danger'>ce login n'existe pas.</div>";
        exit;
    }

    $client = $result_client->fetch_assoc();

    // Vérifier que le mot de passe est correct
    if ($client['passclient'] !== $mot_de_passe) {
        echo "<div class='alert alert-danger'>Le mot de passe est incorrect.</div>";
        exit;
    }

    // Vérifier que le compte source existe et appartient au client
    $query_source = $con->prepare(" SELECT *FROM compte c LEFT  JOIN client cl ON c.idclient = cl.idclient WHERE idcompte = ? AND loginclient = ? ") or die(mysqli_error($con));
    $query_source->bind_param("ss", $numero_compte_source, $login);
    $query_source->execute();
    $result_source = $query_source->get_result();

    if ($result_source->num_rows == 0) {
        echo "<div class='alert alert-danger'>Le numéro de compte source n'existe pas ou n'appartient pas au client.</div>";
        exit;
    }

    $compte_source = $result_source->fetch_assoc();

    // Vérifier que le compte destination existe
    $query_destination = $con->prepare("SELECT * FROM compte WHERE idcompte = ?");
    $query_destination->bind_param("s", $numero_compte_destination);
    $query_destination->execute();
    $result_destination = $query_destination->get_result();

    if ($result_destination->num_rows == 0) {
        echo "<div class='alert alert-danger'>Le numéro de compte destination n'existe pas.</div>";
        exit;
    }

    $compte_destination = $result_destination->fetch_assoc();

    // Vérifier que le montant est suffisant dans le compte source
    if ($compte_source['solde'] < $montant) {
        echo "<div class='alert alert-danger'>Le solde du compte source est insuffisant.</div>";
        exit;
    }
    echo '5';
    // Effectuer le transfert
    $nouveau_solde_source = $compte_source['solde'] - $montant;
    $nouveau_solde_destination = $compte_destination['solde'] + $montant;

    $con->begin_transaction();

    try {
        $query_update_source = $con->prepare("UPDATE compte SET solde = ? WHERE idcompte = ?");
        $query_update_source->bind_param("ds", $nouveau_solde_source, $numero_compte_source);
        $query_update_source->execute();

        $query_update_destination = $con->prepare("UPDATE compte SET solde = ? WHERE idcompte = ?");
        $query_update_destination->bind_param("ds", $nouveau_solde_destination, $numero_compte_destination);
        $query_update_destination->execute();

        $con->commit();

        echo "<div class='alert alert-success'>Transfert effectué avec succès. Le nouveau solde du compte source est " . $nouveau_solde_source . ".</div>";
        /* include('pmfpages/pmftransaction/pmftransfert/form_transfert.php'); */
    } catch (Exception $e) {
        $con->rollback();
        echo "<div class='alert alert-danger'>Une erreur s'est produite. Veuillez réessayer.</div>";
    }
}

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Prêt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
        }

        button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container animated zoomIn">
        <h1>Demande de Prêt</h1>
        <form id="loanForm" name="loanForm" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfpret/demande_pret'); ?>&pagecom=<?php echo NUM_PAGE + 1; ?>" style="padding: 2%;">

            <div class="form-group">
                <label for="clientID">ID du Client</label>
                <input type="text" id="clientID" name="clientID" required>
            </div>
            <div class="form-group">
                <label for="montant">Montant du Prêt</label>
                <input type="number" id="montant" name="montant" required>
            </div>
            <div class="form-group">
                <label for="garantie">Garantie</label>
                <input type="text" id="garantie" name="garantie" required>
            </div>
            <button type="button" onclick="submitLoanRequest()">Soumettre</button>
        </form>
    </div>
    <script>
        function submitLoanRequest() {
            const form = document.getElementById('loanForm');
            const clientID = form.clientID.value;
            const montant = form.montant.value;
            const garantie = form.garantie.value;

            // Simuler la vérification des conditions de prêt
            if (true) { // Remplacer cette condition par la vérification réelle
                alert('Demande de prêt soumise avec succès!');
            } else {
                alert('Conditions de prêt non remplies.');
            }
        }
    </script>
</body>

</html>
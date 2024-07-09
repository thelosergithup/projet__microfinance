<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier de Remboursement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container animated zoomIn">
        <h1>Calendrier de Remboursement</h1>
        <form id="repaymentForm" name="repaymentForm" enctype="multipart/form-data" method="post" action="<?= $url; ?>?page=<?php echo base64_encode('pmfpages/pmfpret/calendrier_remboursement'); ?>" style="padding: 2%;">
            <div class="form-group">
                <label for="loanAmount">Montant du Prêt</label>
                <input type="number" id="loanAmount" name="loanAmount" required>
            </div>
            <div class="form-group">
                <label for="interestRate">Taux d'Intérêt (%)</label>
                <input type="number" id="interestRate" name="interestRate" value="30" required>
            </div>
            <div class="form-group">
                <label for="term">Durée (mois)</label>
                <input type="number" id="term" name="term" required>
            </div>
            <button type="button" onclick="generateSchedule()">Générer</button>
        </form>
        <table id="scheduleTable" style="display:none;">
            <thead>
                <tr>
                    <th>Mois</th>
                    <th>Montant à Payer</th>
                    <th>Solde Restant</th>
                </tr>
            </thead>
            <tbody id="scheduleBody"></tbody>
        </table>
    </div>
    <script>
        function generateSchedule() {
            const loanAmount = parseFloat(document.getElementById('loanAmount').value);
            const interestRate = parseFloat(document.getElementById('interestRate').value) / 100;
            const term = parseInt(document.getElementById('term').value);

            const monthlyRate = interestRate / 12;
            const monthlyPayment = loanAmount * monthlyRate / (1 - Math.pow(1 + monthlyRate, -term));

            let balance = loanAmount;
            const scheduleBody = document.getElementById('scheduleBody');
            scheduleBody.innerHTML = '';

            for (let month = 1; month <= term; month++) {
                const interest = balance * monthlyRate;
                const principal = monthlyPayment - interest;
                balance -= principal;

                const row = document.createElement('tr');
                row.innerHTML = `<td>${month}</td><td>${monthlyPayment.toFixed(2)}</td><td>${balance.toFixed(2)}</td>`;
                scheduleBody.appendChild(row);
            }

            document.getElementById('scheduleTable').style.display = 'table';
        }
    </script>
</body>

</html>
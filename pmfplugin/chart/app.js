$(function() {
    var idann = document.getElementById('ann').value;
    $.ajax({
        url: 'sotcocogpages/sotcocogstatistique/chart_data.php',
        type: 'GET',
        data: {idann: idann},
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "Statistiques de paiement des fournisseurs ANNEE "+idann,
                "xAxisName": "Mois",
                "yAxisName": "Montant",
                "rotatevalues": "1",
                "theme": "zune"
            };

            apiChart = new FusionCharts({
                type: 'column2d',
                renderAt: 'chart-container',
                width: '950',
                height: '450',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
});
google.charts.load('current', {packages: ['corechart', 'bar']});

google.charts.setOnLoadCallback(drawChart);
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Caractéristique', 
            'Color1', 'Color2', 'Color3', { role: 'annotation' } ],
        ['Couleur', 0, 1, 4, ''],
        ['Jet d\'encre', 0, 1, 0, ''],
        ['Connecté', 1, 4, 4, ''],
        ['Carte fax', 1, 5, 0, ''],
        ['RV auto', 0, 3, 5, ''],
        ['A3', 0, 0, 4, ''],
        ['Unité de finition', 0, 0, 3, '']
    ]);

    var options = {
        width: 600,
        height: 400,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true,
        title: 'Caractéristiques techniques'
    };

  var chart = new google.visualization.ColumnChart(document.getElementById('inventory'));
  chart.draw(data, options);
}
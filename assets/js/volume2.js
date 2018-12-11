google.charts.load('current', {packages: ['corechart', 'bar']});

google.charts.setOnLoadCallback(drawChart);
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Type', 
            'N&B', 'Couleur', { role: 'annotation' } ],
        ['Fax', 0, 0, ''],
        ['Imprimante', 10000, 1000, ''],
        ['MFP', 20000, 5000, '']
    ]);

    var options = {
        width: 600,
        height: 400,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true,
    };

  var chart = new google.visualization.ColumnChart(document.getElementById('volume2'));
  chart.draw(data, options);
}
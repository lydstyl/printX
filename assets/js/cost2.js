google.charts.load('current', {packages: ['corechart', 'bar']});

google.charts.setOnLoadCallback(drawChart);
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['TCO', 
            'Coût', 'Économie', { role: 'annotation' } ],
        ['TCO Actuel', 85000, 0, ''],
        ['TCO nouvelle configuration Achat', 61000, 24000, ''],
        ['TCO nouvelle configuration Location', 62000, 23000, '']
    ]);

    var options = {
        width: 600,
        height: 400,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true,
        title: 'Estimation des économies'
    };

  var chart = new google.visualization.ColumnChart(document.getElementById('cost2'));
  chart.draw(data, options);
}
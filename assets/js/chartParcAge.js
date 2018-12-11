google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawTrendlines);
function drawTrendlines() {
    var data = google.visualization.arrayToDataTable([
        ['Type', 'Nombre', { role: 'style' }],
        ['Fax', 4.5, 'rgb(51, 102, 204)'],
        ['Imprimante', 3, 'rgb(51, 102, 204)'],
        ['MFP', 3, 'rgb(51, 102, 204)']
    ]);
    var options = {
        width: gO.width,
        height: 400,
        title: 'Moyenne d\'age du parc',
        'legend':'none'
    };
    var chart = new google.visualization.ColumnChart(document.getElementById('chartParcAge'));
    chart.draw(data, options);
}
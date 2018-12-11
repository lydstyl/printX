// google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Charge', 'Valeur'],
    ['TCO Achat de conso', 14082],
    ['TCO Contrats de Maintenance', 40496]
  ]);
  var options = {
    title: 'Répartition des charges variables'
  };
  var chart = new google.visualization.PieChart(document.getElementById('charge2'));
  chart.draw(data, options);
}
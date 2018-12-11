// google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Charge', 'Valeur'],
    ['Prix achat', 4050],
    ['Coût loc total', 27726]
  ]);
  var options = {
    title: 'Répartition des charges fixes'
  };
  var chart = new google.visualization.PieChart(document.getElementById('charge1'));
  chart.draw(data, options);
}
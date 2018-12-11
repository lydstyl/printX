// google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['TCO', 'Valeur'],
    ['TCO lié aux achats de matériels', 4050],
    ['TCO lié aux locations de matériels', 27726],
    ['TCO lié aux achats de consommables', 14082],
    ['TCO lié à la maintenance', 40496],
  ]);
  var options = {
    title: 'Répartition TCO'
  };
  var chart = new google.visualization.PieChart(document.getElementById('cost1'));
  chart.draw(data, options);
}
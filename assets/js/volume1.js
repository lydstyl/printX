// google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Nom', 'Valeur'],
    ['Volume mensuel Couleur', 5698],
    ['Volume mensuel N&B',    31366]
  ]);
  var options = {
    title: 'Répartition de la volumétrie'
  };
  var chart = new google.visualization.PieChart(document.getElementById('volume1'));
  chart.draw(data, options);
}
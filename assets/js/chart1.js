function countEquipement(type){
    /* This is a specific function for chart1 */
    var counted = 0;
    for (let i = 0; i < fromBdd.length; i++) {
        const row = fromBdd[i];
        if (row.Type == type) {
            counted ++;
        }
    }
    return counted
}
var faxCount = countEquipement('Fax');
var printerCount = countEquipement('Imprimante');
var MFPCount = countEquipement('MFP');
var totalCount = faxCount + printerCount + MFPCount;
totalCountSpan = document.getElementById('totalCount').innerHTML = totalCount;

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawTrendlines);
function drawTrendlines() {
    var data = google.visualization.arrayToDataTable([
        ['Type', 'Nombre', { role: 'style' }],
        ['Fax', faxCount, 'rgb(51, 102, 204)'], // RGB value
        ['Imprimante', printerCount, 'rgb(51, 102, 204)'], // English color name
        ['MFP', MFPCount, 'rgb(51, 102, 204)']
    ]);
    var options = {
        width: gO.width,
        height: 400,
        title: 'Répartition des équipements',
        'legend':'none' // can be 'right'
    };
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}
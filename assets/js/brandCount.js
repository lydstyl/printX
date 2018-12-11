function brandTab() {
    var brandTab = [];
    for (let i = 0; i < fromBdd.length; i++) {
        const row = fromBdd[i];
        var brand = row.Marque;
        if(brandTab.indexOf(brand) == -1){
            brandTab.push(brand);
        }
    }
    return brandTab.sort();
}
function countBrand(brand){
    /* This is a specific function for chart1 */
    var counted = 0;
    for (let i = 0; i < fromBdd.length; i++) {
        const row = fromBdd[i];
        if (row.Marque == brand) {
            counted ++;
        }
    }
    return counted
}

var brands = brandTab();
var brandNum = brands.length;
document.getElementById('brandCount').innerText = brandNum;

var chartData = [['Type', 'Nombre', { role: 'style' }]];
// var color = 'green';
var color = 'rgb(51, 102, 204)';
for (let i = 0; i < brands.length; i++) { // for each brand
    const brand = brands[i];
    var brandNb = countBrand(brand);
    var row = [brand, brandNb, color];
    chartData.push(row);
}

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawTrendlines);
function drawTrendlines() {
    var data = google.visualization.arrayToDataTable(chartData);
    var options = {
        width: gO.width,
        height: 400,
        title: 'Répartition par marque',
        'legend':'none' // can be 'right',
    };
    var chart = new google.visualization.ColumnChart(document.getElementById('brandDivision'));
    chart.draw(data, options);
}
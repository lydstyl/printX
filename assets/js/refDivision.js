function refTab() {
    var refTab = [];
    for (let i = 0; i < fromBdd.length; i++) {
        const row = fromBdd[i];
        var ref = row.Reference;
        if(refTab.indexOf(ref) == -1){
            refTab.push(ref);
        }
    }
    return refTab.sort();
}
var refs = refTab();
document.getElementById('refCount').innerText = refs.length;


function drawTrendlines() {
    var refByBrand = {};
    fromBdd.forEach(rowObj => {
        // add brand to refsObj
        if (refByBrand[rowObj.Marque] == undefined) {
            refByBrand[rowObj.Marque] = [];
            // refByBrand[rowObj.Marque].push(rowObj.Reference);
            refByBrand[rowObj.Marque][rowObj.Reference] = 1;
        }else{
            // refByBrand[rowObj.Marque].push(rowObj.Reference);
            if (refByBrand[rowObj.Marque][rowObj.Reference] >= 1) {
                refByBrand[rowObj.Marque][rowObj.Reference] ++;
            }else{
                refByBrand[rowObj.Marque][rowObj.Reference] = 1;
            }
        }
    });    
    // refMax is the number max of ref in a brand
    var refMax = 0;
    Object.keys(refByBrand).forEach(brand => {
        if (Object.keys(refByBrand[brand]).length > refMax) {
            refMax = Object.keys(refByBrand[brand]).length;
        }
    });
    
    var refDivisionTabxxx = [];
    var refDivisionTabSubTab = ['Marque'];
    for (let num, i = 0; i < refMax; i++) {
        num = i + 1; 
        refDivisionTabSubTab.push('ref ' + num);
    }
    refDivisionTabxxx.push(refDivisionTabSubTab); // ['Marque', 'Ref1', 'Ref2', 'RefMax']

    brands.forEach(brand => {
        var tab = [brand];
        Object.keys(refByBrand[brand]).forEach(ref => {
            tab.push(refByBrand[brand][ref]);
        });
        var dif = (refMax + 1) - tab.length;
        if (dif) {
            for (let i = 0; i < dif; i++) {
                tab.push(0);
            }
        }
        refDivisionTabxxx.push(tab);
    });

    var data = google.visualization.arrayToDataTable(refDivisionTabxxx);
    
    var options = {
        width: gO.width,
        height: 400,
        title: 'Répartition des marques',
        legend: 'none',
        bar: { groupWidth: '75%' },
        isStacked: true,
    };
    var chart = new google.visualization.ColumnChart(document.getElementById('refDivision'));
    chart.draw(data, options);
}
google.charts.setOnLoadCallback(drawTrendlines);
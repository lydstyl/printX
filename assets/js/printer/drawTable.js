/*
    This script is used to get a Google table combined with data from bdd in the Dom.
    You can use options like showButtons.
*/
var fromBdd = JSON.parse(document.getElementById(tO.tableDivDataId).innerHTML);
google.charts.load('current', {'packages':['table']});
google.charts.setOnLoadCallback(drawTable);
function drawTable() {
    var data = new google.visualization.DataTable();
    // add columns
    if(tO.showRowNumber.show){
        data.addColumn('number', tO.showRowNumber.columnName);
    }
    var columns = Object.keys(fromBdd[0]);
    for (var c = 0; c < columns.length; c++) {
        if(c == 0 && !tO.showId){
            continue;
        }
        var column = columns[c];
        data.addColumn('string', column);
    }
    if(tO.showButtons){
        data.addColumn('string', 'Dupliquer');
        data.addColumn('string', 'Editer');
        data.addColumn('string', 'Supprimer');
    }
    // add rows
    var rows = [];
    // get base url for button duplicate, edit and del
    if(tO.showButtons){
        var firstUrlParam;
        tO.firstUrlParam ? firstUrlParam = tO.firstUrlParam : firstUrlParam = '&equipementId=';
        var baseUrlDuplicate = document.querySelector('a[href*="duplicate"]').href + firstUrlParam;
        var baseUrlEdit = document.querySelector('a[href*="edit"]').href + firstUrlParam;
        var baseUrlDel = document.querySelector('a[href*="del"]').href + firstUrlParam;
    }
    for (var l = 0; l < fromBdd.length; l++) {
        var row = fromBdd[l];
        var rowToPush = [];
        if(tO.showRowNumber.show){
            rowToPush.push(l + 1);
        }
        for (var c = 0; c < columns.length; c++) {
            var column = columns[c];
            if (c == 0) {
                var id = row[column]
                if(!tO.showId){
                    continue;
                }
            }
            rowToPush.push(row[column]);
        }
        if(tO.showButtons){
            rowToPush.push('<a href="' + baseUrlDuplicate + id + '"><i class="fa fa-files-o"></i></a>');
            rowToPush.push('<a href="' + baseUrlEdit + id + '"><i class="fa fa-pencil"></i></a>');
            rowToPush.push('<a href="' + baseUrlDel + id + '"><i class="fa fa-trash-o"></i></a>');
        }
        rows.push(rowToPush);
    }
    data.addRows(rows);
    var table = new google.visualization.Table(document.getElementById(tO.tableDivId));
    try {
        gO.width = gO.width + 'px';
    }
    catch(err) {
        var gO = {width: '100%'};
    }
    table.draw(data, {showRowNumber: false, allowHtml: true, width: gO.width, height: '100%'});
}
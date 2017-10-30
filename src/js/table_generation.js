function makeTable() {

    var table = document.createElement('table');
    table.id = 'data';
    table.appendChild(makeHeader());
    table.appendChild(makeTBody());
    document.getElementById('left-content').appendChild(table);

}

function makeHeader() {

    var trow_header = document.createElement('tr');
    var headers = ["Middelvann", "Normalvann", "Sjøkartnull"];
    for (var i in headers) {
        var tmp = document.createElement('th');
        tmp.id = headers[i];
        tmp.innerHTML = headers[i];
        trow_header.appendChild(tmp)
    }

    return trow_header;
}

function makeTBody() {

    var trow = document.createElement('tr');
    var depths = ["xml", "goes", "here"];
    for (i in depths) {
        tmp = document.createElement('td');
        tmp.id = depths[i];
        tmp.innerHTML = depths[i];
        trow.appendChild(tmp)
    }

    return trow;
}
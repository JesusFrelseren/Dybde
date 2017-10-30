function makeTable() {

    var table = document.createElement('table');
    table.id = 'data';

    var table_section = makePlaceDescription();
    table.appendChild(makeHeader());
    table.appendChild(makeTBody());
    table_section.appendChild(table);

    document.getElementById('left-content').appendChild(table_section);


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
    for (var i in depths) {
        var tmp = document.createElement('td');
        tmp.id = depths[i];
        tmp.innerHTML = depths[i];
        trow.appendChild(tmp)
    }

    return trow;
}

function makePlaceDescription() {

    var desc = document.createElement('p');
    desc.classList.add('location');
    var sect = document.createElement('section');
    sect.classList.add('depth-statistics');

    desc.innerHTML = "Stedsnavn, koordinater";
    sect.appendChild(desc);
    return sect;
}
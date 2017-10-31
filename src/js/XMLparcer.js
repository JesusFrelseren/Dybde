




var url = "api.sehavniva.no/tideapi.php?lat="+lat+"&lon="+lon+"&fromtime="+fromTime+"%3A00&totime="+toTime+"%3A00&datatype=all&refcode=cd&place="+place+"&file=&lang=nn&interval=10&dst=0&tzone=&tide_request=locationdata";

function readResponse(url) {
    var parser = new DOMParser();
    var xmlDoc = parser.parseFromString(url, 'text/xml');
    var tmp = [];

    tmp.push(xmlDoc.getElementsByTagName('location')[0].childNodes[0].nodeValue);
    tmp.push(xmlDoc.getElementsByTagName('location')[0].childNodes[1].nodeValue);
    alert(tmp);
    return xmlDoc.getElementsByTagName('location')
}

  
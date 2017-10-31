





function readResponse(lat, lon, time) {
    var place = "";
    alert(lat);
    alert(lon);
    var url = "api.sehavniva.no/tideapi.php?lat="+lat+"&lon="+lon+"&fromtime="+time+"T00%3A00&totime="
        +time+"T01%3A00&datatype=all&refcode=cd&place="+place+"&file=&lang=nn&interval=10&dst=0&tzone=&tide_request=locationdata";
    alert(url);
    var parser = new DOMParser();
    var xmlDoc = parser.parseFromString(url, 'text/xml');
    //var tmp = [];

    //tmp.push(xmlDoc.getElementsByTagName('location')[0].childNodes[0].nodeValue);
    //tmp.push(xmlDoc.getElementsByTagName('location')[0].childNodes[1].nodeValue);
    //alert(tmp);
    
    
    return xmlDoc.getElementsByTagName('location')
}

  
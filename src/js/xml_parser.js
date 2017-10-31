





function readResponse(lat, lon, time) {
    var place = "";

    var url = "api.sehavniva.no/tideapi.php?lat="+lat+"&lon="+lon+"&fromtime="+time+"T00%3A00&totime="
        +time+"T01%3A00&datatype=all&refcode=cd&place="+place+"&file=&lang=nn&interval=10&dst=0&tzone=&tide_request=locationdata";

    var parser = new XMLHttpRequest();
    parser.readyState = 4;

    parser.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
        }
    };
    alert(url);
    parser.open("GET", url, true);
    parser.send();
    alert(parser);
    document.getElementById('status').value = parser.respo;
    

}

  
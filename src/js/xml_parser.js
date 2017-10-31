





function readResponse(lat, lon, time) {
    var place = "";
    var time = timestamp();
    var fil = tilFil();
    var url = "api.sehavniva.no/tideapi.php?lat="+lat+"&lon="+lon+"&fromtime="+time+"T00%3A00&totime="
        +time+"T01%3A00&datatype=all&refcode=cd&place="+place+"&file=&lang=nn&interval=10&dst=0&tzone=&tide_request=locationdata";

    var parser = new XMLHttpRequest();
    parser.readyState = 4;

    alert(fil);

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
function timestamp () {
    now = new Date();
    year = "" + now.getFullYear();
    month = "" + (now.getMonth() + 1); 
        if (month.length == 1) { 
            month = "0" + month; 
        }
    day = "" + now.getDate(); 
        if (day.length == 1) { 
            day = "0" + day; 
        }
    
    return year + "-" + month + "-" + day ;
  }

  function tilFil(){
    $dom = new DOMDocument();
    $dom->load('http://api.sehavniva.no/tideapi.php?lat=68.79833&lon=16.54165&fromtime=2017-10-27T00%3A00&totime=2017-10-28T00%3A00&datatype=all&refcode=cd&place=Harstad&file=&lang=nn&interval=10&dst=0&tzone=&tide_request=locationdata');

    $dom->save('testdata.xml')
}

  
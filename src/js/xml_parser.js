





function readResponse(lat, lon, time) {
    var place = "";
    var time = timestamp();
    var fil = tilFil();
    var url = "api.sehavniva.no/tideapi.php?lat="+lat+"&lon="+lon+"&fromtime="+time+"T00%3A00&totime="
        +time+"T01%3A00&datatype=all&refcode=cd&place="+place+"&file=&lang=nn&interval=10&dst=0&tzone=&tide_request=locationdata";

    urlVannstand = "http://api.sehavniva.no/tideapi.php?lat="+lat+"&lon="+lon+"&fromtime="+time+"%3A00&totime="+time+"%3A00&datatype=all&refcode=cd&place=&file=&lang=nn&interval=10&dst=0&tzone=&tide_request=locationdata";
    urlHistorie = "http://api.sehavniva.no/tideapi.php?tide_request=locationlevels&lang=nb&lat="+lat+"&lon="+lon+"&"+place+"=&refcode=cd&file=xml&flag=astro";
    
    

    var parser = new XMLHttpRequest();

    alert(fil);

    parser.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
        }
    };
    parser.open("GET", urlHistorie, false);
    parser.send();
    alert(parser.responseText);
}
// skrevet av Tobias
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


  
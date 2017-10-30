var map;

function initMap() {

    var honefoss = {lat: 60.169472, lng: 10.256355};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: honefoss,
      fullscreenControl: false,
      streetViewControl: false,
    });


    var marker = new google.maps.Marker({
      position: honefoss,
      map: map
        //icon: 'resource/cat.jpg'
    });

    var markers = [marker];

    google.maps.event.addListener(map, 'click', function(e) {
        placeMarker(e.latLng, map, markers)
    });

    google.maps.event.addListener(marker, 'click', function(e) {
        removeMarker(marker, markers)
    });

}

  function placeMarker(position, map, markers) {
      var marker = new google.maps.Marker({
          position: position,
          map: map
          //icon: 'resource/cat.jpg'
      });

      google.maps.event.addListener(marker, 'click', function(e) {
          removeMarker(marker)
      });

    markers.push(marker);
    makeTable(marker);
    //document.getElementById('coordinates').value = marker.position;
  }
  
  
  function removeMarker(marker, markers) {
      marker.setMap(null);
      //todo: fjern marker fra markers
      var test = '';
      var teller = 0;
      for (i = 0; i < markers.length; i++) {
          if(marker === markers[i]) {
              markers.pop()
          }
      } 
     
    }
    /*
     function placesSearch() {
        var location = document.getElementById('search');

        var url = 'https://maps.googleapis.com/maps/api/geocode/xml?address=sandnes&key=AIzaSyDDN3r-NshxGsptU4UZ_1h7rwz0FtJWaN0';

        coordinates = readResponse('<?xml version="1.0" encoding="UTF-8"?>' + url);
        //alert(coordinates);

    }
    */

    function readResponse(url) {
        var parser = new DOMParser();
        var xmlDoc = parser.parseFromString(url, 'text/xml');
        var tmp = [];

        tmp.push(xmlDoc.getElementsByTagName('location')[0].childNodes[0].nodeValue);
        tmp.push(xmlDoc.getElementsByTagName('location')[0].childNodes[1].nodeValue);
        alert(tmp);
        return xmlDoc.getElementsByTagName('location')
    }

    function returnCoordinates(xml) {
        
    }
      
    function makeTable(marker) {

        var table = document.createElement('table');
        var tbody = document.createElement('tbody');

        var th = document.createElement('th');
        var th2 = document.createElement('th');

        var trow = document.createElement('tr');

        var trow2 = document.createElement('tr');
        var td = document.createElement('td');
        var td2 = document.createElement('td');
        var tdh = document.createElement('td');
        var tdh2 = document.createElement('td');
        
        table.id = 'data';



        
        tdh.innerHTML = "Middelvann";
        tdh2.innerHTML = "Sjøkartnull";
        trow.appendChild(tdh);
        trow.appendChild(tdh2);

        td.innerHTML = marker.position;
        td2.innerHTML = marker.position;
        
        trow2.appendChild(td);
        trow2.appendChild(td2);

        table.appendChild(trow);
        table.appendChild(trow2);
        


        document.getElementById('left-content').appendChild(table);


    }
      

var map;

function initMap() {

    var honefoss = {lat: 60.16020518963434, lng: 10.261206328868866};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 20,
      center: honefoss,
      fullscreenControl: false,
      streetViewControl: false,
      mapTypeId: 'satellite'
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
    makeTable();
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
      

      

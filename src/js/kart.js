var map;

function initMap() {

    var honefoss = {lat: 60.15020518963434, lng: 10.261206328868866};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
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
        timestamp();
        placeMarker(e.latLng, map, markers);

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
    //makeTable();
    var form = document.createElement("form");
  form.action = "oversikt.php?test=32";
  //var input = document.createElement('input');
  //input.value = marker.position.toString();
  //form.appendChild(input.cloneNode());
  form.method = "get";
  form.submit();
  alert("");

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

    

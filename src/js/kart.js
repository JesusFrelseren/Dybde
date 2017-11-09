// Google Maps API, skreddersydd av Erlend

var map;

function initMap() {

    var lat = document.getElementById('lat').value;
    var lng = document.getElementById('lng').value;
    var zoom = document.getElementById('zoom').value;
    var position = {lat: parseFloat(lat), lng: parseFloat(lng)};

    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: position,
      fullscreenControl: false,
      streetViewControl: false
    });


    var marker = new google.maps.Marker({
      position: position,
      map: map
    });


    google.maps.event.addListener(map, 'click', function(e) {
        placeMarker(e.latLng, map);
        var form = document.getElementById('submit');
        form.submit();

    });

    google.maps.event.addListener(marker, 'click', function(e) {
        marker.setMap(null);

    });

}

  function placeMarker(position, map, markers) {
      var marker = new google.maps.Marker({
          position: position,
          map: map,
          zoom: map.getZoom()
      });

      document.getElementById('lat').value = marker.getPosition().lat();
      document.getElementById('lng').value = marker.getPosition().lng();
      document.getElementById('zoom').value = map.getZoom();

  }


    

var map;

function initMap() {

   /* var input = document.getElementById('pac-input');
    var infowindowContent = document.getElementById('infowindow-content');
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        var marker = new google.maps.Marker({
            position: honefoss,
            map: map
              //icon: 'resource/cat.jpg'
          });

        if(place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.viewport);
        }
    });

    marker.setPosition(place.geometry.location);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindowContent.children['place-icon'].src = place.icon;
    infowindowContent.children['place-name'].textContent = place.name;
    infowindowContent.children['place-address'].textContent = address;
    infowindow.open(map, marker);
*/
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
        makeTable();
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
    //document.getElementById('coordinates').value = marker.position;
  }

  
  hei
  
  
  
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

     function placesSearch() {
        var location = document.getElementById('search');

        var url = 'https://maps.googleapis.com/maps/api/geocode/xml?address=sandnes&key=AIzaSyDDN3r-NshxGsptU4UZ_1h7rwz0FtJWaN0';

        coordinates = readResponse('<?xml version="1.0" encoding="UTF-8"?>' + url);
        //alert(coordinates);

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
      
    function makeTable() {
        document.getElement
    }
      


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
        placeMarker(e.latLng, map, markers);
       // alert();

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
    
      //document.getElementById('lat').value = marker.getPosition().lat();
      //document.getElementById('lng').value = marker.getPosition().lng();

    
      submitForm(marker.getPosition().lat(), marker.getPosition().lng());

    markers.push(marker);
    //makeTable();
  }

  function submitForm(lat, lng) {
    //Lag input for lat
    var latElement = document.createElement('input');
    latElement.setAttribute("type", "hidden");
    latElement.value = lat;
    
    //Lag input for lng
    var lngElement = document.createElement('input');
    lngElement.setAttribute('type', 'hidden');
    lngElement.value = lng;

    //Lag form
    var form = document.createElement('form');
    form.appendChild(latElement);
    form.appendChild(lngElement);
    form.method = "POST";
    form.action = "oversikt.php";

    document.getElementById('left-content').appendChild(form);
    form.submit();


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

    

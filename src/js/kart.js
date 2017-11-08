// Skrevet av Erlend

var map;

function initMap() {

    readCoordinates();
    var honefoss = {lat: 60.170241, lng: 10.2548533};

    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: honefoss,
      fullscreenControl: false,
      streetViewControl: false
      //mapTypeId: 'satellite'
    });


    var marker = new google.maps.Marker({
      position: honefoss,
      map: map
        //icon: 'resource/cat.jpg'
    });

    var markers = [marker];

    google.maps.event.addListener(map, 'click', function(e) {
        placeMarker(e.latLng, map, markers);
        //writeCoordinates();

    });

    google.maps.event.addListener(marker, 'click', function(e) {
        removeMarker(marker, markers)
        
    });

}

    function writeCoordinates() {
        var writer = new File(["foo"], "../src/XML/coordinates.txt");
        writer.open("w");
        writer.writeln(document.getElementById('lat').value);

        writer.writeln(document.getElementById('lng').value);
        writer.close();

    }

    function readCoordinates() {
        // var response = "/";
        var url = "../src/XML/coordinates.txt";
        var file = new XMLHttpRequest();
        var response;
                
        file.onreadystatechange = function() {
        
            if (file.readyState === XMLHttpRequest.DONE && file.status === 200) {
                response = file.responseText;
                //alert(response);
            }
        }
        //}
        file.open("GET", url, true);
        file.send(null);
        return response;
        

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
    
      
      document.getElementById('lat').value = marker.getPosition().lat();
      document.getElementById('lng').value = marker.getPosition().lng();

    
      submitForm(marker.getPosition().lat(), marker.getPosition().lng());

    //makeTable();
  }

  function submitForm(lat, lng) {
    /*//Lag input for lat
    var latElement = document.getElementById('lat');
    latElement.value = lat;
    
    //Lag input for lng
    var lngElement = document.getElementById('lng');
    lngElement.value = lng;*/

    //Lag form
    //var form = document.createElement('form');
    //form.appendChild(latElement);
    //form.appendChild(lngElement);
    //form.method = "POST";
    //form.action = "oversikt.php";

    //document.getElementById('left-content').appendChild(form);
    var form = document.getElementById('submit');
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

    

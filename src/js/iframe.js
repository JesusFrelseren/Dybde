
function hentPosisjon() {
//alert("test");
var test = window.frames[0].document.getElementById['ng-binding'];
document.getElementById['test-iframe-data'].value = test
}

function initMap() {
    var uluru = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }

  google.maps.event.addListener(map, 'click', function(e) {
    placeMarker(e.latLng, map);
  });

  function placeMarker(position, map) {
    var marker = new google.maps.Marker({
      position: position,
      map: map
    });  
    map.panTo(position);
  }

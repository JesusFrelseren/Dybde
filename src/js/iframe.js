
function hentPosisjon() {
//alert("test");
var test = window.frames[0].document.getElementById['ng-binding'];
document.getElementById['test-iframe-data'].value = test
}

function initMap() {
    var honefoss = {lat: 60.169472, lng: 10.256355};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: honefoss
    });

    var marker = new google.maps.Marker({
      position: honefoss,
      map: map,
      draggable:true
    });

    var markers = [marker];

    google.maps.event.addListener(map, 'click', function(e) {
        placeMarker(e.latLng, map, markers)
    });

}

  /*google.maps.event.addListener(map, 'click', function(e) {
    placeMarker(e.latLng, map);
  });*/



  function placeMarker(position, map, markers) {
    var marker = new google.maps.Marker({
      position: position,
      map: map
    });
    markers.push(marker);
    map.panTo(position);
    document.getElementById('coordinates').value = marker.position;
  }



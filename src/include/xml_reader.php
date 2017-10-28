<?php

function hentData($lat, $long, $place) {
    $reader = simplexml_load_file("http://api.sehavniva.no/tideapi.php?
    tide_request=locationlevels&lang=en%20&lat=$lat&lon=$long&place=$place&refcode=cd&file=xml&flag=obs,astroref");

    return $reader;
}


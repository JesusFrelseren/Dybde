<?php

include("include/xml_reader.php");
?>
<html>
<head>
    <title>Vannstand</title>
    <link rel="stylesheet" href="stylesheet/base.css" type="text/css">
    <link rel="stylesheet" href="stylesheet/map.css" type="text/css">
    <script src="js/iframe.js" defer></script>
    <meta charset="UTF-8">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDN3r-NshxGsptU4UZ_1h7rwz0FtJWaN0&callback=initMap"
  type="text/javascript"></script>


</head>
<body>
    <header>
        <input type="text" id="coordinates" value="(60.169353963123186, 10.256359577178955)">
        <sokefelt>
            <sokeboks>
            <input type="text" name="search" placeholder="Søk etter sted">
            <button>søk</button>
            </sokeboks>
        </sokefelt>
    </header>
    <left-content>
        <table id="data">
            <tbody>
                <tr><th>Middelvann</th><th>Normalnull</th><th>Sjøkartnull</th></tr>
                <tr><td>139 cm</td><td>120 cm</td><td>100 cm</td></tr>
            </tbody>
        </table>
    </left-content>
    <right-content>
    <div id="map"></div>
    
    </right-content>


    <button type="button">Test</button>

</body>
</html>



<!--
Laveste Astronomiske Tidevann (LAT): Den laveste mulige vannstanden uten værets virkning
Høyeste Astronomiske Tidevann (HAT): Den høyeste mulige vannstanden uten værets virkning
Middelvann: Gjennomsnittlig vannstand over en periode på 19 år
Sjøkartnull: Fra 2000 er sjøkartnull LAT
Normalnull 2000: Den grunnleggende mo.h
Middel høyvann: Gjennomsnittene av alle høyvannene over 19 år


-->
<?php

include("include/xml_reader.php");
?>
<html>
<head>
    <title>Vannstand</title>
    <link rel="stylesheet" href="stylesheet/base.css" type="text/css">
    <script src="js/iframe.js" defer></script>
    <meta charset="UTF-8">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDN3r-NshxGsptU4UZ_1h7rwz0FtJWaN0&callback=initMap"
  type="text/javascript"></script>
    
     


</head>
<body>
    <header>
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
            <!-- <?php var_dump(hentData("63.9", "9.4", "")); ?> -->

            </tbody>
        </table>
    </left-content>
    <right-content>
    <div id="map"></div>
    
    </right-content>

    <div id="test-iframe-data">test iframe data</div>
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

    <!--<img src="https://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=600x300&maptype=roadmap
&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318
&markers=color:red%7Clabel:C%7C40.718217,-73.998284
&key=AIzaSyCfm81hV13uZm5GzFcddi_Cm61KHkxZ_xI"> -->
<!--<iframe
  width="600"
  height="450"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAeqhlIrEHILRGSLzGyBYfqTpIWlGWPx78
    &q=Space+Needle,Seattle+WA" allowfullscreen>
</iframe>-->
<?php
    $vanndata = new SimpleXMLElement("kompilert.xml", 2, true);

?>
<html>
<head>
    <title>Vannstand</title>
    <link rel="stylesheet" href="stylesheet/base.css" type="text/css">
    <link rel="stylesheet" href="stylesheet/map.css" type="text/css">
    <link rel="stylesheet" href="stylesheet/table.css" type="text/css">
    <script src="js/kart.js" defer></script>
    <script src="js/table_generation.js" defer></script>
    <script src="js/xml_parser.js" defer></script>
    <meta charset="UTF-8">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDN3r-NshxGsptU4UZ_1h7rwz0FtJWaN0&callback=initMap&libraries=places"
  type="text/javascript"></script>


</head>
<body>
    <header>
        <p id="title">Vannstand</p>
        <input type="text" id="coordinates" formmethod="post" value="fsdfsfsd">
    </header>
    <div id="left-content">

        <section class="depth-statistics">
            <p class="location">Stedsnavn, koordinater</p>
            <table id="data">
                <tbody>
                    <tr><th>Vannstand</th>
                    <th>Middelvann</th>
                    <th>Normalnull</th>
                    <th>Sjøkartnull</th></tr>
                    <tr>
                    <?php
                    var_dump($_POST);
                    foreach($vanndata as $data)
                        echo("<td>$data</td>");
                    ?>
                <tr>
                </tbody>
            </table>
        </section>
</div>
    <div id="right-content">
    <div id="map"></div>
    
    </div>

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
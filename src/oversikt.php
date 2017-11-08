<?php
    include("reader.php");
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

    <?php
    var_dump($_POST);
    echo
    ("
    <form action='oversikt.php' method='post' id='submit'>
    <input type='hidden' id='lat' name='lat' value=".$_POST['lat'].">
    <input type='hidden' id='lng' name='lng' value=".$_POST['lng'].">
    </form>
    "
    );
    
    ?>

    
    <header>
        <p id="title">Vannstand</p>
    </header>
    <div id="left-content">
    <!--<form method="POST" id="hent" action="oversikt.php">
        <input type="text" name="lng" id="lng">
        <input type="text" name="lat" id="lat">
        <input type="submit" value="Submit">

    </form>-->

        <section class="depth-statistics">
            <p class="location"><?php XMLNameReader();?></p>
            <table id="data">
                <tbody>
                    <tr><th>Vannstand</th>
                    <th>Middelvann</th>
                    <th>Normalnull</th>
                    <th>Sjøkartnull</th></tr>
                    <?php XMLReader();?>
                </tbody>
            </table>
        </section>
        <button onclick="alert(readResponse())">Click me</button>
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
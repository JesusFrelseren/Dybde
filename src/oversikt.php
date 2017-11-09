<?php
    include("reader.php");
?>
<html>
<head>
    <title>Vannstand</title>
    <link rel="stylesheet" href="stylesheet/base.css" type="text/css">
    <link rel="stylesheet" href="stylesheet/map.css" type="text/css">
    <link rel="stylesheet" href="stylesheet/table.css" type="text/css">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDN3r-NshxGsptU4UZ_1h7rwz0FtJWaN0&callback=initMap&libraries=places"
            type="text/javascript"></script>
    <script src="js/kart.js" defer></script>
    <script src="js/xml_parser.js" defer></script>
    <meta charset="UTF-8">



</head>
<body>

    <?php
    if(isset($_POST['lng'])) {
        echo
        ("
    <form action='oversikt.php' method='post' id='submit'>
    <input type='hidden' id='lat' name='lat' value=".$_POST['lat'].">
    <input type='hidden' id='lng' name='lng' value=".$_POST['lng'].">
    <input type='hidden' id='zoom' name='zoom' value=".$_POST['zoom'].">
    </form>
    "
        );
    } else {
        echo
        ("
    <form action='oversikt.php' method='post' id='submit'>
    <input type='hidden' id='lat' name='lat' value='58.87022969976571'>
    <input type='hidden' id='lng' name='lng' value='5.752716064453125''>
    <input type='hidden' id='zoom' name='zoom' value='5.752716064453125''>
    </form>
    "
        );
    }

    
    ?>

    
    <header>
        <p id="title">Vannstand</p>
    </header>
    <div id="left-content">


        <section class="depth-statistics">
            <p class="location"><?php XMLNameReader();?></p>
            <h1>Siste Observasjonen</h1>
            <table id="data">
            <?php XMLReader2();?>
            </table>
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
<?php

include("include/xml_reader.php");
?>
<html>
<head>
    <title>Vannstand</title>
    <link rel="stylesheet" href="stylesheet/base.css" type="text/css">
    <meta charset="UTF-8">
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
        <iframe src="http://norgeskart.no/#!?project=seeiendom&layers=1002,1014&zoom=4&lat=6969038.00&lon=350686.00"
            width="500" height="800" id="norgeskart">
        </iframe>
    </right-content>

    <div id="test-iframe-data">test iframe data</div>

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
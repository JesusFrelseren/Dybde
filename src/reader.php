<?php 

//Skrevet av Erlend og Tobias

    if(isset($_POST['lng'])) {
        $lat = $_POST['lat'];
        $lng = $_POST['lng']; 
    } else {
        $lat = 58.87022969976571;
        $lng = 5.752716064453125;
    }
    lagreKilder($lat, $lng);
    $res = genererSammensattXML();
    lagreSammensattXML($res);

    //Henter vannstandsdata og lagrer lokalt
function lagreKilder($lat, $lng) {
    $date = timestamp();
    $clockN = clockNow();
    $clockP = clockPast();

    //Kilde til vannstandsdata
    $url = "http://api.sehavniva.no/tideapi.php?lat=$lat&lon=$lng&fromtime=$date"."T$clockP%3A00&totime=$date"."T$clockN%3A00&datatype=obs&refcode=cd&place=&file=&lang=nn&interval=10&dst=0&tzone=&tide_request=locationdata";
    
    $target = fopen("XML/vannstand.xml", "w");
    $content = file_get_contents($url);
    fwrite($target, $content);
    fclose($target);

    //Kilde til historiske vannstandsdata
    $url = "http://api.sehavniva.no/tideapi.php?tide_request=locationlevels&lang=en%20&lat=$lat&lon=$lng&place=&refcode=cd&file=xml&flag=adm%2Castro%2Creturn";

    $target = fopen("XML/historisk.xml", "w");
    $content = file_get_contents($url);
    fwrite($target, $content);
    fclose($target);
}
 
//Lager sammensatt.xml (se merge.xsl)
function genererSammensattXML() {
    

    //vanndata.xml er template-filen for merge.xsl
    $output = new DOMDocument();
    $output->load("XML/vanndata.xml");
    
    $xsldoc = new DOMDocument();
    $xsldoc->load("XML/merge.xsl");        
    
    $xslt = new XSLTProcessor();
    $xslt->importStyleSheet($xsldoc);
    
    try {
        return $xslt->transformToXML($output);
    } catch (Exception $e) {
        echo("Prøv igjen");
        return null;
    }

    $external = fopen("XML/historisk.xml", "w");
    fwrite($external, "");
}
     
function lagreSammensattXML($res) {
    //åpner fil for skrivning 
    $fil = fopen("sammensatt.xml", "w");
    fwrite($fil, $res);
    fclose($fil);
}
    
//Skrevet av Gabriel, kontrollert av Erlend
    function XMLNameReader()
    {
        $url = "sammensatt.xml";
        $sxml = simplexml_load_file($url);
        if(isset($sxml->tide->locationlevel )){
            try {
                foreach ($sxml->tide->locationlevel->location as $data) {
                    $sted = $data["name"];
                    $latitude = $data["latitude"];
                    $longitude = $data["longitude"];
                    echo($sted . "    Koordinater: " . $latitude . " , " . $longitude);
                    }

                } catch (Exception $e) {
                    echo("Intet");
                }
            }
    }
    //skrevet av Gabriel og Robert
    //henter historisk data og legger det inn i tabellen.
    function XMLReader(){
        $url = "sammensatt.xml";
        $sxml = simplexml_load_file($url);
        $LAT="";
        $HAT="";
        $Middelvann="";
        $Sjøkartnull="";
        $Normalnull="";
        if(isset($sxml->tide->locationlevel->reflevel )){
            try {
                foreach ($sxml->tide->locationlevel->children() as $data) {
                    if ($data["code"] == "HAT") {
                        $HAT = $data["value"];
                    }
                    if ($data["code"] == "MSL") {
                        $Middelvann = $data["value"];
                    }
                    if ($data["code"] == "NN2000") {
                        $Normalnull = $data["value"];
                    }
                    if ($data["code"] == "LAT") {
                        $LAT = $data["value"];
                    }
                    if ($data["code"] == "CD") {
                        $Sjøkartnull = $data["value"];
                    }
                }
                echo('<tr><td>' . $HAT . ' cm</td><td>' . $Middelvann . ' cm</td><td>' . $Normalnull . ' cm</td><td>' . $LAT . ' cm</td></tr>');
                echo("</tbody>");
                echo("</table>");
            } catch(Exception $e) {
                echo("Intet");
            }
            }else{
                echo("</tbody>");
                echo("</table>");
                echo"Ingen data for disse koordinatene";
            }
       }
    //skrevet av Gabriel
    //Lager en tabell og henter data fra observasjons dataen fra xml dokumentet.
    function XMLReader2(){
        echo("<tbody><tr><th>Vannstand</th><th>Klokka</th></tr>");
        $url2 = "sammensatt.xml";
        $sxml2 = simplexml_load_file($url2);
        if(isset($sxml2->tide[1]->locationdata->data->waterlevel )){
            
            if($sxml2->tide[1]->locationdata->data["type"]=="observation"){

            try {
                foreach ($sxml2->tide[1]->locationdata->data->waterlevel as $data2) {
                    $date = date_create($data2["time"]);
                    $dateFormatted = date_format($date, 'H:i');
                    echo("<tr><td>".$data2["value"]." cm</td><td>".$dateFormatted."</td></tr>");
                }
                } catch(Exception $e) {
                    echo("Intet");
                }
                }else{
                    echo("</table>");
                    echo"Ingen data for disse koordinatene";
            
                }
                }else{
                    echo("</table>");
                    echo"Ingen data for disse koordinatene";
                }
                echo("</table>");
                echo("</tbody>");
    }
    
    // skrevet av Tobias, kontrolert av Gabriel
    //timestamp for dato og klokkeslett pluss/minus 3 timer
    function timestamp(){
        $date = new DateTime();
        $res1 = $date->format('Y-m-d');
        return $res1; 
    }
    function clockNow(){
        $clockN = new DateTime();
        $clockN->modify('+3 hours');
        $res2 = $clockN->format("H");
        return $res2;
    }
    function clockPast(){
        $clockP = new DateTime();
        $clockP->modify('-3 hours');
        $res3 =$clockP->format("H");
        return $res3;
    }
?>
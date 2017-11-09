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

    //$url = "api.sehavniva.no/tideapi.php?lat=$lat&lon=$lng&fromtime=$time"."T$pastClock%3A00&totime=
    //$time"."T$clock%3A00&datatype=all&refcode=cd&place=&file=&lang=nn&interval=10&dst=0&tzone=&tide_request=locationdata";
    $url = "http://api.sehavniva.no/tideapi.php?tide_request=locationlevels&lang=en%20&lat=$lat&lon=$lng&place=&refcode=cd&file=xml&flag=adm%2Castro%2Creturn";
    
    $external = fopen($url, "r");
    $target = fopen("XML/vannstand.xml", "w");
    $content = fread($external, 8192);
    fwrite($target, $content);

    //Henter og lagrer historiske vannstandsdata
    $url = "http://api.sehavniva.no/tideapi.php?tide_request=locationlevels&lang=en%20&lat=$lat&lon=$lng&place=&refcode=cd&file=xml&flag=adm%2Castro%2Creturn";
    $external = fopen($url, "r");
    $target = fopen("XML/historisk.xml", "w");
    $content = fread($external, 8192);
    fwrite($target, $content);
}

    //
function genererSammensattXML() {
    
    //Append XML-dokumentet sin root-node
    $output = new DOMDocument();
    $output->load("XML/vanndata.xml");
    
    $xsldoc = new DOMDocument();
    $xsldoc->load("XML/merge.xsl");        
    
    $xslt = new XSLTProcessor();
    $xslt->importStyleSheet($xsldoc);
    return $xslt->transformToXML($output);
}

     
function lagreSammensattXML($res) {
    //åpner fil for skrivning 
    $fil = fopen("sammensatt.xml", "w");
    fwrite($fil, $res);
    fclose($fil);
}
    

//Skrevet av Gabriel
    function XMLNameReader()
    {
        $url = "sammensatt.xml";
        $sxml = simplexml_load_file($url);
        $i = 1;

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

    function XMLReader(){
        $url = "sammensatt.xml";
        $sxml = simplexml_load_file($url);
        $LAT="";
        $HAT="";
        $Middelvann="";
        $Sjøkartnull="";
        $Normalnull="";

        try {
            foreach ($sxml->tide->locationlevel->children() as $data) {
                if ($data["code"] == "HAT") {
                    $HAT = $data["value"];
                }
                if ($data["code"] == "MHW") {
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
        } catch(Exception $e) {
            echo("Intet");
        }
       }

    function timestamp(){
        $date = new DateTime();
        echo($date->format("Y-m-d"));
    }
    function clockNow(){
        $clockN = new DateTime();
        echo($clockN->format("H"));
    }
    function clockPast(){
        $clockP = new DateTime();
        $clockP->modify('-3 hours');
        echo($clockP->format("H"));
    }
?>
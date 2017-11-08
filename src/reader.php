<?php 
 
 if(isset($_POST)) {
    var_dump($_POST);
    //63.9
    //9.3
    if(isset($_POST['lat'])) {
        $lat = $_POST['lat'];
        $lng = $_POST['lng'];    
        lagreKilder($lat, $lng);
    }

    $lat = 68;
    $lng = 10;
    
    $res = genererSammensattXML();
    echo($res);
    lagreSammensattXML($res);
 }

function lagreKilder($lat, $lng) {

    //Henter og lagrer vannstandsdata
    $url = "http://api.sehavniva.no/tideapi.php?tide_request=locationlevels&lang=en%20&lat=$lat&lon=$lng&place=Egersund&refcode=cd&file=xml&flag=adm%2Castro%2Creturn";
    $url = "XML/vannstand.xml";
    
    $external = fopen($url, "r");
    $target = fopen("XML/vannstand.xml", "w");
    $content = fread($external, 8192);
    fwrite($target, $content);

    //Henter og lagrer historiske vannstandsdata
    $url = "http://api.sehavniva.no/tideapi.php?tide_request=locationlevels&lang=en%20&lat=$lat&lon=$lng&place=Egersund&refcode=cd&file=xml&flag=adm%2Castro%2Creturn";
    $url = "XML/historisk.xml";
    $external = fopen($url, "r");
    $target = fopen("XML/historisk.xml", "w");
    $content = fread($external, 8192);
    fwrite($target, $content);
}

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
    $fil = fopen("XML/sammensatt.xml", "w");
    fwrite($fil, $res);
    fclose($fil);
}
    
/*
    // masse
    $url = "XML/sammensatt.xml";
    $sxml = simplexml_load_file($url);

    foreach($sxml->locationlevel->children() as $noe){
        if($noe["code"] == "LAT"){
            $value = $noe["value"];
            
        }
        
    }*/
    function XMLReader(){
        $url = "sammensatt.xml";
        $sxml = simplexml_load_file($url);
        $LAT="";
        $HAT="";
        $Middelvann="";
        $Sjøkartnull="";
        $Normalnull="";

           foreach($sxml->tide->locationlevel->children() as $data){
               if($data["code"] == "HAT"){
                   $HAT = $data["value"]; 
               }
                if($data["code"] == "MHW"){
                            $Middelvann = $data["value"]; 
                        }
                if($data["code"] == "NN2000"){
                            $Normalnull = $data["value"]; 
                        }
                if($data["code"] == "LAT"){
                            $LAT = $data["value"]; 
                        }
                if($data["code"] == "CD"){
                            $Sjøkartnull = $data["value"]; 
                        }    
            
                    }
                    echo('<tr><td>'.$HAT.' cm</td><td>'.$Middelvann.' cm</td><td>'.$Normalnull.' cm</td><td>'.$LAT.' cm</td></tr>');
       }
?>
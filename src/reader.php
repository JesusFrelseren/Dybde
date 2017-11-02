<?php 
    $output = new DOMDocument();
    $output->load("../XML/vanndata.xml");
    $xsldoc = new DOMDocument();
    $xsldoc->load("../XML/merge.xsl");
    
    $xslt = new XSLTProcessor();
    $xslt->importStyleSheet($xsldoc);
    $xslresultat = $xslt->transformToXML($output);
    
    //Skriv til fil
    $fil = fopen("../XML/sammensatt.xml", "w");
    fwrite($fil, $xslresultat);
    fclose($fil);

    // masse
    $url = "../xml/sammensatt.xml";
    $sxml = simplexml_load_file($url);

    foreach($sxml->locationlevel->children() as $noe){
        if($noe["code"] == "LAT"){
            $value = $noe["value"];
            
        }
        
    }

?>
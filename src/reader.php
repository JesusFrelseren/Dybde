<?php 
    /*$root = '<root></root>';
    $domdoc = new DOMDocument();
    $vannstand = new DOMDocument();
    $domdoc->loadXML($root);

    //Load kilde historisk

    $vannstand->load("../XML/historisk.xml");
    $vannstand2 = $domdoc->importNode($vannstand->firstChild, true);
    $domdoc->firstChild->appendChild($vannstand2);


    //Load kilde vannstand
    $vannstand->load("../XML/vannstand.xml");
    $vannstand2 = $domdoc->importNode($vannstand->firstChild, true);
    $domdoc->firstChild->appendChild($vannstand2);

    
    echo($domdoc->save("sammensatt.xml"));
*/

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

?>
<?php

    function tilFil(){
        $dom = new DOMDocument();
        $dom->load('http://api.sehavniva.no/tideapi.php?lat=68.79833&lon=16.54165&fromtime=2017-10-27T00%3A00&totime=2017-10-28T00%3A00&datatype=all&refcode=cd&place=Harstad&file=&lang=nn&interval=10&dst=0&tzone=&tide_request=locationdata');
    
        $dom->save('testdata.xml')
    }
    
?>
<?php

include('config.php');
include('filters.php');
include('database.php');
include('translit.php');
include('makeurl.php');

//print "var aaaa=\"asdasd\";";
if (isset($_GET["longurl"])) {
    //   print "var error=\"\"; ";
    $longurl = $_GET["longurl"];
    $tinyurl = urlfilter($longurl);

    if (!validateurl($tinyurl)) {
        $tinyurl = "Неправильный адрес";
    } else {
        $tinyurl = mysql_real_escape_string($tinyurl);
        $tinyurl = makeTinyURL();
        $timestamp = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
        $ip = "127.0.0.1";
        $ref = "localhost";

        #$tinyurl = "http://" . SITE_DOMAIN . "/" . $tinyurl;
        
        $longurl = mysql_real_escape_string($longurl);

        writeurl($timestamp, $ip, $ref, $tinyurl, $longurl);
    }



    #print ($tinyurl);
    //$tinyurl= makeurl2();
    //$tinyurl = base36_encode($tinyurl);
    //print "var smallurl=\"".$tinyurl."\"; ";
    $tinyurl = "http://" . SITE_DOMAIN . "/" . $tinyurl;
    print "{\"smallurl\": \"" . $tinyurl . "\" }";
}
?>

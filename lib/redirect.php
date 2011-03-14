<?php
include('config.php');
include('filters.php');
include('database.php');

#print ("redirect<br>");
$r=$_GET['r'];

//if(!preg_match("~^[a-z0-9]+$~",$r)) {die();}
$tinyurl = urlfilter($r);
$tinyurl = mysql_real_escape_string($tinyurl);
#print $tinyurl;
#print geturl($tinyurl);
$longurl= geturl($tinyurl);

if(!$longurl) $longurl=SITE_URL."/";

header("Location: $longurl");
//exit;
?>
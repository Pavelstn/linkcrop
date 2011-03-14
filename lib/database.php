<?php


$link = mysql_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS);
if (!$link) {
    #die('Not connected : ' . mysql_error());
}

// make foo the current db
$db_selected = mysql_select_db(DATABASE_NAME, $link);
if (!$db_selected) {
    #die ('Can\'t use foo : ' . mysql_error());
}


function writeurl($timestamp,$ip,$ref,$tinyurl,$longurl){
    mysql_query("INSERT INTO  link(timestamp,ip,ref,tinyurl,longurl)  values('$timestamp','$ip','$ref','$tinyurl','$longurl')");
}

function geturl($tinyurl){
    $req=mysql_query("SELECT longurl FROM link WHERE tinyurl='$tinyurl' LIMIT 1");
    if(mysql_num_rows($req)>0){
        $r=mysql_fetch_row($req);
        $longurl=htmlspecialchars($r[0],ENT_QUOTES);
    }else {
        $longurl= false;
    }
    return ($longurl);
}

?>

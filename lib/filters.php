<?php

function urlfilter($url) {
    if (get_magic_quotes_gpc ()) {
        $url = stripslashes($url);
    }
    $url = trim($url);
    return $url;
}

function validateurl($url) {
    if (($url == '') || !preg_match("~^(http|ftp)\://.+$~i", $url) || preg_match("~^http\://(www\.)?" . quotemeta(SITE_DOMAIN) . "~i", $url)) {
       // print "error= \"<b>Ошибка</b>: URL пустой либо начинается не с http:// (ftp://)<br>   также запрещено добавлять адреса начинающиеся с названия данного сайта\";";
        return FALSE;
    } else {
        return TRUE;
    }
}

function base36_encode($num) {
    if ($num < 10)
        return strval($num);
    elseif ($num < 36)
        return chr(ord('a') + $num - 10);
    else
        return (base36_encode((int) ($num / 36)) . base36_encode($num % 36));
}



?>


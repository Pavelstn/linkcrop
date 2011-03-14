<?php

function makeurl1($string) {
    //попробует посчитать  md5 хеш убрать из него все буквы
    //добавить рандом и тайместамп
    $strok = md5($string);
    $digit = preg_replace('/[A-Za-z\-]/', '', $strok);
    return $digit;
}

function makeurl2($length=6, $strength=4) {
    $vowels = 'aeuy';
    $consonants = 'bdghjmnpqrstvz';
    if ($strength & 1) {
        $consonants .= 'BDGHJLMNPQRSTVWXZ';
    }
    if ($strength & 2) {
        $vowels .= "AEUY";
    }
    if ($strength & 4) {
        $consonants .= '1234567890';
    }
    if ($strength & 8) {
        $consonants .= '@#$%';
    }

    $password = '';
    $alt = time() % 2;
    for ($i = 0; $i < $length; $i++) {
        if ($alt == 1) {
            $password .= $consonants[(rand() % strlen($consonants))];
            $alt = 0;
        } else {
            $password .= $vowels[(rand() % strlen($vowels))];
            $alt = 1;
        }
    }
    return $password;
}

function existURL($url) {
    $xurl = mysql_real_escape_string($url);
    $req = mysql_query("SLECT tinyurl, longurl  FROM link WHERE longurl='$xurl'");
    if (mysql_num_rows($req) == 0) {
        return false;
    } else {
        $r=mysql_fetch_row($req);
        $id=$r[0];
    }
}

function makeTinyURL($longurl) {
    $url= existURL($longurl);
    if($url){
        return $url;
    } else {
        return makeurl2();
    }
}
?>

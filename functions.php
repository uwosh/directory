<?php

function getUserIPAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function isIPFromUWO($ip){
    $IPExploded = explode('.', $ip);
    if($IPExploded[0] == "141" && $IPExploded[1] == "233"){
        $isIPFromUWO = true;
    } else{
        $isIPFromUWO = false;
    }
    return $isIPFromUWO;
}
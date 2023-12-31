<?php

/**
 * 
 * 
 * Přesměrovává (REDIRECT) na zadanou url adresu 
 * 
 * @param string $path - adresa na kterou se má přesměrovat
 * 
 * @return void 
 * 
 */

function redirectUrl($path){
    if (isset($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] != "off") {
        $url_protocol = "https";
    } else {
        $url_protocol = "http";
    }


    // localhost = $_SERTVER["HTTP_HOST"]
   
    // header("location: jeden-zak.php?id=$id");
    header("location: $url_protocol://" . $_SERVER["HTTP_HOST"] . $path);
}
<?php 

function redirectUrl ($path) {
    if(isset($_SERVER["HTTPS"]) and isset($_SERVER["HTTPS"]) != "off") {
        $url_protocol = "HTTPS";
    } else {
        $url_protocol = "HTTP";
    }
    header("Location: $url_protocol://". $_SERVER['HTTP_HOST'] .$path);
}

?>
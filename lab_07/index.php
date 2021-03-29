<?php 
$transCookie = "ctransient";
$myCookie = "Mariano";
setcookie($transCookie, $myCookie);
if (!isset($_COOKIE[$transCookie])) {
    echo "There is no cookie named ", $transCookie;
} else {
    echo "Cookie '", $transCookie, "' = '", $myCookie, "'";
}

$persShortCookie = "ShortTimeCount";
setcookie($persShortCookie, 0, time()+120);
?>

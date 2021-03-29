<?php 
$transCookie = "ctransient";
$myCookie = "Mariano";
setcookie($transCookie, $myCookie);
if (!isset($_COOKIE[$transcookie])) {
    echo "There is no cookie named ", $transCookie;
} else {
    echo "Cookie '", $transCookie, "' = '", $myCookie, "'";
}

$persShortCookie = "ShortTimeCount";
setcookie($persShortCookie, time() + 120 );
?>

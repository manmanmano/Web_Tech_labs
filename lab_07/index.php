<?php 
$transCookie = "ctransient";
$myCookie = "Mariano";
setcookie($transCookie, $myCookie);
if (!isset($_COOKIE[$transCookie])) {
    echo $transCookie, ' = FALSE';
    echo "<br>";
} else {
    echo $transCookie, ' = TRUE';
    echo "<br>";
}

$persShortCookie = "ShortTimeCount";
setcookie($persShortCookie, 0, time()+120);
if (!isset($_COOKIE[$persShortCookie])) {
    echo $persShortCookie, ' = FALSE';
    echo "<br>";
} else {
    echo $persShortCookie, ' = TRUE';
    echo "<br>";
}

$persLongCookie = "LongTimeCount";
setcookie($persLongCookie, 0, time()+3600);
if (!isset($_COOKIE[$persLongCookie])) {
    echo $persLongCookie, ' = FALSE';
    echo "<br>";
} else {
    echo $persLongCookie, ' = TRUE';
    echo "<br>";
}
?>

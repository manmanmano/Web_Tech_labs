<?php 
$transCookie = "ctransient";
$myCookie = "Mariano";
setcookie($transCookie, $myCookie);
if (!isset($_COOKIE[$transCookie])) {
    echo $transCookie, ' = FALSE', PHP_EOL;
} else {
    echo $transCookie, ' = TRUE', PHP_EOL;
}

$persShortCookie = "ShortTimeCount";
setcookie($persShortCookie, 0, time()+120);
if (!isset($_COOKIE[$persShortCookie])) {
    echo $persShortCookie, ' = FALSE', PHP_EOL;
} else {
    echo $persShortCookie, ' = TRUE', PHP_EOL;
}

$persLongCookie = "LongTimeCount";
setcookie($persLongCookie, 0, time()+3600);
if (!isset($_COOKIE[$persLongCookie])) {
    echo $persLongCookie, ' = FALSE', PHP_EOL;
} else {
    echo $persLongCookie, ' = TRUE', PHP_EOL;
}
?>

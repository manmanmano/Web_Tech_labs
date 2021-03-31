<?php
$cookieName = "ctransient";
$cookieValue = "Mariano";

if (!isset($_COOKIE[$cookieName])) {
    echo "There is no cookie named ", $cookieName, "<br>";
} else {
    echo $cookieName, ' = ', $cookieValue, "<br>";
}

if (isset($_COOKIE['ShortTimeCount'])) {
    $shortCount = $_COOKIE['ShortTimeCount'] + 1;
    echo "ShortTimeCount = ", $shortCount, "<br>";
} else {
    $shortCount = 1;
    echo "ShortTimeCount = ", $shortCount, "<br>";
}

if (isset($_COOKIE['LongTimeCount'])) {
    $longCount = $_COOKIE['LongTimeCount'] + 1;
    echo "LongTimeCount = ", $longCount, "<br>";
} else {
    $longCount = 1;
    echo "LongTimeCount = ", $longCount, "<br>";
}

setcookie($cookieName, $cookieValue, ['path' => '/~madang/']);
setcookie('ShortTimeCount', $shortCount, time()+120, '~/madang/');
setcookie('LongTimeCount', $longCount, time()+3600, '~/madang/');
?>

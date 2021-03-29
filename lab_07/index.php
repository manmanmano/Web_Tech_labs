<?php 
$cookieName = "ctransient";
$cookieValue = "Mariano";

if (!isset($_COOKIE[$cookieName])) {
    echo "There is no cookie named ", $cookieName, "<br>";
} else {
    echo $cookieName, ' = ', $cookieValue, "<br>";
}

if (isset($_COOKIE['ShortTimeCount'])) {
    $accessCount = $_COOKIE['ShortTimeCount'] + 1;
    echo "ShortTimeCount = ", $accessCount, "<br>";
} else {
    $accessCount = 1;
    echo "ShortTimeCount = ", $accessCount, "<br>";
}

if (isset($_COOKIE['LongTimeCount'])) {
    $accessCount = $_COOKIE['LongTimeCount'] + 1;
    echo "LongTimeCount = ", $accessCount, "<br>";
} else {
    $accessCount = 1;
    echo "LongTimeCount = ", $accessCount, "<br>";
}

setcookie($cookieName, $cookieValue);
setcookie('ShortTimeCount', $accessCount, time()+120);
setcookie('LongTimeCount', $accessCount, time()+3600);
?>

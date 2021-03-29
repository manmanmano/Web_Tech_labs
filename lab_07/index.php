<?php 
$cookieName = "ctransient";
$cookieValue = "Mariano";
setcookie($cookieName, $cookieValue);
if (!isset($_COOKIE[$cookieName])) {
    echo "There is no cookie named ", $cookieName, "<br>";
} else {
    echo $cookieName, ' = ', $cookieValue, "<br>";
}
?>

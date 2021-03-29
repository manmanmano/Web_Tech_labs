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

setcookie($cookieName, $cookieValue);
setcookie('ShortTimeCount', $shortCount, time()+120);
setcookie('LongTimeCount', $longCount, time()+3600);
?>

<!DOCTYPE html>                                                                    
<html lang="en">                                                                   
<head>                                                                             
    <meta charset="utf-8">                                                         
    <title>Index</title>                                                           
</head>                                                                            
<body>                                                                             
    <br>
    <form action="#" method="POST" id="data">                                      
    <label for="pwd">PIN:</label>                                                  
    <input type="password" name="password" minlength="4" maxlength="8"             
        required placeholder="Insert a PIN of 4-8 symbols">                        
    <input type="submit" name="submit" required placeholder="Log in">              
    </form>                                                                        
</body>                                                                            
</html> 

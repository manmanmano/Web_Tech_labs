<!DOCTYPE html>                                                                 
<html lang="en">                                                                
<head>                                                                          
    <meta charset="utf-8">                                                      
    <title>Index</title>                                                        
</head>                                                                         
<body>                                                                          
    <br><br>                                                                    
    <form action="#" method="POST" id="data">                        
    <label for="pwd">PIN:</label>                                               
    <input type="password" name="password" minlength="4" maxlength="8"          
        required placeholder="Insert a PIN of 4-8 symbols">                     
    <input type="submit" name="submit" value="Log in">                          
    </form>                                                                     
</body>                                                                         
</html>    

<?php
include_once('sessions.php');
if (isset($_GET['submit'])) {
    
    if (strlen($_GET['password']) < 4 && strlen($_GET['password']) > 8) {
        die("INVALID INPUT!");
    }
    
    if (!strcmp($_GET['password'], "m@m@M14")) {
        echo "Log in successful! <br>";
        startSession("Mariano", "20", "Tallinn");
        
    } else {
        echo "Incorrect PIN, plese retry.";
    }

}
?>

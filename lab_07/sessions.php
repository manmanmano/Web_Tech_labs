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

function establishSession($name, $age, $location) {
    
}

if (isset($_POST['submit'])) {
    
    if (strlen($_POST['password']) < 4 && strlen($_POST['password']) > 8) {
        die("INVALID INPUT!");
    }
    
    if (!strcmp($_POST['password'], "m@m@M14")) {
        echo "Log in successful!";
        establishSession("Mariano", 20, "Tallinn");
    } else {
        echo "Incorrect PIN, plese retry.";
    }

}
?>

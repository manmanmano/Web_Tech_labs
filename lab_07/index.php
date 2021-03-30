<?php
include_once('cookies.php');                                                                           
                                                                                
if (strlen($_GET['password']) < 4 && strlen($_GET['password']) > 8) {          
    die('INVALID INPUT!');                                                  
}                                                                           
                                                                                
if (!strcmp($_GET['password'], '123456')) {                                 
    session_name("Mariano");                                                
    session_start();                                                        
    echo "<br>";                                                            
    if (!isset($_SESSION['name']) && !isset($_SESSION['age']) &&            
        !isset($_SESSION['location']) && !isset($_SESSION['counter'])) {    
        $_SESSION['name'] = 'Mariano';                                      
        $_SESSION['age'] = 20;                                              
        $_SESSION['location'] = 'Tallinn';                                  
        $_SESSION['counter'] = 1;                                           
    }                                                                       

}                                                                           
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
</head>
<body>
    <br><br>
    <form action='index.php' method='GET' id='access'>
        <label for='pwd'>PIN:</label>
        <input type='password' name='password' minlength='4' maxlength='8'
            required placeholder='Insert a PIN of 4-8 symbols'>
        <input type='submit' name='submit' value='Log in'>
    </form>
</body>
</html>

<?php
if (isset($_GET['submit'])) {
    session_name("Mariano");
    session_start();
    if (isset($_SESSION['name']) && !isset($_SESSION['age']) &&
        isset($_SESSION['location']) && isset($_SESSION['counter'])) {
        $_SESSION['name'] = "Mariano";
        $_SESSION['age'] = 20;
        $_SESSION['location'] = "Tallinn";
        echo "Name of the user: ", $_SESSION['name'], "<br>";
        echo "Age of the user: ", $_SESSION['age'], "<br>";
        echo "Location of the user: ", $_SESSION['location'], "<br>";
        echo "<br> Session number ", $_SESSION['counter']++;
        echo "<br><a href='reset.php'>Reset the session counter here</a><br>";
        echo "<br>
            <form action='#' method='GET'>
                <input type='submit' value='Log out' name='logout'>
            </form>";
        if (isset($_GET['logout'])) {
            session_unset();
            session_destroy();
        } 
    } else {
        $_SESSION['counter'] = 1;
    }
}
?>

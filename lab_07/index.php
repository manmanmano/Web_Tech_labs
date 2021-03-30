<?php
include_once('cookies.php');
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

if (strlen($_GET['password']) < 4 && strlen($_GET['password']) > 8) {
    die('INVALID INPUT!');
}

if (!strcmp($_GET['password'], '123456')) {
    session_name("Mariano"); 
    session_start();
    echo "Log in successful! <br>";
    $_SESSION['name'] = 'Mariano';
    $_SESSION['age'] = 20;
    $_SESSION['location'] = 'Tallinn';
    echo "<br>";
} 

if (isset($_GET['submit']) && strcmp($_GET['password'], '123456') != 0) {
    echo 'Incorrect password, please try again.';
}

session_name("Mariano");
session_start();
if (isset($_SESSION['name']) && isset($_SESSION['age']) &&
    isset($_SESSION['location'])) {
    echo "Name of the user: ", $_SESSION['name'], "<br>";
    echo "Age of the user: ", $_SESSION['age'], "<br>";
    echo "Location of the user: ", $_SESSION['location'], "<br>";
    echo "<br>Session number ", ++$_SESSION['counter'];
    echo "
        <br><a href='reset.php'>Reset the session counter here</a><br><br>
        <form action='index.php' method='GET' id='toone'>
            <input type='submit' value='Log out' name='logout'>
        </form> ";
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
    }
}

?>


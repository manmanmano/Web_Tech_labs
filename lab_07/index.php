<?php
include_once('cookies.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Index</title>
</head>
<body>
    <br><br>
    <form action="#" method="GET" id="data">
    <label for="pwd">PIN:</label>
    <input type="password" name="password" minlength="4" maxlength="8"
        required placeholder="Insert a PIN of 4-8 symbols">
    <input type="submit" name="submit" value="Log in">
    </form>
</body>
</html>

<?php

function startSession($name, $age, $location) {
    session_name("Mariano");
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['age'] = $age;
    $_SESSION['location'] = $location;
#    $_SESSION['sessionCounter'] = 1;
    echo "<br>";
    if (isset($_SESSION['name']) && isset($_SESSION['age']) && isset($_SESSION['location'])) {
        echo "Name of the user: ", $_SESSION['name'], "<br>";
        echo "Age of the user: ", $_SESSION['age'], "<br>";
        echo "Location of the user: ", $_SESSION['location'], "<br>";
    } else {
        echo "No data <br>";
    }
    if (isset($_SESSION['sessionCounter'])) {
        echo "<br>Session number ", $_SESSION['sessionCounter']++;
    } else {
        $_SESSION['sessionCounter'] = 1;
    }
    echo "<br><a href='reset.php'>Reset the session counter here</a><br>";
    echo "<br>
        <form action='#' method='GET'>
        <input type='submit' value='Log out' name='logout'>
        </form>
        ";
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
    }
}

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


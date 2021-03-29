<?php
function startSession($name, $age, $location) {
    session_name("UserInterface");
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
    echo "
        <form action='index.php' method='GET'>
        <input type='submit' value='Log out' name='logout'>
        </form>
        ";
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
    }
}
?>

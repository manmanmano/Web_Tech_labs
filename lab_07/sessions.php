<?php
function startSession($name, $age, $location) {
    session_name("UserInterface");
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['age'] = $age;
    $_SESSION['location'] = $location;
    echo "Name of the user: ", $_SESSION['name'], "<br>";
    echo "Age of the user: ", $_SESSION['age'], "<br>";
    echo "Location of the user: ", $_SESSION['location'], "<br>";
    if (isset($_SESSION['name']) && isset($_SESSION['age']) 
        && isset($_SESSION['location'])) {

    }

}
?>

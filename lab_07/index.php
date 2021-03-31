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
    <form action='index.php' method='POST' id='access'>
        <label for='pwd'>PIN:</label>
        <input type='password' name='password' minlength='4' maxlength='8'
            required placeholder='Insert a PIN of 4-8 symbols'>
        <input type='submit' name='submit' value='Log in'>
    </form>
</body>
</html>

<?php
session_start();   

if (strlen($_POST['password']) < 4 && strlen($_POST['password']) > 8) {
    die('INVALID INPUT!');
}

session_set_cookie_params(['path' => '/~madang/']);
if (!strcmp($_POST['password'], '123456')) {
    echo "Log in successful! <br>";
    $_SESSION['name'] = 'Mariano';
    $_SESSION['age'] = 20;
    $_SESSION['location'] = 'Tallinn';
    echo "<br>";
} 

if (isset($_POST['submit']) && strcmp($_POST['password'], '123456') != 0) {
    echo 'Incorrect password, please try again.';
}

if (isset($_SESSION['name']) && isset($_SESSION['age']) &&
    isset($_SESSION['location'])) {
    echo "Name of the user: ", $_SESSION['name'], "<br>";
    echo "Age of the user: ", $_SESSION['age'], "<br>";
    echo "Location of the user: ", $_SESSION['location'], "<br>";
    echo "<br>Session number ", ++$_SESSION['counter'];
    echo "
        <br><a href='reset.php'>Reset the session counter here</a><br><br>
        <form action='#' method='POST' id='toone'>
            <input type='submit' value='Log out' name='logout'>
        </form> ";
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("refresh:0; url=index.php");
    }
}

?>

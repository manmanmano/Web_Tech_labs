<?php
session_start();
session_set_cookie_params(['path' => '/~madang/']);
if (isset($_SESSION['counter'])) {
    echo "Your session is active.<br>";
    if (isset($_POST['reset'])) {
        $_SESSION['counter'] = 1;
        echo "Session number ", $_SESSION['counter'];
    } else {
        echo "Session number ", $_SESSION['counter']++;
    }
} else {
    echo "Your session is not active anymore.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reset button</title>
</head>
<body>
    <form action='#' method="POST">
        <input type="submit" name="reset" value="reset">
    </form>
    <a href="index.php">Back to index</a>
</body>
</html>

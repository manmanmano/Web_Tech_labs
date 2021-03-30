<?php
session_name("Mariano");
session_start();
if (isset($_SESSION['counter'])) {
    echo "Your session is active.<br>";
    if (isset($_GET['reset'])) {
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
    <form action='reset.php' method="GET">
        <input type="submit" name="reset" value="reset">
    </form>
    <a href="index.php">Back to index</a>
</body>
</html>

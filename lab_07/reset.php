<?php
session_name("Mariano");
session_start();
echo "Session number ", $_SESSION['sessionCounter']++;
if (isset($_GET['reset'])) {
    $_SESSION['sessionCounter'] = 1;
    echo "<br>Couter reset successful!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reset button</title>
</head>
<body>
    <form action='#' method="GET">
        <input type="submit" name="reset" value="reset">
    </form>
    <a href="index.php">Back to index</a>
</body>
</html>

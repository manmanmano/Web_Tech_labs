<?php
if (isset($_SESSION['sessionCounter'])) {
    if (isset($_GET['reset'])) {
        $_SESSION['sessionCounter'] = 1;
        echo "Session number ", $_SESSION['sessionCounter']++;
    } else {
        echo "Session number ", $_SESSION['sessionCounter']++;
    }
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

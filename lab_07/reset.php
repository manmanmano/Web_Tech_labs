<?php
session_set_cookie_params(['path' => '/~madang/Web_Technologies/lab_07/']);
session_start();
$sessionNumber = 0;
$active = "";
if (isset($_SESSION['counter'])) {
    $active = "Your session is active.";
    
    if (isset($_POST['reset'])) {
        $sessionNumber = 1; 
        $_SESSION['counter'] = $sessionNumber;
    } else {
        $sessionNumber = $_SESSION['counter']++;
    }

} else {
    $active = "Your session is not active anymore.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reset button</title>
</head>
<body>
    <?php echo $active?>
    <br>Session number
    <?php echo $sessionNumber?><br>
    <form action='#' method="POST">
        <input type="submit" name="reset" value="reset">
    </form>
    <a href="index.php">Back to index</a>
</body>
</html>

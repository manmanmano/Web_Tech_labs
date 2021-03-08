<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="styles/nice.css">
</head>
<body>
    <a href="register.php">Back to the main page</a>
    <h1>Welcome to the download page!</h2>
</body>
</html>

<?php
$nEntries = 0;
$arr = file('data.csv');
$nEntries = count($arr);
echo 'There are ' . $nEntries . ' entries in the file.<br>';
echo '<a href="data.csv">Click here</a> to download the file and see all the entries.' . PHP_EOL;
?>


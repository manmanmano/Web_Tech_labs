<?php

require_once "dbconnection_data.php";

$link = mysqli_connect($server, $user, $password, $database);
if (!$link) 
    die("Connection to DB failed: " . mysqli_connect_error());
else 
    echo "Connection to DB successful!";


?>

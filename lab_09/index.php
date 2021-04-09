<?php

include_once "dbconnection_data.php";

function listCourses($result, $query) {
    if (mysqli_num_rows($result) > 0) {
        echo "<pre>";
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            printf("%s\t %s\t %s<br>", $row[0], $row[1],
                $row[2]);
        }
        echo "</pre>";
    } else {
        echo "No courses found!";
    }
}

$link = mysqli_connect($server, $user, $password, $database);
if (!$link) die ("Connection to DB failed: " . mysqli_connect_error());
else echo "Connection established!<br><br>";

$coursesQuery = "SELECT course_code, course_name, ects_credits FROM courses;";
$result = mysqli_query($link, $coursesQuery);

listCourses($result, $coursesQuery);
?>

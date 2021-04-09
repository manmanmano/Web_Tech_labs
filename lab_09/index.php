<?php

include_once "dbconnection_data.php";

function listCourses($result, $query) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            printf("%s\t %s\t %s<br>", $row["course_code"], $row["course_name"],
                $row["ects_credit"]);
        }
    } else {
        echo "No courses found!";
    }
}

$link = mysqli_connect($server, $user, $password, $database);
if (!$link) die ("Connection to DB failed: " . mysqli_connect_error());
else echo "Connection established!";

$coursesQuery = "SELECT course_code, course_name, ects_credits FROM courses;";
$result = mysqli_query($link, $coursesQuery);

listCourses($result, $coursesQuery);
?>

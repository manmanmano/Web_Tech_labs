<?php

include_once "dbconnection_data.php";

function listCourses($result, $query) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credits</th>
            </tr>";
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            echo "
                <tr>
                    <td>", $row[0], "</td>
                    <td>", $row[1], "</td>
                    <td>", $row[2], "</td>
                </tr>";
        }
        echo "</table>";
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
        <link rel="stylesheet" type="text/css" href="styles/style.css">
    </head>
    <body>
    </body>
</html>


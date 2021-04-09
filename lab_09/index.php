<?php

include_once "dbconnection_data.php";

function listCourses($link) {
    $query = "SELECT course_code, course_name, ects_credits FROM courses;";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            echo "
                <tr>
                    <td>", $row[0], "</td>
                    <td>", $row[1], "</td>
                    <td>", $row[2], "</td>
                </tr>";
        }
    } else {
        echo "No courses found!";
    }
}

function listSemesters($link) {
    $query = "SELECT * FROM semesters_201752;";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "
            <li>
            <a href='index.php?search=", $row['ID'], "'>", $row['semester_name'], "</a>
            </li>";
        }
    }
}

$link = mysqli_connect($server, $user, $password, $database);
if (!$link) die ("Connection to DB failed: " . mysqli_connect_error());

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
        <link rel="stylesheet" type="text/css" href="styles/style.css">
    </head>
    <body>
        <ul>                                                            
            <?php listSemesters($link)?>
        </ul>                                                           
        <table>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credits</th>
            </tr>
            <?php listCourses($link)?>
        </table>
    </body>
</html>


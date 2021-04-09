<?php

include_once "dbconnection_data.php";

function listCourses($link) {  
    $query = mysqli_prepare($link,  
        "SELECT course_code, course_name, ects_credits, semester_name
        FROM courses AS C, semesters_201752 AS S
        WHERE C.Semesters_ID=S.ID AND Semesters_ID=?;");

    mysqli_stmt_bind_param($query, "i", $_GET['semester']);
    mysqli_stmt_execute($query);
    mysqli_stmt_bind_result($query, $course_code, $course_name, $ects_credits, $semester_name);

    while (mysqli_stmt_fetch($query)){
        echo "
         <tr>
            <td>", $course_code, "</td>
            <td>", $course_name, "</td>
            <td>", $ects_credits, "</td>
            <td>", $semester_name, "</td>
        </tr>";
    }
}

function listSemesters($link) {
    $query = "SELECT * FROM semesters_201752;";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "
            <li>
            <a href='index.php?semester=", $row['ID'], "'>", $row['semester_name'], "</a>
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
                <th>Semester</th>
            </tr>
            <?php listCourses($link)?>
        </table>
    </body>
</html>


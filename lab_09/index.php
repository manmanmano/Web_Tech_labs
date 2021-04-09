<?php

include_once "dbconnection_data.php";

function listCourses($result, $query) {
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

function listSemesters($result, $query) {
    if (mysqli_num_rows($result) > 0) {
        echo "<pre>";
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            printf("<a href=''>%s</a>\t", $row[0]);
        }
        echo "</pre>";
    } else {
        echo "No semesters found!";
    }
}

$link = mysqli_connect($server, $user, $password, $database);
if (!$link) die ("Connection to DB failed: " . mysqli_connect_error());

$coursesQuery = "SELECT course_code, course_name, ects_credits FROM courses;";
$coursesResult = mysqli_query($link, $coursesQuery);

$semestersQuery = "SELECT semester_name FROM semesters_201752;";
$semestersResult = mysqli_query($link, $semestersQuery);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
        <link rel="stylesheet" type="text/css" href="styles/style.css">
    </head>
    <body>
        <header>                                                                
            <nav>                                                               
                <ul>                                                            
                    <li class="menu">
                    <?php 
                    listSemesters($semestersResult, $semestersQuery);
                    ?>
                    </li>           
                </ul>                                                           
            </nav>                                                              
        </header>  
        <?php listSemesters($semestersResult, $semestersQuery)?>
        <table>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credits</th>
            </tr>
            <?php listCourses($coursesResult, $coursesQuery)?>
        </table>
    </body>
</html>


<?php 

include_once "dbconnection_data.php";

function listCourses($link) {

    $query = mysqli_prepare($link, 
        "SELECT course_code, course_name, ects_credits, semester_name
        FROM courses AS C, semesters_201752 AS S
        WHERE C.Semesters_ID=S.ID
        ORDER BY course_code ASC;");

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

    mysqli_stmt_close($query);

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
        <table>
            <?php listCourses($link); ?>
        </table>
    </body>
</html>

<?php mysqli_close($link); ?>

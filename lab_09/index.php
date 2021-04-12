<?php

include_once "dbconnection_data.php";

function sanitizeInputVar($link, $var) {
    $var = stripslashes($var);
    $var = htmlentities($var);
    $var = strip_tags($var);
    $var = mysqli_real_escape_string($link, $var);
    return $var;
}

function listCourses($link) {  
    if (!isset($_GET['semester'])) {
        $query = mysqli_prepare($link,
            "SELECT course_code, course_name, ects_credits, semester_name
            FROM courses AS C, semesters_201752 AS S
            WHERE C.Semesters_ID=S.ID 
            ORDER BY course_code ASC;");
            
    } else {
        $query = mysqli_prepare($link,  
            "SELECT course_code, course_name, ects_credits, semester_name
            FROM courses AS C, semesters_201752 AS S
            WHERE C.Semesters_ID=S.ID AND Semesters_ID=?;");
            mysqli_stmt_bind_param($query, "i", $_GET['semester']);
    }

    if (isset($_POST['submit'])) {
        $search = sanitizeInputVar($link, $_POST['search']); 
        $query = mysqli_prepare($link,
            "SELECT course_code, course_name, ects_credits, semester_name
            FROM courses AS C, semesters_201752 AS S
            WHERE C.Semesters_ID=S.ID 
            AND course_name LIKE '%" . $search . "%' OR course_code LIKE '%" . $search . "%';");
    }
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

function listSemesters($link) {
    $query = "SELECT * FROM semesters_201752;";
    $result = mysqli_query($link, $query);
    echo "<li><a href='index.php'>index</a></li>";
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
            <?php listSemesters($link); ?>
        </ul>
        <form action="#" method="POST" name="myForm">
            <label for="search">Search by code or name:</label>
            <input type="text" name="search">
            <input type="submit" value="Search" name="submit">
        </form>
        <table>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credits</th>
                <th>Semester</th>
            </tr>
            <?php listCourses($link); ?>
        </table>
    </body>
</html>

<?php mysqli_close($link); ?>

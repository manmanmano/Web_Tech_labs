<?php

include_once "dbconnection_data.php";

function sanitizeInputVar($link, $var) {
    $var = stripslashes($var);
    $var = htmlentities($var);
    $var = strip_tags($var);
    $var = mysqli_real_escape_string($link, $var);
    return $var;
}

function listCourses($link, $semester, $search, $search, $field) {  
    if (!empty($_POST['search'])) {
        setcookie("search", $search, ['path' => '~madang/Web_Technologies/lab_09/']);
        $query = mysqli_prepare($link,
            "SELECT course_code, course_name, ects_credits, semester_name
            FROM courses AS C, semesters_201752 AS S
            WHERE C.Semesters_ID=S.ID
            AND course_name LIKE ?  OR course_code LIKE ?;");
        $search = "%" . $_POST['search'] . "%";
        mysqli_stmt_bind_param($query, "ss", $search, $search);
    }

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

    if (isset($_GET['sortBy']) && isset($_GET['field'])) {

        $sort = "ASC";
        if ($_GET['sortBy'] == 'ASC') 
            $sort = "DESC";
        else 
            $sort = "ASC";

        switch($_GET['field']) {
            case "course_code":
                $field = "course_code";
                break; 
            case "course_name":
                $field = "course_name";
                break;
            case "ects_credits":
                $field = "ects_credits";
                break;
            case "semester_name":
                $field = "semester_name";
                break;
            default: $field = ""; 
        } 

        $safeSort = sanitizeInputVar($link, $sort);
        $safeField = sanitizeInputVar($link, $field);
        $query = mysqli_prepare($link, 
            "SELECT course_code, course_name, ects_credits, semester_name
            FROM courses AS C, semesters_201752 AS S
            WHERE C.Semesters_ID=S.ID
            ORDER BY " .  $safeField . " " .  $safeSort . ";");
    }


    mysqli_stmt_execute($query);
    mysqli_stmt_bind_result($query, $course_code, $course_name, $ects_credits, $semester_name);
    
    echo "
     <tr>
        <th><a href='index.php?sortBy=" . $safeSort . "&field=course_code'>Course Code</a></th>
        <th><a href='index.php?sortBy=" . $safeSort . "&field=course_name'>Course Name</a></th>
        <th><a href='index.php?sortBy=" . $safeSort . "&field=ects_credits'>Credits</a></th>
        <th><a href='index.php?sortBy=" . $safeSort . "&field=semester_name'>Semester</a></th>
     </tr>";
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
        <form action="index.php" method="POST" name="myForm">
            <label for="search">Search by code or name:</label>
            <input type="text" name="search">
            <input type="submit" value="Search" name="submit">
        </form>
        <p><em>Click on the header of a specific column to get its information sorted 
                in either ascending or descending order.</em></p>
        <table>
            <?php listCourses($link, $_GET['semester'], $_POST['search'], $_GET['sortBy'], $_GET['field']); ?>
        </table>
    </body>
</html>

<?php mysqli_close($link); ?>

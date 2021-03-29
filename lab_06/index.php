<?php
require_once('lib/tpl.class.php');
require_once('CoursesClass.php');
require_once('CourseActions.php');

const TEMPLATE_PATH = "templates";

$t = new Template(TEMPLATE_PATH."/index_tpl.php");

$tableHead = ["code", "name", "points", "semester"];

$t -> assign("title", "Course");

if (isset($_GET['search'])) { 
    CourseActions::filterCourses($_GET['search'], $courses);
    $t -> assignTable("table", $courses, $tableHead);
} else {
    $t -> assignTable("table", $courses, $tableHead);
} 

//Render content
echo $t -> render();
?>

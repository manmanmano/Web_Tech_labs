<?php
require_once('lib/tpl.class.php');
require_once('CoursesClass.php');
require_once('CourseActions.php');

const TEMPLATE_PATH = "templates";

$t = new Template(TEMPLATE_PATH."/index_tpl.php");

$tableHead = ["code", "name", "points", "semester"];

// Generate form
$form = ""; // Only fill it if you use the form

// Assign values
$t -> assign("title", "Course");
$t -> assign("form", $form); // fill this if you use a form
$t -> assignTable("table", $courses, $tableHead);

if (isset($_GET['search'])) { 
    CourseActions::filterCourses($_GET['search'], $courses);
} 

//Render content
echo $t -> render();
?>

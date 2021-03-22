<?php

class Course {
    public $code;
    public $name;
    public $ects;
    public $term;
}

function createArray($handle) {
    $objArr = array();
    while (!feof($handle)) {
        $course = new Course;
        $chopped = fgetcsv($handle, 0, ";");
        $course->code = $chopped[0];
        $course->name = $chopped[1];
        $course->ects = $chopped[2];
        $course->term = $chopped[3];
        array_push($objArr, $course);
    }
    return $objArr;
}

$file = 'data/courses.csv';
if (!file_exists($file)) {
    die("FILE NOT FOUND");
}
$handle = fopen($file, 'r');
$courses = CreateArray($handle);
fclose($handle);
?>

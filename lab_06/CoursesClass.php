<?php

declare(strict_types=1)

class Course {
    public $code;
    public $name;
    public $points;
    public $semester;
}

function getCoursesTable() {

}


$file = 'data/courses.csv';
if (!file_exists($file)) {
    die("FILE NOT FOUND");
}
$handle = fopen($file, 'r');

fclose($handle);
?>

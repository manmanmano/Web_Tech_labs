<?php

declare(strict_types=1)

class Course {
    public $code;
    public $name;
    public $points;
    public $semester;

    function __construct($code, $name, $points, $semester) {
        $this -> code = $code;
        $this -> name = $name;
        $this -> points = $points;
        $this -> semester = $semester;
}

function fileSplit($handle, $file) {
    $arr = [];
    for ($i = 0; $i < filesize($file); $i++) {
        for ($j = 0; $j != PHP.EOL; $j++) {


$file = 'data/courses.csv';
if (!file_exists($file)) {
    die("FILE NOT FOUND");
}
$handle = fopen($file, 'r');
?>

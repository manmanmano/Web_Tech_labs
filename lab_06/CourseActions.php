<?php
require_once('index.php');
require_once('CoursesClass.php');

class CourseActions {
    public static function filterCourses($identifier, &$courses) {
        $filteredCourses = [];
        foreach ($courses as $course) {
            if ($identifier == preg_match('/I[0-9]+/g', $course->code)) {
                array_push($filteredCourses, $course);
            }
        }
        return $filteredCourses;
    }
}

?>

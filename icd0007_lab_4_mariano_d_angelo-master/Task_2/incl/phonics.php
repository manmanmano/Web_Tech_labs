<?php

function phonicsCount($handle, $vowels, $file) {
    $arr = [];
    foreach ($vowels as $key) {
        $arr[$key] = 0;
    }
    for ($i = 0; $i < sizeof($vowels); $i++) {
        for ($j = 0; $j < filesize($file); $j++) {
            if (strtoupper(fgetc($handle)) == $vowels[$i]) {
                $arr[$vowels[$i]]++;
            }
        }
        rewind($handle);
    }
    return $arr;
}

function charactersNoSpaceCount($handle, $file) {
    $charCounter = 0;
    for ($i = 0; $i < filesize($file); $i++) {
        if (!ctype_space(fgetc($handle))) {
            $charCounter++;
        }
    }
    return $charCounter;
}

function lineCount($file, $handle) {
    $arr = file($file);
    return count($arr);
}

$vowels = array('A', 'E', 'I', 'O', 'U');
$file = '../data/text.txt';
$handle = fopen($file, 'r');
$arr = phonicsCount($handle, $vowels, $file);
$nCharNoSpace = charactersNoSpaceCount($handle, $file);
$nLines = lineCount($file, $handle);

printf("\n");
print_r($arr);
printf("\n");
printf("Characters excluding spaces: %d\n\n", $nCharNoSpace);
printf("Line in the text: %d\n\n", $nLines);

fclose($handle);

?>
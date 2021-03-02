<?php

function getKey($testKey, &$arr) {
    $testKeyCounter = 0;
    for (; 1;) {
        if (array_key_exists($testKey, $arr)) {
            $testKeyCounter++;
            $testKey .= chr(64 + $testKeyCounter);
        } 
        else {
            return $testKey;
        }
    }
}

error_reporting(1);

define("KM_TO_MILES", "1.60934");

$numOfDistances = rand(5, 20);

$arrDistances = [];
for ($i = 0; $i < $numOfDistances; $i++) {
    array_push($arrDistances, rand(1, 100));
}
printf("\n"); // these printf("\n") are just added to beautify the output
print_r($arrDistances);
printf("\n");

sort($arrDistances);
print_r($arrDistances);
printf("\n");

$arrMiles = [];
for ($i = 0; $i < sizeof($arrDistances); $i++) {
    $arrMiles[getKey($arrDistances[$i], $arrMiles)] = intval($arrDistances[$i], 10) / KM_TO_MILES;
}
print_r($arrMiles);

printf("\nKM\tMILES\n");
foreach ($arrMiles as $key => $value) {
    printf("\n%d\t%0.3f\n", $key, $value);
}
printf("\n");

?>
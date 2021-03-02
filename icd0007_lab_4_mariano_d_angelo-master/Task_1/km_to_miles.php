<?php

function getKey($testKey, &$arr) {
    for ($i = 0; $i < sizeof($arr); $i++) {
        $testKeyCounter = 0; //counts eventual repetitions 
        if ($testKey === $arr[$i]) {
            $testKeyCounter++;
        }
        if ($testKeyCounter > 1) { 
		    $arr[$i] .= chr(64 + $testKeyCounter);
            }
    }
    return $testKey;
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

foreach ($arrDistances as $value) {
    getKey($key, $arrDistances); 
}

printf("\n");
$arrMiles = [];
for ($i = 0; $i < sizeof($arrDistances); $i++) {
    $arrMiles[$arrDistances[$i]] = $arrDistances[$i] / KM_TO_MILES;
}

printf("\nKM\tMILES\n");
foreach ($arrMiles as $key => $value) {
    printf("\n%d\t%0.3f\n", $key, $value);
}
printf("\n");

?>
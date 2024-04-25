<?php

// Define a function that we'll need to use later
// This function works exactly the same way as the "min" function, except it returns the INDEX of the value which is minimum, not the VALUE of the value which is minimum
function findMinIndex($array)
{
    $minIndex = null;
    $minValue = null;
    foreach ($array as $i => $value) {
        if ($minValue === null || $value < $minValue) {
            $minIndex = $i;
            $minValue = $value;
        }
    }
    return $minIndex;
}

function calculateTime($q, $tapFlows, $walkingTime)
{
    $tapTimes = array_fill(0, count($tapFlows), 0);
    $val = 0;

    foreach ($q as $i => $bottleSize) {

        $minIndex = findMinIndex($tapTimes);

        $flow = $tapFlows[$minIndex];

        $timeSpentFillingBottle = $bottleSize / $flow;

        $val = $val + 1;

        $tapTimes[$minIndex] += $timeSpentFillingBottle + $walkingTime;
    }

    $totalTime = max($tapTimes);

    return $totalTime;
}

$queueExample = array(400, 750, 1000);
$walkTimeExample = 5;
$flowRatesExample = [50, 200];

echo '-----';
echo "\n";
echo calculateTime($queueExample, $flowRatesExample, 0);
echo "\n";
echo '-----';

<?php
// Finds the index of the element with the minimum value in an array.
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

// Calculates the total time to fill a queue of bottles
function calculateTime($q, $tapFlows, $walkingTime)
{
    // Initialize an array to store the current filling time for each tap
    $tapTimes = array_fill(0, count($tapFlows), 0);

    foreach ($q as $i => $bottleSize) {

        // Finds the tap with the shortest current filling time
        $minIndex = findMinIndex($tapTimes);

        // Gets the flow rate of the chosen tap
        $flow = $tapFlows[$minIndex];

        // Calculates the time to fill the current bottle
        $timeSpentFillingBottle = $bottleSize / $flow;

        // Updates the total filling time including walking time
        $tapTimes[$minIndex] += $timeSpentFillingBottle + $walkingTime;
    }


    // The total time is the maximum filling time among all taps
    $totalTime = max($tapTimes);

    return $totalTime;
}

$queueExample = array(400, 750, 1000);
$walkTimeExample = 5;
$flowRatesExample = [50, 200];

echo '-----';
echo "\n";
echo calculateTime($queueExample, $flowRatesExample, $walkTimeExample);
echo "\n";
echo '-----';

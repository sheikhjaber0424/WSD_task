<?php

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

    foreach ($q as $i => $bottleSize) {
        $minIndex = findMinIndex($tapTimes);

        $flow = $tapFlows[$minIndex];

        $timeSpentFillingBottle = $bottleSize / $flow;

        $tapTimes[$minIndex] += $timeSpentFillingBottle + $walkingTime;
    }

    $totalTime = max($tapTimes);

    return $totalTime;
}

$queueExample = array(400, 750, 1000);
$walkTimeExample = 5;
$flowRatesExample1 = [50, 200]; // Slower tap
$flowRatesExample2 = [150, 200]; // Faster tap (increased rate for tap 1)

$totalTime1 = calculateTime($queueExample, $flowRatesExample1, $walkTimeExample);
$totalTime2 = calculateTime($queueExample, $flowRatesExample2, $walkTimeExample);

echo "Total time (slower tap): $totalTime1 \n"; //Output : 18.75
echo "Total time (faster tap): $totalTime2 \n"; //Output : 19.33
//When rate for tap-1 is increased 1st tap becomes empty before the 2nd one, so the 3rd person uses the 1st tap that's why it will take more time to fill. 
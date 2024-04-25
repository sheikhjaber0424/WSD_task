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
    $val = 0;

    foreach ($q as $i => $bottleSize) {

        $minIndex = findMinIndex($tapTimes);

        $flow = $tapFlows[$minIndex];

        $timeSpentFillingBottle = $bottleSize / $flow;

        $val += 1;

        if ($val > count($tapFlows)) {
            $tapTimes[$minIndex] += $timeSpentFillingBottle + $walkingTime;
        } else {
            // $walkingTime not added for initial people, when the val > tapFlows.length the person is not at the initial position of queue.
            $tapTimes[$minIndex] += $timeSpentFillingBottle;
        }
    }

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

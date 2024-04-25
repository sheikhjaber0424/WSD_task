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

// Define our actual important function
function calculateTime($q, $tapFlows, $walkingTime)
{

    // Defaulting the values in case ommitted
    if ($q != null) {
        $q = [400, 750, 1000];
    }

    if ($tapFlows != null) {
        $tapFlows = [100, 100];
    }

    if ($walkingTime != null) {
        $walkingTime = 0;
    }

    // $tapTimes is the total time people have spent at each tap as we move down the queue.
    // Before the loop, this is initialised as [0, 0, 0, ....., 0] with one zero for each tap
    $tapTimes = array_fill(0, count($tapFlows), 0);

    // Loop through each bottle in the queue
    foreach ($q as $i => $bottle_size) {

        // We then find which queue is the "emptiest", ie what is the minium item in the array
        // We use this function instead of min($tapTimes) because we want to find the INDEX of the minimum, not just the VALUE
        $minIndex = findMinIndex($tapTimes);

        // By the time we get to this point we have found $minIndex which is the index of the lowest value in $tapTimes
        // i.e. if $tapTimes = [4, 7, 3, 9, 11] then $minIndex will be 2 and $minTap will be 3 (but we don't care about $minTap anymore)
        // This tells us that this person walks up to tap number 2 (assuming the first tap is tap number 0)

        // Set $flow to $tapFlows[$minIndex]
        $flow = $tapFlows[$minIndex];

        // bottle size divided by flow
        $timeSpentFillingBottle = ceil($bottle_size / $flow);

        // We add the amount of time to $tapTimes that the person is "using" the tap, to signify that this tap is busy until that point in time.
        // There are two parts to this:

        // PART 1: Adding on the time to walk to the tap
        $tapTimes[$minIndex] += $walkingTime;

        // PART 2: Adding on the actual time the tap is being used to fill up the bottle
        $tapTimes[$minIndex] += $timeSpentFillingBottle;
    }

    // By the time we get here, we know the amount of time each tap has spent being used, so we just have to find the max value

    return max($tapTimes);
}

$queueExample = array(400, 750, 1000);
$walkTimeExample = 5;
$flowRatesExample = [50, 200];

echo '-----';
echo "\n";
echo calculateTime($queueExample, $flowRatesExample, 0);
echo "\n";
echo '-----';

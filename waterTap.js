// Finds the index of the element with the minimum value in an array.
function findMinIndex(array) {
    let minIndex = null;
    let minValue = null;
    array.forEach((value, i) => {
        if (minValue === null || value < minValue) {
            minIndex = i;
            minValue = value;
        }
    });
    return minIndex;
}

// Calculates the total time to fill a queue of bottles
function calculateTime(q, tapFlows, walkingTime) {

    // Initialize an array to store the current filling time for each tap
    let tapTimes = Array(tapFlows.length).fill(0);

    q.forEach((bottle_size, i) => {
		
        // Finds the tap with the shortest current filling time
		let minIndex = findMinIndex(tapTimes);

        // Gets the flow rate of the chosen tap
        let flow = tapFlows[minIndex];

        // Calculates the time to fill the current bottle
        let timeSpentFillingBottle = bottle_size / flow;

        // Updates the total filling time including walking time
        tapTimes[minIndex] += timeSpentFillingBottle + walkingTime;
    });

    // The total time is the maximum filling time among all taps
    return Math.max(...tapTimes);
}

let queueExample = [400, 750, 1000];
let walkTimeExample = 5;
let flowRatesExample = [50, 200];

console.log('-----');
console.log(calculateTime(queueExample, flowRatesExample, walkTimeExample));
console.log('-----');
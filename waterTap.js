// Define a function that we'll need to use later
// This function works exactly the same way as the "min" function, except it returns the INDEX of the value which is minimum, not the VALUE of the value which is minimum
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

// Define our actual important function
function calculateTime(q, tapFlows, walkingTime) {

    let tapTimes = Array(tapFlows.length).fill(0);
    let val = 0;
    q.forEach((bottle_size, i) => {
		
		let minIndex = findMinIndex(tapTimes);

        let flow = tapFlows[minIndex];

        let timeSpentFillingBottle = bottle_size / flow;

        val = val + 1;
 
        tapTimes[minIndex] += timeSpentFillingBottle + walkingTime;
    });
  
return Math.max(...tapTimes);
}

let queueExample = [400, 750, 1000];
let walkTimeExample = 5;
let flowRatesExample = [50, 200];

console.log('-----');
console.log(calculateTime(queueExample, flowRatesExample, walkTimeExample));
console.log('-----');

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

function calculateTime(q, tapFlows, walkingTime) {

    let tapTimes = Array(tapFlows.length).fill(0);
    let val = 0;

    q.forEach((bottle_size, i) => {
		
		let minIndex = findMinIndex(tapTimes);

        let flow = tapFlows[minIndex];

        let timeSpentFillingBottle = bottle_size / flow;
        val +=1;
        if(val > tapFlows.length)
        {
            tapTimes[minIndex] += timeSpentFillingBottle + walkingTime;
        }else
        {
            tapTimes[minIndex] += timeSpentFillingBottle ;
        }
       
    });
  
return Math.max(...tapTimes);
}

let queueExample = [400, 750, 1000];
let walkTimeExample = 5;
let flowRatesExample1 = [50, 200];  // Slower tap
let flowRatesExample2 = [150, 200]; // Faster tap (increased rate for tap 1)

console.log('-----');
console.log(calculateTime(queueExample, flowRatesExample1, walkTimeExample)); // Output:13.75
console.log(calculateTime(queueExample, flowRatesExample2, walkTimeExample)); // Output:14.33
console.log('-----');
// When rate for tap-1 is increased 1st tap becomes empty before the 2nd one, so the 3rd person uses the 1st tap that's why it will take more time to fill. 
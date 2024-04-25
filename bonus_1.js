
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
        } else {
            // $walkingTime not added for initial people, when the val > tapFlows.length the person is not at the initial position of queue.
            tapTimes[minIndex] += timeSpentFillingBottle ;
        }
       
    });
  
return Math.max(...tapTimes);
}

let queueExample = [400, 750, 1000];
let walkTimeExample = 5;
let flowRatesExample = [50, 200];

console.log('-----');
console.log(calculateTime(queueExample, flowRatesExample, walkTimeExample));
console.log('-----');
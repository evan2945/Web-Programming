var rng = Math.floor((Math.random() * 100) + 1);
var counter = 15;
var userGuess = [];
var binaryGuess = [];
binarySearch(0, 100, rng);

function checkGuess(){
	var guess = document.getElementById('userText').value;
	userGuess.push(guess);
	if(counter > 1){
		if(guess == rng){
			document.getElementById('output').innerHTML='You guessed the secret number! Congratulations!';
			drawChart(userGuess, binaryGuess);
			return
		}else if(guess > rng){
			counter -= 1;
			document.getElementById('output').innerHTML='Your guess was too high! Try a lower number! # of guesses left: ' + counter;
			
		}else {
			counter -= 1;
			document.getElementById('output').innerHTML='Your guess was too low! Try a higher number! # of guesses left: ' + counter;
		}
	} else {
		document.getElementById('output').innerHTML='You have run out of guesses! You lose! The number was: ' + rng;
		drawChart(userGuess, binaryGuess);
		return;
	}	
}

function drawChart(data1, data2){
	var ctx = document.getElementById('binaryChart').getContext('2d');
	var data = {
		labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'],
		datasets: [
			{
				label: 'User Guess',
				fillColor: 'rgba(220,220,220,0.2)',
				strokeColor: 'rgba(220,220,220,1)',
				pointColor: 'rgba(220,220,220,1)',
				pointStrokeColor: '#fff',
				pointHighlightFill: '#fff',
				pointHighlightStroke: 'rgba(220,220,220,1)',
				data: data1
			},
			{
				label: 'Binary search',
				fillColor: 'rgba(151,187,205,0.2)',
				strokeColor: 'rgba(151,187,205,1)',
				pointColor: 'rgba(151,187,205,1)',
				pointStrokeColor: '#fff',
				pointHighlightFill: '#fff',
				pointHighlightStroke: 'rgba(151,187,205,1)',
				data: data2
			}
		]
	};
	var myNewChart = new Chart(ctx).Line(data);
}

function binarySearch(guessRangelow, guessRangehigh, rng){
	var guess = Math.floor((guessRangelow + guessRangehigh)/2);
	if(guess == rng){
		binaryGuess.push(guess);
		return;
	}else {
		binaryGuess.push(guess);
		if(guess > rng){
			binarySearch(guessRangelow, guess, rng);
		}else {
			binarySearch(guess, guessRangehigh, rng);
		}
	}
}

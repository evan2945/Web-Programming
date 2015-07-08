<?php
	//Put the string from text area into a variable
	$temp = $_POST['bet'];
	//This splits the array on the spaces and stores that an array
	$first = explode(" ", $temp);
	//Create an empty array for later
	$bets = array();
	//Create winning array for debug output later
	$winning = array();
	
	//This goes through our array and creates an associative array where the keys are the square and the values are the amounts
	foreach($first as $item){
		//Find the ':'
		$location = strpos($item, ':');
		//Use the string before the ':' as the key
		$key = substr($item, 0, $location);
		//Use the string after the ':' as the value
		$value = substr($item, $location + 1);
		//Assign the two to our associative array
		$bets[$key] = $value;
	}
	
	//These arrays store which values are black and which are red
	$bl = array(2, 4, 6, 8, 10, 11, 13, 15, 17, 20, 22, 24, 26, 28, 29, 31, 33, 35);
	$red = array(1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36);
	
	//Our random number generator
	$rng = rand(0, 37);
	//These checks the various places the user can bet on the yellow horizontal part of the table
	$even = $rng%2 == 0;
	$_1st12 = ($rng > 0) && ($rng < 13);
	$_2nd12 = ($rng > 12) && ($rng < 25);
	$_3rd12 = ($rng > 24) && ($rng < 37);
	$_1to18 = ($rng > 0) && ($rng < 19);
	$_19to36 = ($rng > 18) && ($rng < 37);
	
	//This will keep how much was bet on each section
	$rngRlt = 0;
	$evenRlt = 0;
	$oddRlt = 0;
	$blRlt = 0;
	$redRlt = 0;
	$_1st12Rlt = 0;
	$_2nd12Rlt = 0;
	$_3rd12Rlt = 0;
	$_1to18Rlt = 0;
	$_19to36Rlt = 0;
	
	//Loop through our associative array
	foreach($bets as $keys => $values){
		if(strval($keys) === '00'){
			$keys = 37;
		}
		if(($rng == 0) || ($rng == 37)){
			if(strval($keys) == strval($rng)){
				$rngRlt += intval($values);
				array_push($winning, 'Winning bet of '.$values.' on '.$keys.'!');
				break;
			}
			continue;
		}
		if($keys == $rng){
			$rngRlt += intval($values);
			array_push($winning, 'Winning bet of '.$values.' on '.$keys.'!');
			continue;
		}
		if($keys === 'black'){
			foreach($bl as $color){
				if($rng == $color){
					$blRlt += intval($values);
					array_push($winning, 'Winning bet of '.$values.' on '.$keys.'!');
					continue;
				}
			}
		}
		if($keys === 'red'){
			foreach($red as $color){
				if($rng == $color){
					$redRlt += intval($values);
					array_push($winning, 'Winning bet of '.$values.' on '.$keys.'!');
					continue;
				}
			}
		}
		if(($keys === '1st12') && $_1st12){
			$_1st12Rlt += intval($values);
			array_push($winning, 'Winning bet of '.$values.' on '.$keys.'!');
			continue;
		}
		if(($keys === '2nd12') && $_2nd12){
			$_2nd12Rlt += intval($values);
			array_push($winning, 'Winning bet of '.$values.' on '.$keys.'!');
			continue;
		}
		if(($keys === '3rd12') && $_3rd12){
			$_3rd12Rlt += intval($values);
			array_push($winning, 'Winning bet of '.$values.' on '.$keys.'!');
			continue;
		}
		if(($keys === '1to18') && $_1to18){
			$_1to18Rlt += intval($values);
			array_push($winning, 'Winning bet of '.$values.' on '.$keys.'!');
			continue;
		}
		if(($keys === '19to36') && $_19to36){
			$_19to36Rlt += intval($values);
			array_push($winning, 'Winning bet of '.$values.' on '.$keys.'!');
			continue;
		}
		if(($keys === 'even') && $even){
			$evenRlt += intval($values);
			array_push($winning, 'Winning bet of '.$values.' on '.$keys.'!');
			continue;
		}
		if(($keys === 'odd') && !$even){
			$oddRlt += intval($values);	
			array_push($winning, 'Winning bet of '.$values.' on '.$keys.'!');
			continue;
		}
	}
	
	echo 'RNG: '.$rng.'     value: '.$rngRlt.'<br>';
	echo 'Even value: '.$evenRlt.'<br>';
	echo 'Odd value: '.$oddRlt.'<br>';
	echo '1st12: '.$_1st12.'      value: '.$_1st12Rlt.'<br>';
	echo '2nd12: '.$_2nd12.'     value: '.$_2nd12Rlt.'<br>';
	echo '3rd12: '.$_3rd12.'     value: '.$_3rd12Rlt.'<br>';
	echo '1to18: '.$_1to18.'     value: '.$_1to18Rlt.'<br>';
	echo '19to36: '.$_19to36.'     value: '.$_19to36Rlt.'<br>';
	echo 'black: '.$blRlt.'<br>';
	echo 'red: '.$redRlt.'<br>';
	echo '<br>Result of spin:<br>';
	foreach($winning as $result){
		echo $result.'<br>';
	}
	
?>





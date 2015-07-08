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
			$values = $values;
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
	/*
	echo '<center><font face=Georgia size=10><u>Random Winning Number:</u> '.$rng.' &nbsp&nbsp Value of Bet: '.$rngRlt.'<br></font></center>';
	echo '<center><font face=Georgia size=10><u>Even</u> &nbsp&nbsp Value of Bet: '.$evenRlt.'<br></font></center>';
	echo '<center><font face=Georgia size=10><u>Odd</u> &nbsp&nbsp Value of Bet: '.$oddRlt.'<br></font></center>';
	echo '<center><font face=Georgia size=10><u>1st12:</u> '.$_1st12.'  &nbsp&nbsp    Value of Bet: '.$_1st12Rlt.'<br></font></center>';
	echo '<center><font face=Georgia size=10><u>2nd12:</u> '.$_2nd12.'  &nbsp&nbsp   Value of Bet: '.$_2nd12Rlt.'<br></font></center>';
	echo '<center><font face=Georgia size=10><u>3rd12:</u> '.$_3rd12.' &nbsp&nbsp    Value of Bet: '.$_3rd12Rlt.'<br></font></center>';
	echo '<center><font face=Georgia size=10><u>1to18:</u> '.$_1to18.'  &nbsp&nbsp   Value of Bet: '.$_1to18Rlt.'<br></font></center>';
	echo '<center><font face=Georgia size=10><u>19to36:</u> '.$_19to36.'  &nbsp&nbsp   Value of Bet: '.$_19to36Rlt.'<br></font></center>';
	echo '<center><font face=Georgia size=10><b><u>black:</u> '.$blRlt. '</b><br></font></center>';
	echo '<center><font color=red size=10><u>red:</u> '.$redRlt.'</font><br></center>';
	 
	echo '<center><font face=Georgia size=10><br><u>Result of spin:</u><br></font></center>';
	foreach($winning as $result){
		echo '<center><font face=Georgia size=15>'.$result.'<br></font></center>';
	}
	if(count($winning) == 0){
		echo '<center><font face=Georgia size=15>You lost!</font></center><br><br>';
	}
	 */
	echo '<center><font face=Georgia size=10><br><u>Result of spin:</u><br><br></font></center>';
	echo '<center><font face=Georgia size=15>The Winning Number was: '.$rng.'!<br><br></font></center>';
	foreach($winning as $result){
		echo '<center><font face=Georgia size=15>'.$result.'<br><br></font></center>';
		//echo '<center><font face=Georgia size=15>Winning Number is Shown Below: <br>'.$rng.'<br><br></font></center>';
	}
	if (empty($winning)){
		echo '<center><font face=Georgia size=15>You Lose! Sorry.<br></font></center>';
	}
	
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Roulette</title>
<style>
@import url(rouletteFinal2.css);
	<?php
		if(intval($rngRlt) > 0){
			echo '#a'.$rng.' { background-color:yellow; }';
		}
		if(intval($evenRlt) > 0){
			echo '#even { background-color:yellow; color:black; }';
		}
		if(intval($oddRlt) > 0){
			echo '#odd { background-color:yellow; color:black; }';
		}
		if(intval($blRlt) > 0){
			echo '#black { background-color:yellow; }';
		}
		if(intval($redRlt) > 0){
			echo '#red { background-color:yellow; }';
		}
		if(intval($_1st12Rlt) > 0){
			echo '#a1st12 { background-color:yellow; color:black; }';
		}
		if(intval($_2nd12Rlt) > 0){
			echo '#a2nd12 { background-color:yellow; color:black }';
		}
		if(intval($_3rd12Rlt) > 0){
			echo '#a3rd12 { background-color:yellow; color:black }';
		}
		if(intval($_1to18Rlt) > 0){
			echo '#a1to18 { background-color:yellow; color:black }';
		}
		if(intval($_19to36Rlt) > 0){
			echo '#a19to36 { background-color:yellow; color:black; }';
		}
	?>
</style>
</head>
<body>
<div class="board">
  <div class="wheel">
    <div id="outside">
      <div id="level1">
        <div id="level2">
          <div id="roulette">
            <span id="dz">00</span>
            <span id="twentyseven">27</span>
            <span id="ten">10</span>
            <span id="twentyfive">25</span>
            <span id="twentynine">29</span>
            <span id="twelve">12</span>
            <span id="eight">8</span>
            <span id="nineteen">19</span>
            <span id="thirtyone">31</span>
            <span id="eightteen">18</span>
            <span id="six">6</span>
            <span id="twentyone">21</span>
            <span id="thirtythree">33</span>
            <span id="sixteen">16</span>
            <span id="four">4</span>
            <span id="twentythree">23</span>
            <span id="thirtyfive">35</span>
            <span id="fourteen">14</span>
            <span id="two">2</span>
            <span id="zero">0</span>
            <span id="twentyeight">28</span>
            <span id="nine">9</span>
            <span id="twentysix">26</span>
            <span id="thirty">30</span>
            <span id="eleven">11</span>
            <span id="seven">7</span>
            <span id="twenty">20</span>
            <span id="thirtytwo">32</span>
            <span id="seventeen">17</span>
            <span id="five">5</span>
            <span id="twentytwo">22</span>
            <span id="thirtyfour">34</span>
            <span id="fifteen">15</span>
            <span id="three">3</span>
            <span id="twentyfour">24</span>
            <span id="thirtysix">36</span>
            <span id="thirteen">13</span>
            <span id="one">1</span>
            <div id="ring">
              <div id="middle">
                <div id="crown"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
  <table>
  <tr>
    <caption><font color="black"><h1>Place your bid</h1></font></caption>
    <tr>
      <th rowspan="4"><div id="trapezoid"><br><br><br>
        <br><br><br><br><p id="rzero">0</p><p id="dzero">00</p></div></th>
    </tr>
    <tr>
      <td id='a3'><div class="circle-container-red">3</div></td>
      <td id='a6'><div class="circle-container-black">6</div></td>
      <td id='a9'><div class="circle-container-red">9</div></td>
      <td id='a12'><div class="circle-container-red">12</div></td>
      <td id='a15'><div class="circle-container-black">15</div></td>
      <td id='a18'><div class="circle-container-red">18</div></td>
      <td id='a21'><div class="circle-container-red">21</div></td>
      <td id='a24'><div class="circle-container-black">24</div></td>
      <td id='a27'><div class="circle-container-red">27</div></td>
      <td id='a30'><div class="circle-container-red">30</div></td>
      <td id='a33'><div class="circle-container-black">33</div></td>
      <td id='a36'><div class="circle-container-red">36</div></td>
      <td><div class="2-to-1"><p>2 to 1</p></div></td>
    </tr>
    <tr>
      <td id='a2'><div class="circle-container-black">2</div></td>
      <td id='a5'><div class="circle-container-red">5</div></td>
      <td id='a8'><div class="circle-container-black">8</div></td>
      <td id='a11'><div class="circle-container-black">11</div></td>
      <td id='a14'><div class="circle-container-red">14</div></td>
      <td id='a17'><div class="circle-container-black">17</div></td>
      <td id='a20'><div class="circle-container-black">20</div></td>
      <td id='a23'><div class="circle-container-red">23</div></td>
      <td id='a26'><div class="circle-container-black">26</div></td>
      <td id='a29'><div class="circle-container-black">29</div></td>
      <td id='a32'><div class="circle-container-red">32</div></td>
      <td id='a35'><div class="circle-container-black">35</div></td>
      <td border="0"><div class="2-to-1"><p>2 to 1</p></div></td>
    </tr>
    <tr>
      <td id='a1'><div class="circle-container-red">1</div></td>
      <td id='a4'><div class="circle-container-black">4</div></td>
      <td id='a7'><div class="circle-container-red">7</div></td>
      <td id='a10'><div class="circle-container-black">10</div></td>
      <td id='a13'><div class="circle-container-black">13</div></td>
      <td id='a16'><div class="circle-container-red">16</div></td>
      <td id='a19'><div class="circle-container-red">19</div></td>
      <td id='a22'><div class="circle-container-black">22</div></td>
      <td id='a25'><div class="circle-container-red">25</div></td>
      <td id='a28'><div class="circle-container-black">28</div></td>
      <td id='a31'><div class="circle-container-black">31</div></td>
      <td id='a34'><div class="circle-container-red">34</div></td>
      <td><div class="2-to-1"><p>2 to 1</p></div></td>
    </tr>
    <tfoot class="foot">
    <tr>
      <th colspan="1"></th>
      <td colspan="4" id='a1st12'>1st 12</td>
      <td colspan="4" id='a2nd12'>2nd 12</td>
      <td colspan="4" id='a3rd12'>3rd 12</td>
    </tr>
    <tr>
      <th colspan="1"></th>
      <td colspan="2" id='a1to18'>1 to 18</td>
      <td colspan="2" id='even'>EVEN</td>
      <td colspan="2" id='red'><font color="red">RED</font></td>
      <td colspan="2" id='black'><font color="black">BLACK</font></td>
      <td colspan="2" id='odd'>ODD</td>
      <td colspan="2" id='a19to36'>19 to 36</td>
    </tr>
  </tfoot>
  </table>
</div>
</body>
</html>







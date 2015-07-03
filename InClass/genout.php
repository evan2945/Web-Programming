<html>
	<body>
		<?php
			function formatPhone($number){
				$count = 0;
				$phone = "(";
				for($i=0; $i<strlen($number); $i++){	
					$temp = substr($number, $i, 1);
					if($temp == "(" or $temp == ")" or $temp == "-"){
						continue;
					}
					$temp = (int)$temp;
					if($count == 3){
						$phone = $phone . ") " . $temp;
						$count++;
						continue;
					}
					if($count == 6){
						$phone = $phone . "-" . $temp;
						$count++;
						continue;
					}
					
					$phone = $phone . $temp;
					$count++;					
				}
				
				return $phone;
			}
			
			$first = ucfirst($_POST["first"]);
			$last = ucfirst($_POST["last"]);
			$phone = formatPhone($_POST["phone"]);
			$checklist = $_POST["checklist"];
		
			echo "Welcome $first $last.<br>";
			echo "Your phone number is $phone.<br>";
			echo "Your hobbies are (showing only first three):<br>";
			$count = 0;
			foreach($_POST["checklist"] as $check){
				if($count == 3) {
					break;
				}
				echo "<li>$check</li>";	
				$count++;
			}
		?>
	</body>
</html>
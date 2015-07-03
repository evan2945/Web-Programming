<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="calendar.css" />
	</head>
	<body>
	<?php
		date_default_timezone_set('America/New_York');
		echo "<h2 align=\"center\" style=\"margin-left: auto; margin-right: auto;\">" . date('l\, F jS\, Y h:i:s A') . "</h2>";
		$hour = date("g");
		$time = date("a");
	?>
	<table>
		<thead>
			<th>Hour</th>
			<th>Evan</th>
			<th>Michelle</th>
			<th>Troy</th>
			<th>Chris</th>
			<th>Bob</th>
		</thead>
		<tbody>
			<?php			
				for($i=0; $i<13; $i++){
					echo "<tr>";
					echo "<td>$hour:00 " . $time . "</td>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td></td>";
					echo "</tr>";
					if($hour == 12){
						$hour = 1;
						if($time == "am"){
							$time = "pm";
						}
						else{
							$time = "am";
						}
						continue;
					}
					$hour++;
				}
			?>
		</tbody>
	</table>
	</body>
</html>
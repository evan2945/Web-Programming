<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="calendar.css" />
		<title>Calendar</title>
		<meta charset="UTF-8">
	</head>
	<body>
	
	<table>
		<thead>
			<tr id="header">
				<?php
					date_default_timezone_set('America/New_York');
					echo "<th colspan=\"6\" style=\"margin-left: auto; margin-right: auto;\">" . date('l\, F jS\, Y h:i:s A') . "</th>";
					$hour = date("g");
					$time = date("a");
				?>
			</tr>
			<tr id="top">
				<th>Hour</th>
				<th>Evan</th>
				<th>Michelle</th>
				<th>Troy</th>
				<th>Chris</th>
				<th>Bob</th>
			</tr>
		</thead>
		<tbody>
			<?php			
				for($i=0; $i<13; $i++){
					if($i%2==0){
						echo "<tr class=\"even\">";
					}
					else {
						echo "<tr class=\"odd\">";
					}
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
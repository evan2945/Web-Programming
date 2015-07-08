<!DOCTYPE html>
<html>
	<head>
		<title>Php output</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<?php
			$temp = $_POST["font"];
			$color = $_POST["color"];
			$size = $_POST["size"] . "px";
			$comment = $_POST["comment"];
			echo "<p>Your modified input:</p>";
			echo "<p style=\"color:$color; font-family:$font; font-size:$size;\">$comment</p>";
		?>
	</body>
</html>
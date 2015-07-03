<!DOCTYPE HTML>
<html>
	<body>
		<form action="genout.php" method="post">
			First Name: <br><input type="text" name="first"><br>
			Last Name: <br><input type="text" name="last"><br>
			Phone number: <br><input type="text" name="phone"><br>
			Select hobbies (limit to 3):<br>
			<input type="checkbox" name="checklist[]" value="Hockey"> Hockey<br>
			<input type="checkbox" name="checklist[]" value="Travel"> Travel<br>
			<input type="checkbox" name="checklist[]" value="Chess"> Chess<br>
			<input type="checkbox" name="checklist[]" value="Coin Collection"> Coin Collection<br>
			<input type="checkbox" name="checklist[]" value="Stamp Collection"> Stamp Collection<br>
			<input type="checkbox" name="checklist[]" value="Shopping"> Shopping<br>
			<input type="submit">
		</form>
	</body>
</html>
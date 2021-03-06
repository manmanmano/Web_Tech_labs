<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
	<h1>Register now!</h2>
	<form action="#" method="POST" id="data">
		<label for="first-name">First name:</label>
		<input type="text" class="name" required placeholder="Enter your first name"><br>
		<label for="middle-name">Middle name:</label>
		<input type="text" class="name" required placeholder="Enter your middle name"><br>
		<label for="last-name">Last name:<label>
		<input type="text" class="name" required placeholder="Enter your last name"><br>
		<label for="salutation-select">Choose salutation:</label>
		<select id="salutation" required>
			<option value="">--Please choose an adequate salutation--</option>
			<option value="mr">Mr</option>
			<option value="ms">Ms</option>
			<option value="mrs">Mrs</option>
			<option value="sir">Sir</option>
			<option value="prof">Prof</option>
			<option value="dr">Dr</option>
		</select><br>
		<label for="age">Age:</label>
		<input type="number" id="age" name="age" min="17" max="120" required><br>
	</form>
</body>
</html>

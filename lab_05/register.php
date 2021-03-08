<?php 
$file = 'csvfile/data.csv'; 
$names = $_POST['first-name'] . chr(44) . $_POST['middle-name'] . chr(44) . $_POST['last-name'] . chr(44);
$salutation = $_POST['salutation-select'] . chr(44); 
$age = $_POST['age'] . chr(44);
$email = $_POST['email'] . chr(44);
$phone = $_POST['contact-phone'] . chr(44);
$arrival = $_POST['arrival'] . PHP_EOL;
$data = $names . $salutation . $age . $email . $phone . $arrival; 
file_put_contents($file, $data, FILE_APPEND);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
	<link rel="stylesheet" type="text/css" href="styles/nice.css">
</head>
<body>
	<h1>Register now!</h2>
	<form action="#" method="POST" id="data">
		<label for="first-name">First name:</label>
		<input type="text" id="first-name" name="first-name" pattern="[A-Za-z]{1,}" required placeholder="Enter your first name"><br>
		<label for="middle-name">Middle name:</label>
		<input type="text" id="middle-name" name="middle-name" pattern="[A-Za-z]{1,}" placeholder="Enter your middle name"><br>
		<label for="last-name">Last name:</label>
		<input type="text" id="last-name" name="last-name" pattern="[A-Za-z]{1,}" required placeholder="Enter your last name"><br>
		<label for="salutation-select">Choose salutation:</label>
		<select id="salutation-select" name="salutation-select" required>
			<option value="">--Salutation--</option>
			<option value="mr">Mr</option>
			<option value="ms">Ms</option>
			<option value="mrs">Mrs</option>
			<option value="sir">Sir</option>
			<option value="prof">Prof</option>
			<option value="dr">Dr</option>
		</select><br>
		<label for="age">Age:</label>
		<input type="number" id="age" name="age" min="17" max="120" required><br>
		<label for="email">e-mail:</label>
		<input type="email" id="email" name="email" required placeholder="Enter a valid email address"><br>
		<label for="contact-phone">Contact phone:</label>
		<input type="tel" id="contact-phone" name="contact-phone" pattern="[0-9,+]{1,3} [0-9]{3} [0-9]{3}" placeholder="Pattern: 000 000 000"><br>
		<label for="arrival">Date of arrival:</label>
		<input type="date" id="arrival" name="arrival" min="<?php echo date("Y-m-d"); ?>" required><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>

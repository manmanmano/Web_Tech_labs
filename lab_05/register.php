<?php 

$file = 'csvfile/data.csv'; 

if (isset($_POST['submit'])) {
    if (preg_match("/^[a-zA-Z' ]+$/", $_POST['first-name'])) {
	    $first = $_POST['first-name'] . chr(44);
    } else {
	    die('Invalid first name given!');
    }

    if (isset($_POST['middle-name']) { 
            if (preg_match("/^[a-zA-Z' ]+$/", $_POST['middle-name'])) {
	            $middle = $_POST['middle-name'] . chr(44);
        } else {
	        die('Invalid second name given!');
        }
    }

    if (preg_match("/^[a-zA-Z' ]+$/", $_POST['last-name'])) {
	    $last = $_POST['last-name'] . chr(44);
    } else {
	    die('Invalid last name given!');
    }   

    $salutation = $_POST['salutation-select'] . chr(44); 

    if ($_POST['age'] > 17 && is_numeric($_POST['age'])) {
	    $age = $_POST['age'] . chr(44);
    } else {
	    die('Invalid age given!'); 
    }

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'] . chr(44);
    } else {
        die('Invalid email given!');
    }

    $phone = $_POST['contact-phone'] . chr(44);

    $arrival = $_POST['arrival'] . PHP_EOL;

    $data = $names . $salutation . $age . $email . $phone . $arrival; 
    echo 'Registration confirmed!' . PHP_EOL . 'Registered information: ' . $data;

    file_put_contents($file, $data, FILE_APPEND);
}

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

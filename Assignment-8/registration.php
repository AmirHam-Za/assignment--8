<?php

// Initialize variables
$first_name = $last_name = $email = $password = $confirm_password = "";
$first_name_err = $last_name_err = $email_err = $password_err = $confirm_password_err = "";

// Validate form data on form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Validate First Name
	if (empty(trim($_POST["first_name"]))) {
		$first_name_err = "Please enter your first name.";
	} else {
		$first_name = trim($_POST["first_name"]);
	}

	// Validate Last Name
	if (empty(trim($_POST["last_name"]))) {
		$last_name_err = "Please enter your last name.";
	} else {
		$last_name = trim($_POST["last_name"]);
	}

	// Validate Email Address
	if (empty(trim($_POST["email"]))) {
		$email_err = "Please enter your email address.";
	} else {
		$email = trim($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email_err = "Invalid email format.";
		}
	}

	// Validate Password
	if (empty(trim($_POST["password"]))) {
		$password_err = "Please enter a password.";
	} else {
		$password = trim($_POST["password"]);
	}

	// Validate Confirm Password
	if (empty(trim($_POST["confirm_password"]))) {
		$confirm_password_err = "Please confirm your password.";
	} else {
		$confirm_password = trim($_POST["confirm_password"]);
		if ($confirm_password !== $password) {
			$confirm_password_err = "Passwords do not match.";
		}
	}

	// If no errors, proceed with registration and display success message
	if (empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
		echo "<p>Registration successful! Welcome, " . $first_name . "!</p>";
		// TODO: Save user data to database or other storage mechanism
	}
}
?>

<a href="index.php">Home</a>
<h2>Registration Form</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<label for="first_name">First Name:</label>
	<input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>"><br>
	<span><?php echo $first_name_err; ?></span><br>
	<label for="last_name">Last Name:</label>
	<input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>"><br>
	<span><?php echo $last_name_err; ?></span><br>
	<label for="email">Email:</label>
	<input type="email" name="email" id="email" value="<?php echo $email; ?>"><br>
	<span><?php echo $email_err; ?></span><br>
	<label for="password">Password:</label>
	<input type="password" name="password" id="password"><br>
	<span><?php echo $password_err; ?></span><br>
	<label for="confirm_password">Confirm Password:</label>
	<input type="password" name="confirm_password" id="confirm_password"><br>
	<span><?php echo $confirm_password_err; ?></span><br>
	<input type="submit">
</form>









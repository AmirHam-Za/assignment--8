<?php


if (isset($_POST["submit"])) {
       $user = $_POST["first_name"];
       $pass = $_POST["password"];
       if ($user == $first_name && $pass == $password ){
           echo "User name & password not match ";	
       }
   
       echo "Error ! User name & password not match ";	
}

?>
<a href="index.php">Home</a>
<h1>User Login Form</h1>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   <label for="email">Email Address:</label>
   <input type="email" name="email" required><br><br>
   <label for="password">Password:</label>
   <input type="password" name="password" required><br><br>
   <input type="submit">
</form>




<?php 
// If no errors, proceed with registration and display success message
if (empty($user) && empty($pass)) {
    echo "<p>Registration successful! Welcome!</p>";
    // TODO: Save user data to database or other storage mechanism
}

?>
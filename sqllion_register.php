<?php
$page_title = 'Register';
include('sqllion_header.html');
include('sqllion_user_data.php');

set_error_handler('error_handler');
function error_handler($level, $message, $file, $line) {
	echo "Error [$level] : $message <br> (Check line $line in $file)";
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require('database_connection/connect_db.php');
	$errors = array();
	
	
	if(empty($_POST['first_name'])) {
		$errors[] = "Enter your first name."; 
	}
	else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}
	
	if(empty($_POST['last_name'])) {
		$errors[] = "Enter your last name."; 
	}
	else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}
	
	if(empty($_POST['email'])) {
		$errors[] = "Enter your email address."; 
	}
	else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	if(empty($_POST['pref_color'])) {
		$errors[] = "Choose your preferred color."; 
	}
	else {
		$pc = mysqli_real_escape_string($dbc, trim($_POST['pref_color']));
		switch ($pc) {
			case "R":
				$b = "1st";
				break;
			case "G":
				$b = "2nd";
				break;
			case "B":
				$b = "3rd";
				break;
			default:
				$errors = "Battalion assignment failed. Feel free to try again later!";
			}
	}
	
	if(!empty($_POST['pass1'])) {
		if($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = "Passwords do not match.";
		}
		else {
			$p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	}
	else {
		$errors[] = "Enter a password."; 
	}
	
	if(empty($errors)) {
		$q = "SELECT user_id FROM sqllion_users WHERE email = '$e'";
		$r = mysqli_query($dbc, $q);
		if(mysqli_num_rows($r) != 0) {
			$errors[] = "Email adress already registered. <a href = 'sqllion_login.php'>Login</a>";
		}
	}
	
	
	if (empty($errors)) {
	$q = "INSERT INTO sqllion_users (first_name, last_name, email, pass, reg_date, battalion, balance, inventory_id) VALUES ('$fn', '$ln', '$e', SHA2('$p', 256), NOW(), '$b', 0, 0)";
	$r = mysqli_query($dbc, $q);
	if($r) {
		echo "<h1>Registered!</h1>";
		echo "<p>Welcome to the SQL army!</p>";
		echo "<p>You are part of the $b Battalion!</p>";
		echo "<a href = 'sqllion_login.php'>Login</a>";
		mysqli_close($dbc);
		include('sqllion_footer.html');
		exit();
		}
		else {
			echo "<p>" . mysqli_error($dbc) . "</p>";
		}
	}
		
	else {
		echo "<h1>It's an error!</h1>
		<p class = 'major_subheading'>The following error(s) occured: <br>";
		foreach($errors as $msg) {
			echo "&bull; $msg <br>";
		}
		echo "</p><h3>Feel free to try again.</h3><br>";
		mysqli_close($dbc);
	}
}
?>

<h1>Join the SQL army!</h1>

<form action = "sqllion_register.php" method = "POST">
<p>
First Name: <input type = "text" name = "first_name"
			value = "<?php if(isset($POST['first_name']))
					echo $_POST['first_name']; ?>">
					
Last Name: <input type = "text" name = "last_name"
			value = "<?php if(isset($POST['last_name']))
					echo $_POST['last_name']; ?>">
</p> <p>
Email Address: <input type = "text" name = "email"
			value = "<?php if(isset($POST['email']))
					echo $_POST['email']; ?>">
</p> <p>
Password: <input type = "password" name = "pass1"
			value = "<?php if(isset($POST['pass1']))
					echo $_POST['pass1']; ?>">
					
Repeat Password: <input type = "password" name = "pass2"
			value = "<?php if(isset($POST['pass2']))
					echo $_POST['pass2']; ?>">
</p> <p>
Preferred color: 
<input type = "radio" value = "R", name = "pref_color"> Red
<input type = "radio" value = "G", name = "pref_color"> Green
<input type = "radio" value = "B", name = "pref_color"> Blue
</p> <p>
<input type = "submit" value = "Register!"> </p>
</form>


<?php include('sqllion_footer.html'); ?>

<!-- 
$fields = array('first_name' => "first name", 'last_name' => "last name", 'email' => "email", 'pass_1' => "password");

foreach($fields as $field => $name) {
		if(empty($_POST['$field'])) {
		$errors[] = "Please enter your $name."; 
		}
		else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['$$field']));
		}
	} 
-->
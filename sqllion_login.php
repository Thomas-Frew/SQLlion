<?php
$page_title = 'Login';
include('sqllion_header.html');
include('sqllion_user_data.php');

if(isset($errors) && !empty($errors)) {
	echo "<h1>It's an error!</h1>
	<p class = 'major_subheading'>The following error(s) occured: <br>";
	foreach($errors as $msg) {
		echo "&bull; $msg <br>";
	}
	echo "</p><h3>Feel free to try again or <a href = 'sqllion_register.php'>Register</a></h3>";
}
?>

<h1>Login</h1>
<form action = "sqllion_login_action.php" method = "POST">
<p>
Email Address: <input type = "text" name = "email">
</p> <p>
Password: <input type = "password" name = "pass">
</p> <p>
<input type = "submit" value = "Login!"> </p>
</form>

<?php include('sqllion_footer.html'); ?>

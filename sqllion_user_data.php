<?php
if(!isset($_SESSION['user_id'])) {
	echo "<div class = 'user_data'>";
		echo "<h3><a href = 'sqllion_register.php'>Register</a> &bull; <a href = 'sqllion_login.php'>Login</a></h3>";
	echo "</div>";
}
else {
	echo "<div class = 'user_data'>";
		echo "<h2>{$_SESSION['first_name']} {$_SESSION['last_name']}</h2>";
		echo "<p class = 'major_subheading'><a href = 'sqllion_home.php'>Home</a> &bull; <a href = 'sqllion_settings.php'>Settings</a> &bull; <a href = 'sqllion_logout.php'>Logout</a></p>";
		echo "<p class = 'minor_subheading'>{$_SESSION['balance']} DBcoins </p>";
	echo "</div>";
}
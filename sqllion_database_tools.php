<?php
function load($page = 'sqllion_login.php') {
	$url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	$url = rtrim($url, '/\\');
	$url .= '/' . $page;
	header("Location: $url");
	exit();
}

function login_validate($dbc, $email = '', $pwd = '') {
	$errors = array();
	
	if(empty($email)) {
		$errors[] = "Enter your email address.";
	}
	else {
		$e = mysqli_real_escape_string($dbc, trim($email));
	}
	
	if(empty($pwd)) {
		$errors[] = "Enter your password."; 
	}
	else {
		$p = mysqli_real_escape_string($dbc, trim($pwd));
	}

	if(empty($errors)) {
		$q = "SELECT user_id, first_name, last_name, battalion, balance, inventory_id FROM sqllion_users WHERE email = '$e' AND pass = SHA2('$p', 256)";
		$r = mysqli_query($dbc, $q);
	
		if(mysqli_num_rows($r) == 1) {
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			return array(true, $row);
		}
		else {
			$errors[] = "Email address and password not found.";
		}
	}
	return array(false, $errors);
}
?>

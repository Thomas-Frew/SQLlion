<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
require('sqllion_database_tools.php');

if(!isset($_SESSION['user_id'])) {
	load();
}
	
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array();
	
	require('database_connection/connect_db.php');
	$q = "UPDATE sqllion_users SET inventory_id = '{$_POST['new_weapon']}' WHERE user_id = '{$_SESSION['user_id']}'";
	$r = mysqli_query($dbc, $q);

	if(mysqli_affected_rows($dbc) == 1) {
		$success = True;
		$_SESSION['inventory_id'] = $_POST['new_weapon'];
		include('sqllion_settings.php');
	}
	elseif (mysqli_affected_rows($dbc) == 0){
		$errors[] = "You've already equipped this item!";
		include('sqllion_settings.php');
	}
	else {
		$errors[] = "Database connection failed. Feel free to try again later!";
		include('sqllion_settings.php');
	}
	mysqli_close($dbc);
}
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require('database_connection/connect_db.php');
	require('sqllion_database_tools.php');
	
	$errors = array();
	list($check, $data) = login_validate($dbc, $_POST['email'], $_POST['pass']);
	
	if ($check) {
		session_start();
	
		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['first_name'] = $data['first_name'];
		$_SESSION['last_name'] = $data['last_name'];
		$_SESSION['battalion'] = $data['battalion'];
		
		$_SESSION['balance'] = $data['balance'];
		$_SESSION['inventory_id'] = $data['inventory_id'];
		
		load('sqllion_home.php');
	}
	else {
		$errors = $data;
	}
	mysqli_close($dbc);
	include('sqllion_login.php');
}
?>

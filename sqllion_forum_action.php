<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
require('sqllion_database_tools.php');

if(!isset($_SESSION['user_id'])) {
	load();
}
require('database_connection/connect_db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array();
	
	if(empty($_POST['subject'])) {
		$errors[] = "Please enter a subject for this post.";
	}
	else {
		$sub = mysqli_real_escape_string($dbc, trim($_POST['subject']));
	}
	
	if(empty($_POST['message'])) {
		$errors[] =  "Please enter a message for this post.";
	}
	else {
		$mes = mysqli_real_escape_string($dbc, trim($_POST['message']));
	}
	
	if(!empty($_POST['subject']) && !empty($_POST['message'])) {
		
		$q = "INSERT INTO sqllion_forum (first_name, last_name, subject, message, post_date)
		VALUES('{$_SESSION['first_name']}', '{$_SESSION['last_name']}', '$sub', '$mes', NOW())";
		$r = mysqli_query($dbc, $q);
		
		if(mysqli_affected_rows($dbc) == 1) {
			include('sqllion_forum.php');
		}
		else {
			$errors[] = "Database connection failed. Feel free to try again later!";
			include('sqllion_forum_post.php');
		}
		mysqli_close($dbc);
	}
	else {
		include('sqllion_forum_post.php');
	}
}
?>
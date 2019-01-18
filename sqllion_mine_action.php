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
	
	if(empty($_POST['location'])) {
		$errors[] = "Please select an area to mine.";
		include('sqllion_mine.php');
	}
	else {
		$location_pair = explode (", ", $_POST['location']);
		$x_pos = $location_pair[0];
		$y_pos = $location_pair[1];
		
		require('database_connection/connect_db.php');
		$q = "SELECT x_pos, y_pos, terrain, maximum, minimum FROM sqllion_mine WHERE x_pos = '$x_pos' AND y_pos = '$y_pos'";
		$r = mysqli_query($dbc, $q);
	
		if(mysqli_num_rows($r) == 1) {
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
		
		$_SESSION['x_pos'] = $row['x_pos'];
		$_SESSION['y_pos'] = $row['y_pos'];
		$_SESSION['terrain'] = $row['terrain'];
		$_SESSION['minimum'] = $row['minimum'];
		$_SESSION['maximum'] = $row['maximum'];

		load('sqllion_mine_result.php');
		}
		else {
			$errors[] = "Mine location not indexed. Feel free to try again!";
			include('sqllion_mine.php');
		}
		mysqli_close($dbc);
	}
}	
?>

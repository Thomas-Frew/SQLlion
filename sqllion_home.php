<?php
if(!isset($_SESSION)) { 
    session_start(); 
}

if(!isset($_SESSION['user_id'])) {
	require('sqllion_database_tools.php');
	load();
}

$page_title = 'Home';
include('sqllion_header.html');
include('sqllion_user_data.php');

echo "<h1>Home</h1>";
echo "<p class = 'major_subheading'>Welcome back {$_SESSION['first_name']} {$_SESSION['last_name']}! What's on the agenda?</p>";

include('sqllion_footer.html');
?>

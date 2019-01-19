<?php
if(!isset($_SESSION)) { 
    session_start(); 
}

if(!isset($_SESSION['user_id'])) {
	require('sqllion_database_tools.php');
	load();
}

$_SESSION = array();
session_destroy();

$page_title = 'Logout';
include('sqllion_header.html');
include('sqllion_user_data.php');

echo "<h1>So long!</h1>";
echo "<p class = 'major_subheading'>You have successfully been logged out.</p>";

include('sqllion_footer.html');
?>
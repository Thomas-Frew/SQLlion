<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
require('database_connection/connect_db.php');
	
if(!isset($_SESSION['user_id'])) {
	require('sqllion_database_tools.php');
	load();
}

$item_value = rand($_SESSION['minimum'], $_SESSION['maximum']) / 100;
$old_balance = $_SESSION['balance'];
$new_balance = $item_value + $_SESSION['balance'];

$q = "UPDATE sqllion_users SET balance = $new_balance WHERE user_id = {$_SESSION['user_id']}";
$r = mysqli_query($dbc, $q);

if($r) {
	$_SESSION['balance'] = $new_balance;
}
else {
	$errors[] = "Databse connection failed.";
	load('sqllion_mine.php');
}

$page_title = 'Mine';
include('sqllion_header.html');
include('sqllion_user_data.php');

echo "<h1>Let's see the results!</h1>";
echo "<p class = 'major_subheading'>By mining in the {$_SESSION['terrain']} at ({$_SESSION['x_pos']}, {$_SESSION['y_pos']}), you found treasure worth $item_value DBcoins!</p>";
echo "<h3>Refresh the page to dig again in the same location, or go head back to the <a href = 'sqllion_mine.php'>Mine</a> to change it!</h3>";

include('sqllion_footer.html');
?>
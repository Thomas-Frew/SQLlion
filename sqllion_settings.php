<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
require('database_connection/connect_db.php');

if(!isset($_SESSION['user_id'])) {
	require('sqllion_database_tools.php');
	load();
}

$page_title = 'Settings';
include('sqllion_header.html');
include('sqllion_user_data.php');

if(isset($errors) && !empty($errors)) {
	echo "<h1>It's an error!</h1>
	<p class = 'major_subheading'>The following error(s) occured: <br>";
	foreach($errors as $msg) {
		echo "&bull; $msg <br>";
	}
}

if(isset($success)) {
	echo "<h1>Success!</h1>
	<p class = 'major_subheading'>Your weapon is now equipped.<br>";
}

echo "<h1>Settings</h1>";
echo "<p class = 'major_subheading'>Here, you can change up settings and equip items to make your experience better!</p>";

echo "<p>Change Weapon: <form action = sqllion_settings_action.php method = 'POST'>";
echo "<select name = 'new_weapon'>";
echo "<option value = 0>None</option>";

$q = "SELECT inventory_id, item_name FROM sqllion_inventory WHERE user_id = {$_SESSION['user_id']} ORDER BY item_name ASC";
$r = mysqli_query($dbc, $q);

while($weapons = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	echo "<option value = '$weapons[inventory_id]'>$weapons[item_name]</option>";
}
echo ("</select></p>");

echo "<p><input type = 'submit' value = 'Save' name = 'save'></p>";
echo "</form>";
		
include('sqllion_footer.html');
 ?>
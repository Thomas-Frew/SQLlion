<?php
if(!isset($_SESSION)) { 
    session_start(); 
}

if(!isset($_SESSION['user_id'])) {
	require('sqllion_database_tools.php');
	load();
}

$page_title = 'Transaction Complete';
include('sqllion_header.html');
include('sqllion_user_data.php');

echo "<h1>Transaction Complete</h1>";
echo "<p class = 'major_subheading'>You bought a {$_SESSION['item_name']} for {$_SESSION['item_price']} DBcoins! You can equip it in your <a href = 'sqllion_settings.php'>settings</a>!<p>";

include('sqllion_footer.html');
 ?>
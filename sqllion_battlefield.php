<?php
if(!isset($_SESSION)) { 
    session_start(); 
}

if(!isset($_SESSION['user_id'])) {
	require('sqllion_database_tools.php');
	load();
}

$page_title = 'Battlefield';
include('sqllion_header.html');
include('sqllion_user_data.php');

if(isset($errors) && !empty($errors)) {
	echo "<h1>It's an error!</h1>
	<p class = 'major_subheading'>The following error(s) occured: <br>";
	foreach($errors as $msg) {
		echo "&bull; $msg <br>";
	}
}

echo "<h1>Battlefield</h1>";
echo "<p class = 'major_subheading'>Feeling heroic? Here, you can embark on quests, battle syntax monsters and get rewarded with DBcoins! That is, if you win...</p>";

echo "<form action = 'sqllion_battlefield_action.php' method = 'POST'>";
for ($y = 3; $y >= -3; $y--) {
	for ($x = -3; $x <= 3; $x++) {
		echo "<input type = 'radio' name = 'location' value = '$x, $y'>";
	}
	echo "<br>";
}
echo "<div class = 'center_submit'><input type = 'Submit', value = 'Embark'> on a quest!</input></div>";
echo "</form>";

include('sqllion_footer.html');
?>
<?php
if(!isset($_SESSION)) { 
    session_start(); 
}

if(!isset($_SESSION['user_id'])) {
	require('sqllion_database_tools.php');
	load();
}

$page_title = 'Mine';
include('sqllion_header.html');
include('sqllion_user_data.php');

if(isset($errors) && !empty($errors)) {
	echo "<h1>It's an error!</h1>
	<p class = 'major_subheading'>The following error(s) occured: <br>";
	foreach($errors as $msg) {
		echo "&bull; $msg <br>";
	}
}

echo "<h1>Mine</h1>";
echo "<p class = 'major_subheading'>Need some extra funds? Here, you can choose a spot to mine for some precious DBcoins! However, each spot varies in quality: which is the best?</p>";

echo "<form action = 'sqllion_mine_action.php' method = 'POST'>";
for ($y = 3; $y >= -3; $y--) {
	for ($x = -3; $x <= 3; $x++) {
		echo "<input type = 'radio' name = 'location' value = '$x, $y'>";
	}
	echo "<br>";
}
echo "<div class = 'center_submit'>Ready? Let's <input type = 'Submit', value = 'Mine!'></input></div>";
echo "</form>";

include('sqllion_footer.html');
?>
<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
require('database_connection/connect_db.php');

if(!isset($_SESSION['user_id'])) {
	require('sqllion_database_tools.php');
	load();
}

$page_title = 'Forum';
include('sqllion_header.html');
include('sqllion_user_data.php');

if(isset($errors) && !empty($errors)) {
	echo "<h1>It's an error!</h1>
	<p class = 'major_subheading'>The following error(s) occured: <br>";
	foreach($errors as $msg) {
		echo "&bull; $msg <br>";
	}
}

echo "<h1>Classified Intelligence Forum</h1>";
echo "<p class = 'major_subheading'>Post your message below:</p>";
?>

<form action = "sqllion_forum_action.php" method = "POST" accept-charset = "utf-8">
<p>
</p> Subject: <p>
<input name = "subject" type = "text" size = "64">
</p> <p>
</p> Message: <p>
<textarea name = "message" rows = "5" cols = "50">
</textarea>
</p> <p>
<input type = "submit" value = "Send!"> </p>
</form>

<?php include('sqllion_footer.html'); ?>
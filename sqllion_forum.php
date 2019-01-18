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

echo "<h1>Forum</h1>";
echo "<p class = 'major_subheading'>Need a hand? Here, you can chat with your comrades to get advice on all things SQLlion!</p>";

$q = "SELECT first_name, last_name, post_date, subject, message FROM sqllion_forum";
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) != 0) {
	echo "<p>Here are the messages so far. Why not <a href = 'sqllion_forum_post.php'>post one</a>?</p>";
	echo "<table> <tr> <th>Posted By</th> <th>Subject</th> <th id = 'message_area'>Message</th><tr>";
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo "<tr> <td>" . $row['first_name'] . " " . $row['last_name'] . "<br>" . $row['post_date'] . "</td>";
		echo "<td>" . $row['subject'] . "</td> <td>" . $row['message'] . "</td> </tr>";
	}
	echo "</table>";
}
else {
	echo "<p>There are currently no messages. Why not <a href = 'sqllion_forum_post.php'>post one</a>?</p>";
}

include('sqllion_footer.html'); 
?>

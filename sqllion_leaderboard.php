<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
require('database_connection/connect_db.php');

if(!isset($_SESSION['user_id'])) {
	require('sqllion_database_tools.php');
	load();
}

$page_title = 'Leaderboard';
include('sqllion_header.html');
include('sqllion_user_data.php');

echo "<h1>Leaderboard</h1>";
echo "<p class = 'major_subheading'>Need some friendly competition? Here, you can see how you stack up against your comrades!</p>";

$q = "SELECT first_name, last_name, reg_date, battalion, balance FROM sqllion_users ORDER BY balance DESC";
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) != 0) {
	$count = 1;

	echo "<table> <tr> <th>Rank</th> <th>Name</th> <th>Balance</th> <th>Date Registered</th> <th>Battallion</th><tr>";
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo "<tr> <td>#$count</td>";
		echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
		echo "<td>" . $row['balance'] . "</td>";
		echo "<td>" . $row['reg_date'] . "</td>";
		echo "<td>" . $row['battalion'] . "</td></tr>";
		
		$count ++;
	}
	echo "</table>";
}
else {
	echo "<p>There are currently no users. How did this page even load?</p>";
}

echo "<p> You can also compare yourself against <a href = 'sqllion_leaderboard_battalion.php'>just your battalion</a>.</p>";

include('sqllion_footer.html');
?>
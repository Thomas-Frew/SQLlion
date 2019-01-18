<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
require('database_connection/connect_db.php');

if(!isset($_SESSION['user_id'])) {
	require('sqllion_database_tools.php');
	load();
}

$page_title = 'Shop';
include('sqllion_header.html');
include('sqllion_user_data.php');

if(isset($errors) && !empty($errors)) {
	echo "<h1>It's an error!</h1>
	<p class = 'major_subheading'>The following error(s) occured: <br>";
	foreach($errors as $msg) {
		echo "&bull; $msg <br>";
	}
}

echo "<h1>Shop</h1>";
echo "<p class = 'major_subheading'>It's dangerous to go alone! Here, you can shop for weapons to fight with!<p>";

$q = "SELECT item_name, item_desc, item_img, item_stren, item_price, item_id FROM sqllion_shop";
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) != 0) {
	echo "<table class = 'fully_centered'> <tr>";
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo "<td> <strong>" . $row['item_name'] . "</strong> <br>" . $row['item_desc'];
		echo "<p> <img src = " . $row['item_img'] . "> </p>" . $row['item_stren'] . " Strength &bull; " . $row['item_price'] . " DBcoins &bull; <a href = 'sqllion_shop_action.php?item_id=" . $row['item_id'] ."'>Buy</a>";
	}
	echo "</tr> </table>";
	mysqli_close($dbc);
}
else {
	echo "<p>There are currently no items in the shop. Feel free to suggest one in the <a href = 'sqllion_forum_post.php'>forum</a>!</p>";
}

include('sqllion_footer.html'); ?>
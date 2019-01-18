<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
require('database_connection/connect_db.php');
	
if(!isset($_SESSION['user_id'])) {
	require('sqllion_database_tools.php');
	load();
}

$monster_1_stren = rand($_SESSION['minimum'], $_SESSION['maximum']);
$monster_1_value = $monster_1_stren / 20;
$your_stren = $_SESSION['item_stren'];
$old_balance = $_SESSION['balance'];

if(rand(0, 10) > 9) {
	$double_battle = True;
	
	$monster_2_stren = rand($_SESSION['minimum'], $_SESSION['maximum']);
	$monster_2_value = $monster_1_stren / 20;
	$both_value = $monster_1_value + $monster_2_value;
	
	if($your_stren > $monster_1_stren && $your_stren > $monster_2_stren) {
		$victory = True;
		$new_balance = $old_balance + $both_value;
	}
	else {
		$victory = False;
		$new_balance = $old_balance - $both_value;
		
		if ($new_balance < 0) {
			$new_balance = 0;
		}
	}
}
else {
	$double_battle = False;
	
	if ($your_stren > $monster_1_stren) {
		$victory = True;
		$new_balance = $old_balance + $monster_1_value;
	}
	else {
		$victory = False;
		$new_balance = $old_balance - $monster_1_value;
		
		if ($new_balance < 0) {
			$new_balance = 0;
		}
	}
}

$q = "UPDATE sqllion_users SET balance = $new_balance WHERE user_id = {$_SESSION['user_id']}";
$r = mysqli_query($dbc, $q);

if($r) {
	$_SESSION['balance'] = $new_balance;
}
else {
	$errors[] = "Database connection failed.";
	load('sqllion_battlefield.php');
}

$page_title = 'Battlefield';
include('sqllion_header.html');
include('sqllion_user_data.php');

echo "<h1>Let's see the results!</h1>";

if($double_battle) {
	echo "<p class = 'major_subheading'>By embarking in the {$_SESSION['terrain']} at ({$_SESSION['x_pos']}, {$_SESSION['y_pos']}), you encountered two monsters with strengths of $monster_1_stren and $monster_2_stren!</p>";
	
	if($victory) {
		echo "<p>Since you had a higher strength than both of them ($your_stren), you them and won $both_value DBcoins!</p>";
	}
	else {
		echo "<p>Since you didn't have a higher strength than both of them ($your_stren), you were defeated and lost $both_value DBcoins...</p>";
	}
}
else {
	echo "<p class = 'major_subheading'>By embarking in the {$_SESSION['terrain']} at ({$_SESSION['x_pos']}, {$_SESSION['y_pos']}), you encountered a monster with a strength of $monster_1_stren!</p>";
	
	if($victory) {
		echo "<p>Since you had the higher strength of $your_stren, you defeated it and won $monster_1_value DBcoins!</p>";
	}
	else {
		echo "<p>Since you didn't the higher strength of $your_stren, you were defeated and lost $monster_1_value DBcoins...</p>";
	}
}

echo "<h3>Refresh the page to embark again in the same location, or go head back to the <a href = 'sqllion_battlefield.php'>Battlefield</a> to change it!</h3>";

include('sqllion_footer.html');
?>
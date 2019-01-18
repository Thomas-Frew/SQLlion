<?php
if(!isset($_SESSION)) { 
    session_start(); 
}

if(!isset($_SESSION['user_id'])) {
	require('sqllion_database_tools.php');
	load();
}

if(isset($_GET['item_id'])) {
	$errors = array();
	
	require('database_connection/connect_db.php');
	$item_id = $_GET['item_id'];
	
	$q = "SELECT user_id, item_id FROM sqllion_inventory WHERE item_id = $item_id AND user_id = {$_SESSION['user_id']}";
	$r = mysqli_query($dbc, $q);
	
	if (mysqli_num_rows($r) == 0) {
		$q = "SELECT item_id, item_name, item_price, item_stren FROM sqllion_shop WHERE item_id = $item_id";
		$r = mysqli_query($dbc, $q);
		
		if(mysqli_num_rows($r) == 1) {
			while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
				$item_id = $row['item_id'];
				$item_name = $row['item_name'];
				$item_price = $row['item_price'];
				$item_stren = $row['item_stren'];
			
				if ($_SESSION['balance'] >= $item_price) {
					$old_balance = $_SESSION['balance'];
					$new_balance = $old_balance - $item_price;
					
					$q = "UPDATE sqllion_users SET balance = $new_balance WHERE user_id = {$_SESSION['user_id']}";
					$r = mysqli_query($dbc, $q);
					
					if(mysqli_affected_rows($dbc) == 1) {
						$_SESSION['balance'] = $new_balance;
						
						$q = "INSERT INTO sqllion_inventory (item_id, item_name, item_stren, user_id, purchase_date)
						VALUES('$item_id', '$item_name', '$item_stren', '{$_SESSION['user_id']}', NOW())";
						$r = mysqli_query($dbc, $q);
						
						if(mysqli_affected_rows($dbc) == 1) {	
							$_SESSION['item_name'] = $row['item_name'];
							$_SESSION['item_price'] = $row['item_price'];
							
							mysqli_close($dbc);
							require('sqllion_database_tools.php');
							load('sqllion_shop_result.php');
						}
						else {
							$errors[] = "Database connection failed. Feel free to try again later!";
							include('sqllion_shop.php');
						}
					}
					else {
						$errors[] = "Item not found. Feel free to try again later!";
						include('sqllion_shop.php');
					}
				}
				else {
					$errors[] = "You can't afford this weapon yet!";
					include('sqllion_shop.php');
				}
			}
		}
	}
	else {
		$errors[] = "You've already bought this item! you can equip it in your <a href = 'sqllion_settings.php'>settings</a>.";
		include('sqllion_shop.php');
	}
}
else {
	$errors[] = "Database connection failed. Feel free to try again later!";
	include('sqllion_shop.php');
}
 ?>
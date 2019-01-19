<?php
	$dbc = mysqli_connect
		('localhost','gary','garypass','sqllion')
	OR die 
		(mysqli_connect_error());
	mysqli_set_charset($dbc,'utf8');
?>

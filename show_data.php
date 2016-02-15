<?php 
	require 'connect.inc.php';

	$query = "select id, username, email from users";

	if($query_run = mysql_query($query)){

		while($query_row = mysql_fetch_assoc($query_run)){

			$id = $query_row['id'];
			$user = $query_row['username'];
			$email = $query_row['email'];

			echo $id.'-->'.$user.'-->'.$email;
		}
	}
	else{
		echo mysql_error();
	}
?>
<?php 

	$current_user_id = $_SESSION['user_id'];

	$query = "select id, username, email from users where id=".$current_user_id;

	if($query_run = mysql_query($query)){

		while($query_row = mysql_fetch_assoc($query_run)){

			$id = $query_row['id'];
			$user = $query_row['username'];
			$email = $query_row['email'];
		}
	}
	else{
		echo mysql_error();
	}
?>
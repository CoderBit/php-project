<?php include 'connect.inc.php' ?>

<?php 
	if(isset($_SESSION['user_id'])){
		echo 'You are logged in.';
		include 'header2.php';
	}
	else{
		echo 'You are not logged in.';
		include 'header.php';
	}
?>

<?php
	if(isset($_FILES['file'])){
		$name = $_FILES['file']['name'];
		$size = $_FILES['file']['size'];
		$type = $_FILES['file']['type'];
		$temp_name = $_FILES['file']['tmp_name'];
		$extension = strtolower(substr($name, strpos($name,'.') + 1));
	}
	

	if(isset($name)){
		if(!empty($name)){

			if(($extension=='jpg' || $extension=='jpeg' || $extension=='png') && ($type=='image/jpeg' || $type=='image/jpg' || $type=='image/png') ){

				$location = 'uploads/';

				if(move_uploaded_file($temp_name, $location.$name)){
					echo 'Uploaded!';
				}
				else{
					echo 'There was an error';
				}
			}
			else{
				echo 'File must be jpeg/jpg/png';
			}
		}
		else{
			echo 'Please choose a file';
		}
	}
?>

<form action="edit.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file"></input><br><br>
	<input type="submit" value="Submit"></input>
</form>

<?php include 'footer.php' ?>
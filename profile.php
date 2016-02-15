<?php include 'connect.inc.php' ?>

<?php 
	if(isset($_SESSION['user_id'])){
		include 'header2.php';
	}
	else{
		include 'header.php';
	}
?>

<?php include 'user-details.inc.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/one-page-wonder.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>

<body>

<?php
	$pic_name = 'default.jpg';
	if(isset($_FILES['file'])){
		$name = $_FILES['file']['name'];
		$size = $_FILES['file']['size'];
		$type = $_FILES['file']['type'];
		$temp_name = $_FILES['file']['tmp_name'];
		$extension = strtolower(substr($name, strpos($name,'.') + 1));
		$usr_id = $_SESSION['user_id'];
	}
	

	if(isset($name)){
		if(!empty($name)){

			if(($extension=='jpg' || $extension=='jpeg' || $extension=='png') && ($type=='image/jpeg' || $type=='image/jpg' || $type=='image/png') ){

				$location = 'uploads/profile pics/';
				$pic_name = $usr_id.'.'.$name;
				$_SESSION['pro_pic'] = $pic_name;

				if(move_uploaded_file($temp_name, $location.$pic_name)){
					
					$query1 = "update profile_pic set profile_pic='$pic_name' where id='$usr_id'";

					if($query_run = mysql_query($query1)){
						echo 'Uploaded!';
					}
					else{
						echo 'Upload Failed!';
					}
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

<div class="main-content">
    <div class="container">
  <div class="row">
  <br>
  <h3 class="big-heading">Profile</h3>
    <div class="profile-content">
      <div class="col-sm-3 profile">
        <div class="profile-image">
          <img src="uploads/profile pics/<?php echo $pic_name ?>" >
        </div>
        <div class="upload-image">
        	<form action="profile.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="file"></input><br><br>
				<input type="submit" value="Upload"></input>
			</form>
        </div>
      </div>

      <div class="col-sm-9">
        <div class="details">
        	<h3 class="profile-heading">Details <a href="edit.php" style="float:right; color:#fff;" class="btn"><i class="fa fa-edit edit-icon"></i> Edit</a></h3>
          	<div class="col-md-12">
          		<div class="profile-name">Hello, <?php echo $user ?></div>
          	</div>
        	<div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>

  </div>

<?php include 'footer.php' ?>

 </body>
 </html>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Tom & Jerry</title>

</head>


<?php 
  session_start();
	if(isset($_SESSION['user_id'])){
		echo 'You are logged in.';
		include 'header2.php';
	}
	else{
		include 'header.php';
	}
?>

<body>


    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="images/1.jpg" height="550" width="1280">
        </div>
        <div class="item">
          <img src="images/1.jpg" height="550" width="1280">
        </div>
        <div class="item">
          <img src="images/1.jpg" height="550" width="1280">
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>



<?php include 'footer.php' ?>

</body>
</html>

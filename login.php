<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>

<?php include 'header.php' ?>
<?php include 'connect.inc.php' ?>

<!-- Below php code is for Register form -->
<?php
  if (isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_pass']) ){
    $contact_name = $_POST['contact_name'];
    $contact_email = $_POST['contact_email'];
    $contact_pass = $_POST['contact_pass'];

    if(!empty($contact_name) && !empty($contact_email) && !empty($contact_pass) ){

      $rand = rand();
      $query = "insert into users values('$rand', '$contact_name', '$contact_email', '$contact_pass')";
      $query2 = "insert into profile_pic values('$rand','default.jpg')";
      
      if(!$query_run = mysql_query($query)){
        echo 'Query Failed! Try Again.';
      }
      else{
        echo 'Sucessfully Registered!';
        $query_run2 = mysql_query($query2);
      }

    }
    else{
      echo 'All fields are required';
    }
  }
?>

<!-- Below php code is for login form -->

<?php
  if (isset($_POST['login_name']) && isset($_POST['login_pass']) ){
    $login_name = $_POST['login_name'];
    $login_pass = $_POST['login_pass'];

    if(!empty($login_name) && !empty($login_pass) ){
      
      $query = "select id from users where username='$login_name' and user_pass='$login_pass'";

      if($query_run = mysql_query($query)){

        $query_num_rows = mysql_num_rows($query_run);
        if($query_num_rows==0){
          echo 'Invalid Username or Password!';
        }
        else if($query_num_rows==1){
          $user_id = mysql_result($query_run, 0, 'id');
          $_SESSION['user_id']=$user_id;
          header('Location: index.php');
        }
      }
      else{
        echo 'Query Failed';
      }
    }
    else{
      echo 'All fields are required! ';
    }
  }
?>

<?php

if(!isset($_SESSION['user_id'])){
  

?>

<body>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Login</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Register</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">

        <div role="tabpanel" class="tab-pane fade in active" id="home">

          <form action="login.php" method="POST" class="form-horizontal">
            <div class="form-group">
              <label for="inputname3" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputname3" placeholder="Username" name="login_name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="login_pass">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Sign in</button>
              </div>
            </div>
          </form>

        </div>

        <div role="tabpanel" class="tab-pane fade" id="profile">

          <form action="login.php" method="POST" class="form-horizontal">
            <div class="form-group">
              <label for="exampleInputname1" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="exampleInputname1" name="contact_name" placeholder="Username" required>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="exampleInputEmail1" name="contact_email" placeholder="Email" required>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="exampleInputPassword1" name="contact_pass" placeholder="Password" required>
              </div>
            </div>
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Sign Up</button>
            </div>
          </form>
        </div>

      </div>

    </div>
  </div>
</div>

<?php

}
else if(isset($_SESSION['user_id'])){
  echo 'Your are already logged in.<a href="logout.php">Log out</a>';
}
?>

<?php include 'footer.php' ?>

</body>
</html>

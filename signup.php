<?php 
  ob_start();
  session_start();
  include_once 'dbconnect.php';
  if(isset($_POST["signup"]))
  {
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $query="SELECT * FROM user WHERE firstname='$fname' and lastname='$lname'";
    $res=mysql_query($query);
    $count=mysql_num_rows($res);
    if($count>0)
    {
      echo "<script>alert('already present')</script>"; 
    }
    else
    {
      $query="INSERT into user(firstname,lastname) VALUES('$fname','$lname')";
      $res=mysql_query($query);
      if($res)
      {
        echo "<script>alert('successfull')</script>";
      }
      else
      {
        echo "<script>alert('Error')</script>"; 
      }
    }
  }
?>
<html>
<head>
<title>home</title>
</head>
<!--Initialising css folders-->
<link rel="stylesheet" href="css/materialize.css">
<!--Initialising javascript folders-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<!--Initialising icon font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="center">
<h2>Sign Up</h2>
<div class="row">
    <form method="post">
      <div class="row">
      	<div class="input-field col l3">
          <input id="first_name" type="text" class="validate" name="fname">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col l3">
          <input id="last_name" type="text" class="validate" name="lname">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <button class="waves-effect waves-light btn" type="submit" name="signup">button</button>
    </form>
</div>
</div>
</html>

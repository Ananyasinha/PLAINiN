<?php
session_start();
$conn=new MySQLi("localhost","root","","handcraft");

if(!empty($_SESSION['email']) || !empty($_SESSION['admin']) ){
	header('location:index.php');
}


if (isset($_POST['login'])){
   $email = $_POST['email'];
   $password = $_POST['password'];
   $password_enc = md5($password);

   $select_email = "SELECT * FROM users WHERE email='$email' && password='$password_enc'"; 
   $select_value = $conn->query($select_email);

   if( $select_value->num_rows > 0){
   		$_SESSION['email'] = $email;
   		header('location:index.php');
   }
   else{
   echo "<script>alert('WRONG EMAIL PASSWORD COMBINATION');</script>";
   }	
}

if (isset($_POST['submit'])){
   $email = $_POST['email'];
   $password = $_POST['password'];
   

   $select_email_admin = "SELECT * FROM admin WHERE email='$email' && password='$password'"; 
   $select_value_admin = $conn->query($select_email_admin);

   if( $select_value_admin->num_rows > 0){
   		$_SESSION['admin'] = $email;
   		header('location:admin_home.php');
   }
   else{
   echo "<script>alert('WRONG EMAIL PASSWORD COMBINATION');</script>";
   }	
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>HandCraft | Sign In</title>
<link rel="icon" href="Images/icon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">HandCraft</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav navbar-right">  
			    <li class="dropdown">
			      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Join Us &nbsp<span class="caret"></span></a>
			        <ul class="dropdown-menu" role="menu">
			           <li><a href="signin.php">Sign In</a></li>
			           <li><a href="signup.php">Sign Up</a></li>	            
			        </ul>
			    </li>
		    </ul>
	    </div>
	  </div>
	</nav>

	<div class="container" style="margin-top:100px">
		<div class="row" style="overflow:hidden;">
			<div class="col-lg-6">
				<form class="form-horizontal" action="signin.php" method="POST">
				  <fieldset>
				    <legend>User Login</legend>
				    <div class="form-group">
				      	<div class="col-lg-10">
				        	<input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email">
				    	</div>
				    </div>
				    <div class="form-group">
				      <div class="col-lg-10">
				        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
				      </div>
				    </div>
				    <div class="form-group">
				      <div class="col-lg-10 col-lg-offset-6">
				        <button type="reset" class="btn btn-default">Cancel</button>
				        <button type="submit" class="btn btn-primary" name="login">Login</button>
				      </div>
				    </div>
				  </fieldset>
				</form>
			</div>
			<div class="col-lg-6">
				<form class="form-horizontal" action="signin.php" method="POST">
				  <fieldset>
				    <legend>Admin Login</legend>
				    <div class="form-group">
				      	<div class="col-lg-10">
				        	<input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email">
				    	</div>
				    </div>
				    <div class="form-group">
				      <div class="col-lg-10">
				        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
				      </div>
				    </div>
				    <div class="form-group">
				      <div class="col-lg-10 col-lg-offset-6">
				        <button type="reset" class="btn btn-default">Cancel</button>
				        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
				      </div>
				    </div>
				  </fieldset>
				</form><br/>
				Admin Email : admin@handcraft.com<br/>
				Password : admin
			</div>
		</div>
	</div>	

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>
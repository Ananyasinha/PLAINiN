<?php
session_start();
$conn=new MySQLi("localhost","root","","handcraft");

if(!empty($_SESSION['email']) || !empty($_SESSION['admin']) ){
	header('location:index.php');
}


if (isset($_POST['submit'])){
   $email = $_POST['email'];
   $name = $_POST['name'];
   $gender = $_POST['gender'];  
   $password = $_POST['password'];
   $cnf_password = $_POST['cnf_password'];
   $password_enc = md5($password);

   if($password==$cnf_password){      
      $check_email= "SELECT email FROM users WHERE email='$email'";  
      $check_email_resultset = $conn->query($check_email);
        if($check_email_resultset->num_rows >0)
        {
              header("Location:signin.php");          
        }
      else{
        $addingvalues = "INSERT INTO users VALUES ('','$name','$email','$gender','$password_enc',now())"; 
        $r= $conn->query($addingvalues);
      }
      if($r){
      $_SESSION['email'] = $email;	
      header("Location:index.php");
      }
   }else{
       echo "<script>alert('Passwords Do not Match.');</script>";
        }
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>HandCraft | Sign Up</title>
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
	<nav class="navbar navbar-default navbar-fixed-bottom">
	  <div class="container-fluid">
	  </div>
	</nav>

	<div class="container" style="margin-top:100px">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" action="signup.php" method="POST">
				  <fieldset>
				    <legend>Join HandCraft</legend>
				    <div class="form-group">
				      <div class="col-lg-10">
				        <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" required>
				      </div>	
				    </div>
				    <div class="form-group">
				      	<div class="col-lg-10">
				        	<input type="text" name="email" class="form-control" id="inputEmail"  placeholder="Email" required>
				    	</div>
				    </div>
				    <div class="form-group">
				      <div class="col-lg-10">
				        <div class="radio">
				          <label>
				            <input type="radio" name="gender" id="optionsRadios1" value="MALE" required>
				            Male
				          </label>
				        </div>
				        <div class="radio">
				          <label>
				            <input type="radio" name="gender" id="optionsRadios2" value="FEMALE" required>
				            Female
				          </label>
				        </div>
				      </div>
				    </div>
				    <div class="form-group">
				      <div class="col-lg-10">
				        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
				      </div>
				    </div>
				    <div class="form-group">
				      <div class="col-lg-10">
				        <input type="password" class="form-control" id="inputCnfpassword" name="cnf_password" placeholder="Confirm Password" required>
				      </div>
				    </div>
				    <div class="form-group">
				      <div class="col-lg-10 col-lg-offset-6">
				        <button type="reset" class="btn btn-default">Cancel</button>
				        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
				      </div>
				    </div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>	

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>
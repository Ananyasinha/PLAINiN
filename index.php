<?php
session_start();
$conn=new MySQLi("localhost","root","","handcraft");

if(!empty($_SESSION['admin'])){
	header('location:admin_home.php');
}



	if (isset($_POST['send_message'])){
	   $email = $_POST['email'];
	   $name = $_POST['name'];
	   $subject = $_POST['subject'];
	   $message = $_POST['message']; 
	   
	   $addingvalues_query = "INSERT INTO queries VALUES('','$name','$email','$subject','$message',now())"; 
	   $r= $conn->query($addingvalues_query); 

	   header("Location:index.php");
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>HandCraft | Home</title>
<link rel="icon" href="Images/icon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
<style type="text/css">
.navbar-default{border-radius:0px 0px 0px 0px}	

.title {  
  text-align: center;
  margin-top:-420px;
  padding: 10px;
  font-size:50px;
  color: #FFF;
}

</style>
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
	      <a class="navbar-brand" href="#">HandCraft</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li id="home"><a href="index.php">Home</a></li>
	        <li id="about_us"><a href="#">About Us</a></li>
	        <li id="services"><a href="#">Services</a></li>
	        <li id="contact"><a href="#">Contact Us</a></li>	      	
	      </ul>
	    
		    <ul class="nav navbar-nav navbar-right">  
			    <?php 			    
			    if(!empty($_SESSION['email'])){
				    $email = $_SESSION['email'];
				    $select_users = "SELECT * FROM users WHERE email='$email'";
				    $users_data = $conn->query($select_users);
				    $row = $users_data->fetch_assoc();
				    $name = $row['name'];
			    ?>
			    <li class="dropdown">
			      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $name ?> &nbsp<span class="caret"></span></a>
			        <ul class="dropdown-menu" role="menu">
			           <li><a href="logout.php">Logout</a></li>	            
			        </ul>
			    </li>
			    <?php } else{ ?>
			    <li class="dropdown">
			      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Join Us &nbsp<span class="caret"></span></a>
			        <ul class="dropdown-menu" role="menu">
			           <li><a href="signin.php">Sign In</a></li>
			           <li><a href="signup.php">Sign Up</a></li>	            
			        </ul>
			    </li>
			    <?php } ?>
		    </ul>
	    </div>
	  </div>
	</nav>

	<div id="image_container" class="container-fluid" style="width:100%;background-color:red;padding-left:0px;padding-right:0px">
     	<img src="images/1.jpg" width="100%" />	 
    	<div class="title">Hand Crafted Designs</div>
    </div>

	
	<div id="about" class="container-fluid" style="margin-top:350px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<center><h1><b>About Us</b></h1></center>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<center>"We are a creative digital studio based in Sydney, Australia eosquiso uam asperi oresipsum itaque dignissimos reprehen derit. non quos ratione ipsa facilisis, Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock."</center>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<center><h3>Team Members</h3></center>
				</div>
			</div>
			<div class="row" style="margin-top:20px">
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="images/team-1.jpg"/>
					</div>
				</div>
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="images/team-2.jpg"/>
					</div>
				</div>
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="images/team-3.jpg"/>
					</div>
				</div>
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="images/team-4.jpg"/>
					</div>
				</div>
			</div>
		</div>			
	</div>
	

	<br/><br/><br/>
	<div id="services_area" class="container-fluid" style="background-color:#e0e0e0">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<center><h1><b>Services</b></h1></center>
				</div>
			</div>
			<br/><br/>
			<div class="row" style="margin-top:25px">
				<div class="col-md-3" style="cursor:pointer">
					<div class="thumbnail">
						<img src="images/graphic_design.png" width="100" />
					<br/>
					<center><h4>Graphic Design</h4></center>
					<br/>
					<center>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec odio ipsum. Suspendisse cursus malesuada facilisis.
					</center><br/>
					</div>
				</div>
				<div class="col-md-3" style="cursor:pointer">
					<div class="thumbnail">
						<img src="images/responsive_web_design.png" width="100" />
					<br/>
					<center><h4>Reponsive Web Design</h4></center>
					<br/>
					<center>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec odio ipsum. Suspendisse cursus malesuada facilisis.
					</center><br/>
					</div>
				</div>
				<div class="col-md-3" style="cursor:pointer">
					<div class="thumbnail">
						<img src="images/clean_and_valid_code.png" width="100" />
					<br/>
					<center><h4>Clean And Valid Code</h4></center>
					<br/>
					<center>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec odio ipsum. Suspendisse cursus malesuada facilisis.
					</center><br/>
					</div>
				</div>
				<div class="col-md-3" style="cursor:pointer">
					<div class="thumbnail">
						<img src="images/seo_ready.png" width="122" />
					<br/>
					<center><h4>SEO Ready</h4></center>
					<br/>
					<center>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec odio ipsum. Suspendisse cursus malesuada facilisis.
					</center><br/>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top:25px">
				<div class="col-md-3" style="cursor:pointer">
					<div class="thumbnail">
						<img src="images/marketing.png" width="100" />
					<br/>
					<center><h4>Marketing</h4></center>
					<br/>
					<center>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec odio ipsum. Suspendisse cursus malesuada facilisis.
					</center><br/>
					</div>
				</div>
				<div class="col-md-3" style="cursor:pointer">
					<div class="thumbnail">
						<img src="images/creative_team.png" width="100" />
					<br/>
					<center><h4>Creative Team</h4></center>
					<br/>
					<center>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec odio ipsum. Suspendisse cursus malesuada facilisis.
					</center><br/>
					</div>
				</div>
				<div class="col-md-3" style="cursor:pointer">
					<div class="thumbnail">
						<img src="images/free_support.png" width="100" />
					<br/>
					<center><h4>24*7 Free Support</h4></center>
					<br/>
					<center>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec odio ipsum. Suspendisse cursus malesuada facilisis.
					</center><br/>
					</div>
				</div>
				<div class="col-md-3" style="cursor:pointer">
					<div class="thumbnail">
						<img src="images/development.png" width="100" />
					<br/>
					<center><h4>SEO Ready</h4></center>
					<br/>
					<center>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec odio ipsum. Suspendisse cursus malesuada facilisis.
					</center><br/>
					</div>
				</div>
			</div>
		<br/><br/>
		</div>
	</div>	
	<br/>
	<div id="contact_area" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<center><h1>Contact Us</h1></center><br/>
				</div>
			</div>
			<br/><br/>
			<div class="row">
				<div class="col-md-7">
					<form class="form-horizontal" action="index.php" method="POST">
						<fieldset>
						    <legend>We are waiting to hear from you</legend>
						    <div class="form-group">
						      <div class="col-lg-6">
						        <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
						      </div>
						      <div class="col-lg-6">
						        <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email Address">
						      </div>
						    </div>
						    <div class="form-group">
						      
						      <div class="col-lg-12">
						        <input type="text" name="subject" class="form-control" id="inputSubject" placeholder="Subject">
						      </div>
						    </div>
						    <div class="form-group">
						      <div class="col-lg-12">
						        <textarea class="form-control" name="message" rows="3" id="textArea" placeholder="Message"></textarea> 
						      </div>
						    </div>
						</fieldset>
						<div class="form-group">
					      <div class="col-lg-12">
					        <button type="reset" class="btn btn-default">Cancel</button>
					        <button type="submit" class="btn btn-primary" name="send_message">Send Mesage</button>
					      </div>
    					</div>
					</form>
				</div>
				<div class="col-md-5">
					<div class="row">
						<div class="col-md-12">
							<legend>Contact Info</legend>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h5>ADDRESS :</h5>
							<h6>124, Munna Wali Street, Lorem Ipsum, 302012</h6>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h5>Call Us :</h5>
							<h6>+91 1200 234599</h6>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h5>Mail :</h5>
							<h6>contact@handlooms.com</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<script>

    $("#about_us").click(function() {
    $('html,body').animate({
        scrollTop: $("#about").offset().top
    },2000);
	});

	$("#services").click(function() {
    $('html,body').animate({
        scrollTop: $("#services_area").offset().top
    },2000);
	});

	$("#contact").click(function() {
    $('html,body').animate({
        scrollTop: $("#contact_area").offset().top
    },2000);
	});

	$("#home").click(function() {
    $('html,body').animate({
        scrollTop: $("#image_container").offset().top
    },2000);
	});

</script>

</body>
</html>
<?php
session_start();
$conn=new MySQLi("localhost","root","","handcraft");

if(empty($_SESSION['admin'])){
	header('location:signin.php');
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>HandCraft | Admin Panel</title>
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
			    <?php 			    
			    if(!empty($_SESSION['admin'])){
				    $email = $_SESSION['admin'];
				    $select_users = "SELECT * FROM admin WHERE email='$email'";
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

	<div class="container" style="margin-top:100px">
		<div class="row" style="overflow:hidden;">
			<div class="col-lg-12">
				<legend> &nbspUser's List</legend>
					<?php  
						  $select_queries = "SELECT * FROM users";
						  $show_query = $conn->query($select_queries);
						  
						  if ( $queries = $show_query->num_rows > 0 ){
					?>
						<table class="table table-striped table-hover ">
							  <thead>
							    <tr class="info">
							      <th>S. No.</th>
							      <th>Name</th>
							      <th>Email</th>
							      <th>Gender</th>
							    </tr>
							  </thead>
							  <tbody>
							  <?php 
							  $select_users = "SELECT * FROM users";
							  $show_users = $conn->query($select_users);
							  while ($row = $show_query->fetch_assoc()){
							  $id = $row['id'];
							  $name = $row['name'];
							  $email = $row['email'];
							  $gender = $row['gender'];							  
							  ?>
							    <tr>
							      <td><?php echo $id ?></td>
							      <td><?php echo $name ?></td>
							      <td><?php echo $email ?></td>
							      <td><?php echo $gender ?></td>
							    </tr>
							  <?php } ?>  
							</tbody>
						</table> 				
					<?php 
					}else{
					?>
					<div class="jumbotron">
					  <p>No User Found</p>
					  
					</div>
					<?php } ?>	
			</div>
		</div>
	</div>

	<div class="container" style="margin-top:100px">
		<div class="row" style="overflow:hidden;">
			<div class="col-lg-12">
				<legend> &nbspUser's Contact Us Messages</legend>
					<?php  
						  $select_queries = "SELECT * FROM queries";
						  $show_query = $conn->query($select_queries);
						  
						  if ( $queries = $show_query->num_rows > 0 ){
					?>
						<table class="table table-striped table-hover ">
							  <thead>
							    <tr class="info">
							      <th>S. No.</th>
							      <th>Name</th>
							      <th>Email</th>
							      <th>Subject</th>
							      <th>Message</th>
							    </tr>
							  </thead>
							  <tbody>
							  <?php 
							  $select_queries = "SELECT * FROM queries";
							  $show_query = $conn->query($select_queries);
							  while ($row = $show_query->fetch_assoc()){
							  $id = $row['id'];
							  $name = $row['name'];
							  $email = $row['email'];
							  $subject = $row['subject'];
							  $message = $row['message'];
							  
							  ?>
							    <tr>
							      <td><?php echo $id ?></td>
							      <td><?php echo $name ?></td>
							      <td><?php echo $email ?></td>
							      <td><?php echo $subject ?></td>
							      <td><?php echo $message ?></td>
							    </tr>
							  <?php } ?>  
							</tbody>
						</table> 				
					<?php 
					}else{
					?>
					<div class="jumbotron">
					  <p>No Message By Users</p>
					  
					</div>
					<?php } ?>	
			</div>
		</div>
	</div>	

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>
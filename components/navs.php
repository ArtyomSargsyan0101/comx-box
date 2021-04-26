
<!DOCTYPE html>
<html>
<head>
	<title>PHP BLOG Appligation</title>
	<link rel="stylesheet" href="assest/js/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(https://wallpapercave.com/wp/wp3616694.jpg); -webkit-background-size: cover;
  background-size: cover;
  background-position: : center center;
  height: 100vh;
  font-family: poppins;
  font-weight: 600;
  font-size: 16px; ">
<nav class="navbar navbar-expand-lg  " style="background: #235CCC">
	<div class="col-lg-10">
		<a class="navbar-brand" style="color: white;" href="#">PHP BLOG APLICATION</a>
	</div>
	<div class="col-lg-2 " style="margin-top: 8px;">
		<div class="btn-group">
			<a href="#" style="color: white;" class="btn btn-default">Settings</a>
			<a href="#" style="color: white;" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-axpended="false">
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<?php if(isset($_SESSION['id'])): ?>
			<li><a href=login.php>Login</a></li>  
				   
				 <li><a href=register.php>Register</a></li>   
				    	
            
				<?php else: ?>   
				  <li><a href="logout.php">Logout</a></li>
				 
			<?php endif; ?>
			</ul>
		</div>
	</div>
  

</nav>

<!DOCTYPE html>
<html>
<head>
	<title>PHP comment BLOCK</title>
	
	<link rel="stylesheet" href="assest/js/bootstrap.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
</head>
<body>	

<nav class="navbar navbar-expand-lg navbar-dark" style="margin:0;padding:5px;background:#000;color:#fff;text-align:center;">
	<div class="col-lg-10">
		<a class="navbar-brand justify-content-center" style="color: white; margin: 0; padding: 5px; text-align: center; " href="admin.php">Comm Admin</a>
	</div>
	<div class="col-lg-2 " style="margin-top: 8px;">
		<div class="btn-group">
			<a href="#" class="btn btn-default text-white">Settings</a>
			<a href="#" class="btn btn-default dropdown-toggle text-white" data-toggle="dropdown" aria-axpended="false">
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
             <?php if(isset($_SESSION['id'])): ?>	
             <li><a  href=users.php>OLL USERS</a></li>    
    		 <li><a  href=admin.php>Admin</a></li>	    
			 <li><a  href=activated.php>Activated</a></li>
			 <li><a  href=deactivated.php>Deactivated</a></li>
			 <li><a  href=search.php>search oll users</a></li>
			 <li><a  href="logout.php">Logout</a></li>
			 
             <?php else: ?>   
             <li><a href=index.php>Register</a></li>	    
    		 <li><a href="login.php">Login</a></li>
    	     
			<?php endif; ?>
               

			
			</ul>
		</div>
	</div>
  

</nav>

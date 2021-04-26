<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	body{
		margin: 0px;
		background: #454545;
	}
	.navbar-inverse{
		background:#050a2e;
		padding: 8px;
		font-size: 17px;
	}
	.navbar-nav{
		padding: 0 0 0 20px;
	}
	.navbar-right{
		margin-right: 80px;
	}
	.form-control{
		width: 450px;
		padding: 0 0 0 20px;
		margin-left: 40px;
		margin-top: 8px; 
		text-align: center;
	}
</style>
<body>

<nav class="navbar navbar-inverse" style="background-color: #1c1e21;">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Web Master</a>
		</div>
		<ul class="nav navbar-nav">
			<li> <a href="#">Home</a></li>
			<li> <a href="#">News</a></li>
			<li> <a href="#">Sports</a></li>
			<li> <a href="#">Event</a></li>
			<li> <a href="#">contack</a></li>
		</ul>
		<div class="nav navbar-nav">
            <input class="form-control mr-sm-2"  type="text" placeholder="Search">
       </div>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-user"></span>  Sing Up</a> </li>
			<li><a href="#"><span class="glyphicon glyphicon-log-in"></span>SignIn</a> </li>
		</ul>
	</div>
</nav>
<div class="container-md">
<div class=" p-5">
	<div class="col-md-3  ">
		<div class="form-group" style="width: 100px;">
			<img style="border-radius: 100%; height: 60px; width: 60px;" src="image/bmw m8 comp.jpg"><h6>Artyom Sargsyan</h6>

			<h5 style="width: 140px; background-color: #00000; color: white; font-weight: 500; font-size: 18px;">Hopme And Grid</h5>
			<h5 style="width: 140px; background-color: #00000; color: white; font-weight: 500; font-size: 18px;">Hopme</h5>
			<h5 style="width: 140px; background-color: #00000; color: white; font-weight: 500; font-size: 18px;">Hopme</h5>
			<h5 style="width: 140px; background-color: #00000; color: white; font-weight: 500; font-size: 18px;">Hopme</h5>
			<h5 style="width: 140px; background-color: #00000; color: white; font-weight: 500; font-size: 18px;">Hopme</h5>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<img width="700px;" src="image/bmw m8.jpg">

		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group" style="color: white; text-align: center;">MI ZNAKOMI</div>
		<div class="form-group" style="text-align: center;">
			<input type="text"  >
		</div>
	</div>
</div>	
</div>

</body>


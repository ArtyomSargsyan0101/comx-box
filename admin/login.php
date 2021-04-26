<?php
session_start();
 include("config/db.php");
   if(isset($_POST['login'])){
   	$email = $_POST['email'];
   	$password = $_POST['password'];
   	if($email !="" && $password !=""){
       $password = sha1($password);
       $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
       $result = mysqli_query($conn , $sql) or die('error');
       if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
               $id = $row['id'];
               $email = $row['email'];
               $password = $row['password'];
               $email = $row['email'];
                
               $_SESSION['id'] = $id;
               $_SESSION['username'] = $username;
               $_SESSION['password'] = $password;
               $_SESSION['email'] = $email;
               header('location:admin.php');

            }
       }
       else{
            $error = "Username or Password is Incorrect";
       }
   	}
   	else{
         $error = "please fill all the default";
   	}
   }
 ?>

<?php if(isset($_SESSION['username'])): ?>
	<?php header('Location:admin.php'); ?>
<?php else: ?>

 <?php include ("headeradmin.php") ?>
<style>
    .error-noumb{
        color: red;
        float: left;
        display: none;
    }
    .float-right{
       float: right;
    }
</style>
<body style="background-image: url(https://www.push10.com/wp-content/uploads/geneva-gloval-website-hero-design.jpg); background-size: cover;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light mt-4 rounded">
                <h3 class="text-center p-2"><i  class="text-danger fas fa-user"></i></h3>
                <h4 class="text-center text-danger">Login</h4>
                <form action="login.php" method="post" class="p-3" id="reg-box">
                    <div class="form-group ">
                        <input type="email" value="" minlength="5" maxlength="30"  name="email" class="form-control form-control-lg rounded-0" placeholder="Enter your Email" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group ">
                        <input type="password" name="password" class="form-control form-control-lg rounded-0" placeholder="Password" required>
                        <span class="help-block"></span>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" name="login" value="login" class="btn btn-primary btn-block btn-lg rounded" placeholder="Enter password" required>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php  endif; ?>

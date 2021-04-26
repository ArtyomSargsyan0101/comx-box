<?php
include "inc.php";
if(isset($_SESSION['userId'])): 

  header("location: profile.php");
  
  endif;
$validation = new validation;
$queries    = new queries;
$sendEmail  = new sendEmail;

if(isset($_POST['register'])){

  $validation->validate('fullName', 'full name', 'required');
  $validation->validate('lastname', 'last name', 'requierd');
  $validation->validate('mobile', 'Mobile', 'required');
  $validation->validate('email', 'Email', 'uniqueEmail|users|required');
  $validation->validate('password', 'Password', 'required|min_len|6');

  if($validation->run()){

     $fullName = $validation->input('fullName');
     $lastname = $validation->input('lastname');
     $mobile   = $validation->input('mobile');
     $email    = $validation->input('email');
     $password = $validation->input('password');
     $password = password_hash($password, PASSWORD_DEFAULT);
     $code     = mt_rand();
     $code     = password_hash($code, PASSWORD_DEFAULT);
     $url      = "http://" . $_SERVER['SERVER_NAME'] . "/Youtube-Email-Verification-master/confirm.php?confirmation=" . $code;
     $status   = 0;
     if($queries->query("INSERT INTO users (fullName, lastname, mobile, email, password, code, status)  VALUES (?,?,?,?,?,?,?) ", [$fullName, $lastname, $mobile, $email, $password, $code, $status])){

      if($sendEmail->send($fullName, $email, $url)){
        
        $_SESSION['accountCreated'] = "Your account has been created successfully please verify your email";
        header("location: login.php");

      }

     }
    
     
  }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <?php include "components/styles.php"; ?>
</head>
<body>
  <?php include "components/nav.php"; ?> 
  <div class="container">
  <div class="row mt-5">
  <div class="col-md-5">
  <div class="card">
  <div class="card-body">
  <form action="" method="POST">
  <div class="form-group">
  <h3>Registration Form</h3>
  </div>
  <!-- Close form-group -->
  <div class="form-group">
  <input type="text" name="fullName" class="form-control" placeholder="Enter Full Name" value="<?php if($validation->input('fullName')): echo $validation->input('fullName'); endif; ?>">
  <div class="error">
    <?php if(!empty($validation->errors['fullName'])): echo $validation->errors['fullName']; endif; ?>
  </div>
  </div>


  <div class="form-group">
  <input type="text" name="lastname" class="form-control" placeholder="Enter Full Lastname" value="<?php if($validation->input('lastname')): echo $validation->input('lastname'); endif; ?>">
  <div class="error">
    <?php if(!empty($validation->errors['lastname'])): echo $validation->errors['lastname']; endif; ?>
  </div>
  </div>
  
  <div class="form-group">
  <input type="text" name="mobile" id="count" class="form-control" placeholder="Enter Full Mobile" value="<?php if($validation->input('mobile')):  endif; ?>">
  <div class="error">
    <?php if(!empty($validation->errors['mobile'])): echo $validation->errors['mobile']; endif; ?>
  </div>
  </div>

  <div class="form-group">
  <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php if($validation->input('email')): echo $validation->input('email'); endif; ?>" >
  <div class="error">
  <?php if(!empty($validation->errors['email'])): echo $validation->errors['email']; endif; ?>
  </div>
  </div>


  <div class="form-group">
  <input type="password" name="password" class="form-control" placeholder="Create new password" value="<?php if($validation->input('password')): echo $validation->input('password'); endif; ?>">
  <div class="error">
  <?php if(!empty($validation->errors['password'])): echo $validation->errors['password']; endif; ?>
  </div>
  </div>
  <!-- Close form-group -->

  <div class="form-group">
  <input type="submit" name="register" class="btn btn-info" value="Register &rarr;" style="background: #235CCC!important;">
  </div>
  <!-- Close form-group -->
  </form>
  <!-- Close form -->
  </div>
  <!-- Close card-body -->
  </div>
  <!-- Close card -->
  </div>
  <!-- Close col-md-5 -->
  <div class="col-md-5 text-white ml-auto">
   <h1>BMW US</h1><hr>
   <p>We've created a selection of useful how-to videos to help you get the most out of your BMW. From understanding how to start the engine to monitoring your tyre pressure, all of the key topics are covered here.</p>
  </div>
  <!-- Close col-md-5 -->
  </div>
  <!-- Close row -->
  </div>
   <!-- Close container -->
   <script type="text/javascript">
    $(function(){
        $("#count").keyup(function(event){
         $("#countno").text($(this).val().length);
         var x = $(this).val().length;
         if (x>9)
         {
            $(this).css("border","1px solid green");
            $(".error-noumb").show();
         }
         else{
            $(".error-noumb").hide();
            $(this).css("border",'');
         }
        });
    })
</script>
</body>
</html>



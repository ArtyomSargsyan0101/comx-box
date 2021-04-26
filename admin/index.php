<?php
  include("config/db.php");
  if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($username !='' && $email !='' && $password !=''){
      $pwd_hash = sha1($password);
      $sql = "INSERT INTO user (username, email, password) VALUES('$username', '$email', '$pwd_hash' )";
      $query = $conn->query($sql);
      if ($query) {
         header('location:login.php');
      }
      else{
        $error = 'Failed to user Register';
      }
    }
    else{
      $error = 'Please fill all the defaults';
    }
  }
  ?>

<?php include ("headeradmin.php")?>
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
<body style="background-image: url(https://wallpaperaccess.com/full/1218016.jpg); background-size: cover;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light mt-4 rounded">
                <h3 class="text-center p-2"><i  class="text-danger fas fa-user"></i></h3>
                <h4 class="text-center text-danger">REGIST With uS</h4>
                <form action="index.php" method="post" class="p-3" id="reg-box">
                    <div class="form-group ">
                        <input type="text" value="" minlength="5" maxlength="15"  name=" username" class="form-control form-control-lg rounded-0" placeholder="Enter your name" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" value="" class="form-control form-control-lg rounded-0" placeholder="Enter your E-maile" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password"  value="" class="form-control form-control-lg rounded-0" placeholder="Password" required>
                        <span class="help-block"></span>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" name="register" id="register" value="Submit" class="btn btn-primary btn-block btn-lg rounded" placeholder="Enter password" required>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script type="text/javascript">
    $(function(){
        $("#count").keyup(function(event){
         $("#countno").text($(this).val().length);
         var x = $(this).val().length;
         if (x>9)
         {
            $(this).css("border","1px solid red");
            $(".error-noumb").show();
         }
         else{
            $(".error-noumb").hide();
            $(this).css("border",'');
         }
        });
    })
</script>






 




 
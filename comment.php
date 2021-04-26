<?php session_start(); ?>
<?php if (!isset($_SESSION['userId'])): ?>
  <?php  header('Location:comment.php');?>
  <?php else: ?>
<?php include("classes/dbc.php") ?>
<?php include("count/countcomm.php") ?>

<?php

if(isset($_POST['postcomment'])) {
   $userid = $_SESSION['userId'];
   $userName = $_SESSION['userName'];
   $comname = $_POST['comname'];
   $status = $_POST['status'];
   $comment = $_POST['comment'];
   $cur_date = date("Y-m-d H:i:s");
   $image = $_FILES['image']['name'];
  $fileext = pathinfo($image,PATHINFO_EXTENSION);
  if(!($fileext=="jpg" || $fileext=="png" || $fileext=="jpeg")) {
    echo "Sorry File type not correct";
    
  } else {
   if($stmt = $conn->prepare("INSERT INTO comments SET user_id=?,cur_date = ?,userName= ?,comname= ?,comment = ?,image = ?,status = ?"))  
   {
     
  $stmt->bind_param('sssssss' ,$userid,$cur_date,$userName,$comname,$comment,$image,$status);
  $stmt->execute();  
     if($stmt->affected_rows==1) {
       move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$image);
        $_SESSION['commentCreated'] = "Your comment has been created successfully....";

     }

  }
  }
}


 ?>

 <?php endif; ?>

 
<?php include("components/navs.php") ?>
<div class="container">
  <div class="row justify-content-center mb-2">
    <div class="col-lg-5 bg-light rounded mt-2 ">
      <h4 class="text-center p-2">Write your comments <?php echo $_SESSION['userName']; ?></h4>
      <form action="comment.php" enctype="multipart/form-data"  method="post" class="p-2">
         
           <?php if(isset($_SESSION['commentCreated'])): ?>
          <div class="alert alert-success">
           <?php echo $_SESSION['commentCreated']; ?>
         </div>
         <?php endif; ?>
         <?php unset($_SESSION['commentCreated']); ?>
          
     <?php if(isset($_SESSION['commentnotVerified'])): ?>
      <div class="alert alert-danger">
        <?php echo $_SESSION['commentnotVerified']; ?>
      </div>
       <?php endif; ?>
      <?php unset($_SESSION['commentnotVerified']); ?>

       <?php if(isset($_SESSION['commentVerified'])): ?>
      <div class="alert alert-success">
        <?php echo $_SESSION['commentVerified']; ?>
      </div>
      <?php endif; ?>
      <?php unset($_SESSION['commentVerified']); ?>

          <div class="form-group">
              <input type="hidden" name="status" size="30" required placeholder="Enter Your status">
          </div> 
              <div class="form-group">
                <input  minlength="10" maxlength="30"  name="comname" class="form-control rounded-0" placeholder="Enter Your Commname" required value="">
              </div>
              <div class="form-group">
                <textarea name="comment" minlength="10" maxlength="300" class="form-control rounded-0" placeholder="Write your comment here" required value=""></textarea>
              </div>
               <div class="form-group">
              <input  type="file" name="image" class="btn btn-primary " value="">
               </div>
              <div class="form-group">
                <input type="submit" onclick="return confirm('Do you want to POST comment?')"  name="postcomment" class="btn btn-primary  rounded-0">
              </div>
           
       </form>
       <span style="color: blue;"><?php echo $num_rows;  ?> Comments </span> 
    </div>
  </div> 
     <div  class="row justify-content-center"  >
    
      <div class="col-lg-5 rounded bg-light p-3 pre-scrollable ">
           <?php
          if($stmt = $conn->query("SELECT * FROM comments where status='1' ORDER BY id  DESC" )) {
              $ctr = 0;
              while($r = $stmt->fetch_array(MYSQLI_ASSOC)) {  
               $ctr++;
               
              $status = "Active";
              if($r['status']==0) {
                  $status = "Deactive";
              }

               
          ?>
  
         <div class="card mb-2 border-secondary">

          <div class="card-header bg-secondary py-1 text-light">
            <span class="font-italic">User: <?php if(isset($r['username'])) { echo $r['username']; } ?></span>
            <span class="float-right font-italic"> <?php if(isset($r['cur_date'])) { echo $r['cur_date']; } ?> </span>
          </div>
          <div class="card-body py-2">
            <span>Comname</span>
              <p class="card-text"><?php if(isset($r['comname'])) { echo $r['comname']; } ?></p>

          </div>
         <hr>
         <div class="card-body py-2">
          <span >commnet</span>
             <span class="font-italic">User: <?php if(isset($r['comment'])) { echo $r['comment']; } ?></span>
             <hr>
             <div class="form-group m-4">
            <img class="popup"  src= upload/<?php if(isset($r['image'])) { echo $r['image']; } ?> Pic style="height: 100px; width: 110px;  margin-right: -18px; margin-top: -20px;" >
          </div>
          </div>
        </div>
          <?php }} ?>
      </div>
    </div>
  </div>
    </div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document"> 
      <img class="w-100" id="popup-img" src="" alt="" style="border-radius: 15px;">
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


<script type="text/javascript">
  $('.popup').click(function(){
    var src = $(this).attr('src');
    $('.modal').modal('show');
    $('#popup-img').attr('src', src);
  });
</script>
 

<?php include('classes/dbc.php') ?>
<?php include('components/navs.php') ?>


</style>
<h1 style="margin:0;padding:5px; text-align:center; color: white;" >
    To write a comment, please register...
 </h1>
    <div  class="container">     
      <div  class="row justify-content-center ">
      <div class="col-lg-5 rounded bg-light p-3 pre-scrollable">
           <?php
          if($stmt = $conn->query("SELECT * FROM comments where status='1'")) {
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
         <div class="card-body py-1">
          <span >commnet</span>
             <span class="font-italic">User: <?php if(isset($r['comment'])) { echo $r['comment']; } ?></span>
            <img  src= upload/<?php if(isset($r['image'])) { echo $r['image']; } ?> Pic style="height: 50px; width: 50px; margin-left: 50px; " >
          </div>
          <div class="card-footer py-2">
          </div>
        </div>
          <?php }} ?>
      </div>
    </div>
  </div>
  
 

          
          


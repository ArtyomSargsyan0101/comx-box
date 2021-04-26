<?php session_start(); ?>
<?php if(!isset($_SESSION['id'])): 

header("location: login.php");

endif; ?>
<?php include('config/db.php');?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<style>
  label{
	  display:inline-block;
	  width:150px;
	   }
           
           

</style>
<script type="text/javascript">
    function del() {
        var ans  = confirm("Are you sure?");
        if(ans==true) {
            return true;
        } else {
            return false;
        }
        return false;
    }
   
</script>
</head>
<?php include("headeradmin.php") ?>
<body style="margin:0;background:#0000;color:#000">
  <div>
<center>
     <h3>Display All Record</h3>
   

        <p>
        

       </p>
                
         <p>
         <form method="post">
         
         <table width="1000px;" border="2">
          <tr>
              <td>ID</td>
             <td>Username</td>
             <td>Comname</td>
             <td>comments</td>
             <td>imgName</td>
             <td>On : date</td>
             <td>Action</td>
         </tr>
          
          
            
          <?php
          if($stmt = $conn->query("SELECT * FROM comments where status='0'")) {
              $ctr = 0;
              while($r = $stmt->fetch_array(MYSQLI_ASSOC)) {  
               $ctr++;
            $_SESSION['commentnotVerified'] = "Your comment deactivated Sorry...";
              $status = "Active";
              if($r['status']==0) {
                  $status = "Deactive";
              }
               
          ?>
         <tr>
             <td><?php echo $ctr; ?></td>
             <td><?php if(isset($r['username'])) { echo $r['username']; } ?></td>
             <td><?php if(isset($r['comname'])) { echo trim(substr($r['comname'],0,100)); } ?></td>
             <td><?php if(isset($r['comment'])) { echo $r['comment']; } ?></td>
             <td><?php if(isset($r['image'])) { echo $r['image']; } ?></td>
             <td><?php if(isset($r['cur_date'])) { echo $r['cur_date']; } ?></td>
          
             <td>
                 <a href="delete.php?id=<?php echo $r['id']; ?>" onclick="return del();">Delete</a>
                 <a href="edit.php?id=<?php echo $r['id']; ?>" onclick="return fileshow()">Edit</a>
          </tr>
 
          <?php }} ?>
          <tr>
             
          <input type="checkbox" id="selecctall"/>
          <input type="submit" name="submit" value="Delete">
          
          </tr>
         </table>
             </form>
         
         
         </p>
        
      
  
  </center>
 </div>
    <script>
$(document).ready(function() {
    $('#selecctall').click(function(event) {  
        if(this.checked) { 
            $('.p').each(function() {
                this.checked = true;            
            });
        }else{
            $('.p').each(function() { 
                this.checked = false;                       
            });        
        }
    });
       
});
    </script>

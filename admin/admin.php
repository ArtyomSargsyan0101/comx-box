<?php session_start(); ?>

<?php include('config/db.php');?>

<?php 
if(isset($_POST['submit'])) {
    foreach($_POST['ch_box'] as $i) {
        if($stmt = $conn->query("DELETE FROM comments WHERE id='".$i."'")){
          header("location:admin.php");
          
        }
    }
}
?>




<?php include("headeradmin.php") ?>


<style>
  label{
	  display:inline-block;
	  width:150px;
	  opacity:0.5;
	   }
     table{
      width: 92%;
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

  <div>
<center>
  <h1> Hello  <?php echo $_SESSION['username']; ?></h1>
   
         <form action="admin.php" method="post">
         
         <table border="2">
          <tr>
             <td>ID</td>
             <td>Username</td>
             <td>Comname</td>
             <td>Comment</td>
             <td>imgName</td>
             <td>On : date</td>
             <td>Action</td>
             
          </tr>
          
          
            
          <?php
          if($stmt = $conn->query("SELECT * FROM comments  ORDER BY id DESC")) {
              $ctr = 0;
              while($r = $stmt->fetch_array(MYSQLI_ASSOC)) {  
               $ctr++;
             
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
                 <a href="deletecom.php?id=<?php echo $r['id']; ?>" onclick="return del();">Delete</a>
                 <a href="edit.php?id=<?php echo $r['id']; ?>" onclick="return fileshow()">Edit</a>
                 
                 <a href="statuss.php?id=<?php echo $r['id']; ?>&status=<?php echo $r['status']; ?>" ><?php echo $status; ?></a>
            
              <input type="checkbox" class="p" name="ch_box[]" value="<?php echo $r['id']; ?>" />
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

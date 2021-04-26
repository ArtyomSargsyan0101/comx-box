<?php session_start(); ?>
<?php if(!isset($_SESSION['id'])): 

header("location: login.php");

endif; ?>
<?php include ("../count/countuser.php") ?>
<?php

$conn = new mysqli('localhost','root','','userConfirmation');  
if($conn->connect_errno){                         
  echo 'Conection Error';
}

?>

<?php include("headeradmin.php") ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<style>
  label{
	  display:inline-block;
	  width:150px;
	   }
           
           

</style>
</head>


  <div>
<center>
     <h3>OLL OSERS <?php echo $num_rows; ?> </h3>
         <form method="post">
         
         <table width="1000px;" border="2">
          <tr>
            <td style="color: #CF1E0D;">ID</td>
             <td style="color: #CF1E0D;">username</td>
             <td style="color: #CF1E0D;">email</td>
             <td style="color: #CF1E0D;">lastname</td>
             <td style="color: #CF1E0D;">mobile</td>
             <td style="color: #CF1E0D;">Action</td>
          </tr>
            
          <?php
          if($stmt = $conn->query("SELECT * FROM users  ORDER BY id DESC")) {
              $ctr = 0;
                
              while($r = $stmt->fetch_array(MYSQLI_ASSOC)) {  
             $ctr++;                    
          ?>
         <tr>
             <td><?php echo $ctr; ?></td>
             <td><?php if(isset($r['fullName'])) {echo $r['fullName']; } ?></td>
             <td><?php if(isset($r['email'])) { echo $r['email']; } ?></td>
             <td><?php if(isset($r['lastname'])) {echo $r['lastname']; } ?></td>
             <td><?php if(isset($r['mobile'])) {echo $r['mobile']; } ?></td>
             <td>
                 <a href="delete.php?id=<?php echo $r['id']; ?>">Delete</a>
               
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

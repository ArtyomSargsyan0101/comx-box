<?php include('config/db.php');?>
<?php 
if(isset($_POST['submit2'])) {
  
 $comname = $_POST['comname'];
	 $comment = $_POST['comment'];
          
  $id = $_POST['id'];
   if($stmt = $conn->prepare("UPDATE comments SET comname=?,comment = ?,image=? WHERE id='".$id."'"))  
   {
	   
	$stmt->bind_param('sss' ,$comname,$comment,$image); 
	$stmt->execute();  
	   header('location:admin.php');
	
  }

}


?>

<style>
  label{
	  display:inline-block;
	  width:150px;
	   }
           
           

</style>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body style="margin:0; text-align: center;">
<h1 style="margin:0;padding:5px;background:#333;color:#fff" >
    Edit Comments.
 </h1>
  <div>
<center>
      
       <form  method="post" name="form2" enctype="multipart/form-data">
       <?php
       $id = $_GET['id'];
       if($stmt = $conn->query("SELECT * FROM comments WHERE id='".$id."'"))
       {
           $r = $stmt->fetch_array(MYSQLI_ASSOC);
         
       ?>
       <p>
         <label for="name">Page comname:</label>
         <input type="text" name="comname" size="30" required value="<?php  echo $r['comname']?>">

       </p>
     
         <label for="comment">commment:</label>
         <textarea name="comment" cols="40" rows="8"><?php  echo $r['comment']?></textarea>
         <input type="hidden" name="id" value="<?php  echo $r['id']?>">
         
   
       <?php } ?>

         <p>
            <input type="submit" name="submit2" value="submit" >
         </p>
          
      </form>
  </center>
  </div>


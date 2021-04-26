<?php session_start(); ?>
<?php if(!isset($_SESSION['id'])): 

header("location: login.php");

endif; ?>
<?php
$conn = new mysqli('localhost','root' ,  '','userConfirmation');  
if($conn->connect_errno){                         
  echo 'Conection Error';

}

?>


<style>
  label{
    display:inline-block;
    width:150px;
     }
           
           

</style>
</head>
<body>
<?php include("headeradmin.php"); ?>
  <div>
<center>
     <h3>search oll users</h3>
         <form method="post">
             <input type='text' value="" name="txtsearch" id="txtsearch" />
             <input type="submit"  name="submit1" value="submit"/>
             <table border="1">
          <tr>
             <td>id</td>
             <td>Name</td>
             <td>Lastname</td>
             <td>email</td>
             <td>mobile</td>
             <td>action</td>
          </tr>
          <?php
          if(isset($_POST['submit1'])){
              $srch = $_POST['txtsearch'];
              
          
          if($stmt = $conn->query("SELECT * FROM users where  fullname LIKE '%$srch%'")) {
              $ctr = 0;
              while($r = $stmt->fetch_array(MYSQLI_ASSOC)) {  
               $ctr++;
          ?>
         <tr>
             <td><?php echo $ctr; ?></td>
             <td><?php if(isset($r['fullName'])) { echo $r['fullName']; } ?></td>
             <td><?php if(isset($r['lastname'])) { echo $r['lastname']; } ?></td>
             <td><?php if(isset($r['email'])) { echo $r['email']; } ?></td>
             <td><?php if(isset($r['mobile'])) { echo $r['mobile']; } ?></td>
             <td>
                 <a href="delete.php?id=<?php echo $r['id']; ?>">Delete</a>
             </td>
          </tr>
          <?php }}} ?>
         </table>
             </form>
         </p>
        
      
  
  </center>
  </div>


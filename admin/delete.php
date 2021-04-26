
<?php include('config/db.php');?>
<?php 

if(isset($_GET['id'])) {
    if($stmt = $conn->query("DELETE FROM user WHERE id='".$_GET['id']."'")){
        header("location:users.php");
    }
}


?>
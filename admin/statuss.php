<?php include('config/db.php');?>

<?php 
$id = $_GET['id'];
$status = $_GET['status'];
$value = 0;
if($status==0) {
    $value = 1;
}
$query = "UPDATE comments SET status='".$value."' WHERE id='".$id."'";
if($stmt = $conn->query($query)) {
    header("location:admin.php");
}
?>
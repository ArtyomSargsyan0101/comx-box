
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="userConfirmation";
$con=mysqli_connect($servername,$username,$password,$dbname);
$sql="SELECT count(id) AS comm FROM comments where status='1'";
$result=mysqli_query($con,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['comm'];
?>
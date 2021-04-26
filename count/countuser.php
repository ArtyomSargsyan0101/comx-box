
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="userConfirmation";
$con=mysqli_connect($servername,$username,$password,$dbname);
$sql="SELECT count(id) AS us FROM users ";
$result=mysqli_query($con,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['us'];

?>
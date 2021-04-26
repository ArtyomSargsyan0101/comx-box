<?php 

$conn = new mysqli('localhost','root','','userConfirmation');  
if($conn->connect_errno){                         
	echo 'Conection Error';
}
 ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userConfirmation";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE comments (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
comname VARCHAR(100) NOT NULL,
comment VARCHAR(100) not null,
user_id int(100) not null,
cur_date timestamp ,
image varchar(200) not null,
status int(10) not null
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
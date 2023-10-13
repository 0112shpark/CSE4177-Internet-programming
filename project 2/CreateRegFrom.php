<?php
$servername = "localhost";
$username = "cse20181632";
$password = "11tjdgus";
$dbname = "db_cs20181632";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE RegForm (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
FullName VARCHAR(30) NOT NULL,
Gender VARCHAR(10) NOT NULL,
email VARCHAR(50),
BirthDay DATE NOT NULL,
StudentID INT(8) UNSIGNED NOT NULL,
Grade VARCHAR(10) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>


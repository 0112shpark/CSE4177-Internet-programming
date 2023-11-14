<?php
$servername = "localhost";
$username = "cse20181632";
$password = "11tjdgus";
$dbname = "db_cs20181632";
$fullname= $_POST["Name"];
$gender = $_POST["Gender"];
$mail = $_POST["E-mail"];
$birth = $_POST["Birthday"];
$stuid = $_POST["Student-ID"];
$grade = $_POST["Grade"];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$birthDate = date("Y-m-d", strtotime($birth));

$sql = "INSERT INTO RegForm (FullName ,Gender ,email ,BirthDay ,StudentID ,Grade )
VALUES ('$fullname', '$gender', '$mail', '$birthDate', '$stuid', '$grade')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>

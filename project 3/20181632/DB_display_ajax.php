<?php
$servername = "localhost";
$username = "cse20181632";
$password = "11tjdgus";
$dbname = "db_cs20181632";
$search = $_REQUEST['q'];


$searchData = json_decode($search, true);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$resultData = array();
$inputType = $searchData['type'];
$inputValue = $searchData['value'];

if ($inputType === 'all') {
  $sql = "SELECT * FROM RegForm";
} else if ($inputType === 'name') {
  $sql = "SELECT * FROM RegForm WHERE FullName = '$inputValue'";
} else if ($inputType === 'mail') {
  $sql = "SELECT * FROM RegForm WHERE email = '$inputValue'";
} else if ($inputType === 'ID') {
  $sql = "SELECT * FROM RegForm WHERE StudentID = '$inputValue'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $resultData[] = array(
      "id" => $row["id"],
      "FullName" => $row["FullName"],
      "Gender" => $row["Gender"],
      "email" => $row["email"],
      "BirthDay" => $row["BirthDay"],
      "StudentID" => $row["StudentID"],
      "Grade" => $row["Grade"]
    );
  }
} else {
  $resultData = array("message" => "0 results");
}

$conn->close(); 

echo json_encode($resultData);
?>

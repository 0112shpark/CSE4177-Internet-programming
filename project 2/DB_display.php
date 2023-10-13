<?php
$servername = "localhost";
$username = "cse20181632";
$password = "11tjdgus";
$dbname = "db_cs20181632";
$search = $_POST["search"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if($search === 'all'){
  echo "전체 검색결과";
  echo"<br>";
  $sql = "SELECT * FROM RegForm";
}
else if($search === 'name'){
 
  $fullname = $_POST["fullname"];
  echo "'$fullname' 이름 검색결과 ";
  echo "<br>";
  $sql =  "SELECT * FROM RegForm WHERE FullName = '$fullname'";
}
else if($search === 'gender'){
 
  $gender = $_POST["Gender"];
  echo "'$gender' 성별검색결과 ";
  echo "<br>";
  $sql =  "SELECT * FROM RegForm WHERE Gender = '$gender'";
}
else if($search === 'mail'){
 
  $mail = $_POST["e-mail"];
  echo "'$mail' 이메일 검색결과 ";
  echo "<br>";
  $sql =  "SELECT * FROM RegForm WHERE email = '$mail'";
}
else if($search === 'ID'){
 
  $ID = $_POST["stid"];
  echo "'$ID'학번 검색결과 ";
  echo "<br>";
  $sql =  "SELECT * FROM RegForm WHERE StudentID = '$ID'";
}
else if($search === 'grade'){
 
  $grade = $_POST["Grad"];
  echo "'$grade' 학년 검색결과 ";
  echo "<br>";
  $sql =  "SELECT * FROM RegForm WHERE Grade = '$grade'";
}
else if($search === 'date'){
 
  $date = $_POST["searchDate"];
  echo "'$date' 이후 생일자 검색결과 ";
  echo "<br>";
  $sql =  "SELECT * FROM RegForm WHERE BirthDay >= '$date'";
}
// $sql = "SELECT id, FullName, Gender, email, BirthDay, StudentID, Grade FROM RegForm WHERE lastname='Doe'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"] . "<br>";
    echo "Name: " . $row["FullName"] . "<br>";
    echo "Gender: " . $row["Gender"] . "<br>";
    echo "E-mail: " . $row["email"] . "<br>";
    echo "BirthDay: " . $row["BirthDay"] . "<br>";
    echo "StudentID: " . $row["StudentID"] . "<br>";
    echo "Grade: " . $row["Grade"] . "<br>";
    echo "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

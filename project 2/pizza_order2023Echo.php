<html>
<body>

<?php
echo "<h2> ( YOUR_ID_HERE  Pizza)   Your Input:</h2>";
echo "Name : "  ;
echo $_POST["name"];
echo "<br>";
echo "Address : "  ;
echo $_POST["address"] ;
echo "<br>";
echo "Phone Number : "  ;
echo $_POST["phone"];
echo "<br>";
echo "Topping : " ;
echo $_POST["topping"] ;
echo "<br>";
echo "Pay Method : "  ;
echo $_POST["paymethod"];
echo "<br>";
echo "Call before leaving ? "  ;
echo $_POST["callfirst"];
?>

</body>
</html>

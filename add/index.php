<?php 
$conn = new mysqli('remotemysql.com', 'WK1eggxcgK', 'z9HcRqhc5i', 'WK1eggxcgK');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$url=trim($_POST['long_url']);
$sql="INSERT INTO urls(longurl) values('$url')";
$conn->query($sql) or die($conn->error);
header("Location: ../index.php");
exit;
?>

<?php 
$conn = new mysqli('localhost', 'root', '', 'urlshortner');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$c=$_GET['c'];
$sql="select * from urls where c='".$c."'";
$result=$conn->query($sql) or die($conn->error);
while($row=$result->fetch_assoc()){

    header("Location://".$row['longurl']);
    exit;
}
?>
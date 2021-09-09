<?php 
$conn = new mysqli("localhost","database_username","database_password","database_name");

$sql = "SELECT * from userinfo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 $data = array();
  while($row = $result->fetch_assoc()) {
	  $data[] = $row;
	   }
}

echo json_encode($data)
?>

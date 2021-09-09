<?php 

$conn = new mysqli("localhost","needyamin","Yamin143","jQdata");

// Check Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";


$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);

$name = $mydata['myname'];
$email = $mydata['myemail'];
$mobile = $mydata['myphone'];

if($name == '' or $email == '' or $mobile == '') {
echo"Please fill up all fields";
}

else{
	
$sql = "INSERT INTO `userinfo` (`id`, `name`, `email`, `mobile`) VALUES (NULL, '$name', '$email', '$mobile')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "
" . $conn->error;
}

$conn->close(); 
}

;?>

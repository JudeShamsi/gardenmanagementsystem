<?php

include 'connecthg.php';
$conn = OpenCon();

$wid = $_POST['wid'];
$temp = $_POST['temp'];
$ph = $_POST['ph'];

$sqll = 
"INSERT INTO Water (NW_ID, Temperature,pH)
VALUES ('$wid','$temp','$ph')";
if ($conn->query($sqll) === TRUE) { echo $success ="Record for water was inserted successfully";
} else {
echo $success = "Please try again. Error inserting water record: " . $conn->error;
}

?>

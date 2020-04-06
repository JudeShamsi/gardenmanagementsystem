<?php
include 'connecthg.php';

$id = $_POST['id'];
$temp = $_POST['temp'];
$conn = OpenCon();
$sql = "update Water set Temperature = '$temp' where NW_ID = '$id'";
if ($conn->query($sql) === TRUE) { echo "Record updated successfully";
} else {
echo "Error updating record: " . $conn->error;
}
?>
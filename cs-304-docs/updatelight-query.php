<?php
include 'connecthg.php';

$id = $_POST['id'];
$bulb = $_POST['bulb'];
$conn = OpenCon();
$sql = "update Lighting set Bulb_TYPE = '$bulb' where Light_SerialNo = '$id'";
if ($conn->query($sql) === TRUE) { echo "Record updated successfully";
} else {
echo "Error updating record: " . $conn->error;
}
?>
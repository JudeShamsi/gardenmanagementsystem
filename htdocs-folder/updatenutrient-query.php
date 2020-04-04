<?php
include 'connecthg.php';

$id = $_POST['id'];
$descrp = $_POST['descrp'];
$conn = OpenCon();
$sql = "update Nutrients set N_hazards   = '$descrp' where N_ID = '$id'";
if ($conn->query($sql) === TRUE) { echo "Record updated successfully";
} else {
echo "Error updating record: " . $conn->error;
}
?>
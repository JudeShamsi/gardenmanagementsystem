<?php
include 'connecthg.php';

$id = $_POST['id'];
$concen = $_POST['concen'];
$conn = OpenCon();
$sql = "update EssentialMinerals set EM_Concentration = '$concen' where NM_ID = '$id'";
if ($conn->query($sql) === TRUE) { echo "Record updated successfully";
} else {
echo "Error updating record: " . $conn->error;
}
?>
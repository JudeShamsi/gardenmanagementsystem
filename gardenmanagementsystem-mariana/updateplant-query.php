<?php
include 'connecthg.php';

$id = $_POST['id'];
$descrp = $_POST['descrp'];
$conn = OpenCon();
$sql = "update PlantHas set P_Description = '$descrp' where P_ID = '$id'";
if ($conn->query($sql) === TRUE) { echo "Record updated successfully";
} else {
echo "Error updating record: " . $conn->error;
}
?>
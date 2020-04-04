<?php
include 'connecthg.php';

$id = $_POST['id'];
$conn = OpenCon();
$sql = "delete from PlantHas where P_ID = '$id'";
if ($conn->query($sql) === TRUE) { echo "Record deleted successfully";
} else {
echo "Error updating record: " . $conn->error;
}
?>
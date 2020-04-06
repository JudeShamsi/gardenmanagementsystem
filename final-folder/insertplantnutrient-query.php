<?php
include 'connecthg.php';
$nid = $_POST['nid'];
$pid = $_POST['pid'];

$conn = OpenCon();
$sql = "INSERT INTO Requires(NR_ID, PR_ID) VALUES('$nid','$pid')";
if ($conn->query($sql) === TRUE) { echo "Record inserted successfully";
} else {
echo "Error inserting record: " . $conn->error;
}
?>
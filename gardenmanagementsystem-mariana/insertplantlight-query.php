<?php

include 'connecthg.php';

$pid = $_POST['pid'];
$lid = $_POST['lid'];

$conn = OpenCon();
$sql = "INSERT INTO Need(PN_ID, LN_SerialNo ) VALUES('$pid','$lid')";
if ($conn->query($sql) === TRUE) { echo "Record inserted successfully";
} else {
echo "Error inserting record: " . $conn->error;
}
?>

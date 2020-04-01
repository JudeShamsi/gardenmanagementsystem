<?php
include 'connecthg.php';
$id = $_POST['id'];
$growthrate = $_POST['growthrate'];
$start = $_POST['start'];
$end = $_POST['end'];
$conn = OpenCon();
$sql = "INSERT INTO GrowthRate(PG_ID, StartDate,EndDate, LengthGrowth)
VALUES ('$id', '$start','$end','$growthrate')";
if ($conn->query($sql) === TRUE) { echo "Record inserted successfully";
} else {
echo "Error inserting record: " . $conn->error;
}
?>
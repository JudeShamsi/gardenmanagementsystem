<?php

include 'connecthg.php';

$plant_id = $_POST['plant_id'];
$plant_sname = $_POST['plant_sname'];
$plant_descrip = $_POST['plant_descrip'];
$plant_cname = $_POST['plant_cname'];
$plant_amt = $_POST['plant_amt'];
$conn = OpenCon();
$sql = 
"INSERT INTO PlantHas (P_ID, P_ScientificName, P_Description, P_CommonName,Amount )
VALUES ('$plant_id','$plant_sname','$plant_descrip','$plant_cname','$plant_amt')";
if ($conn->query($sql) === TRUE) { echo $success ="Record for plant was inserted successfully";
} else {
echo $success = "Please try again. Error inserting plant record: " . $conn->error;
}

?>

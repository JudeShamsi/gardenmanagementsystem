<?php

include 'connecthg.php';

$ligth = $_POST['ligth'];
$wave = $_POST['wave'];
$bulb = $_POST['bulb'];

$conn = OpenCon();
$sql = 
"INSERT INTO Lighting (Light_SerialNo, Wavelength,Bulb_TYPE )
VALUES ('$ligth','$wave','$bulb')";
if ($conn->query($sql) === TRUE) { echo $success ="Record for light was inserted successfully";
} else {
echo $success = "Please try again. Error inserting light record: " . $conn->error;
}

?>

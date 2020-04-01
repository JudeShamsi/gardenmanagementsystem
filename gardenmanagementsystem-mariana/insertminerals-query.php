<?php

include 'connecthg.php';
$conn = OpenCon();

$nid = $_POST['nid'];
$em_type = $_POST['em_type'];
$em_con = $_POST['em_con'];

$sqll = 
"INSERT INTO EssentialMinerals (NM_ID, EM_Type,EM_Concentration)
VALUES ('$nid','$em_type','$em_con')";
if ($conn->query($sqll) === TRUE) { echo $success ="Record for mineral was inserted successfully";
} else {
echo $success = "Please try again. Error inserting mineral record: " . $conn->error;
}

?>

<?php

include 'connecthg.php';

$nutrient_id = $_POST['nutrient_id'];
$id = $_POST['id'];
$nutrient_cname = $_POST['nutrient_cname'];
$nutrient_hazar = $_POST['nutrient_hazar'];
$nutrient_descrip = $_POST['nutrient_descrip'];

$conn = OpenCon();
$sql = 
"INSERT INTO Nutrients (N_ID, IN_ID, N_Name,N_hazards,N_Description )
VALUES ('$nutrient_id','$id','$nutrient_cname','$nutrient_hazar','$nutrient_descrip')";
if ($conn->query($sql) === TRUE) { echo $success ="Record for nutrient was inserted successfully";
} else {
echo $success = "Please try again. Error inserting nutrient record: " . $conn->error;
}

?>

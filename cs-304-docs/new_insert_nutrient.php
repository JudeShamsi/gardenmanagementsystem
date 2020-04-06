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

$nutrient_id = $_POST['nutrient_id'];
$id = $_POST['id'];
$nutrient_cname = $_POST['nutrient_cname'];
$nutrient_hazar = $_POST['nutrient_hazar'];
$nutrient_descrip = $_POST['nutrient_descrip'];


$sql = 
"INSERT INTO Nutrients (N_ID, IN_ID, N_Name,N_hazards,N_Description )
VALUES ('$nutrient_id','$id','$nutrient_cname','$nutrient_hazar','$nutrient_descrip')";
if ($conn->query($sql) === TRUE) { echo $success ="Record for nutrient was inserted successfully";
} else {
echo $success = "Please try again. Error inserting nutrient record: " . $conn->error;
}



$wid = $_POST['wid'];
$temp = $_POST['temp'];
$ph = $_POST['ph'];

$sqll = 
"INSERT INTO Water (NW_ID, Temperature,pH)
VALUES ('$wid','$temp','$ph')";
if ($conn->query($sqll) === TRUE) { echo $success ="Record for water was inserted successfully";
} else {
echo $success = "Please try again. Error inserting water record: " . $conn->error;
}

?>







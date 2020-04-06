<?php

include 'connecthg.php';

$inventory_id = $_POST['inventory_id'];
$inventory_name = $_POST['inventory_name'];
$s_date = $_POST['s_date'];
$e_date = $_POST['e_date'];


$conn = OpenCon();
$sql = 
"INSERT INTO Inventory (Inventory_ID, InventoryName,Stock_Date, ExpirationDate)
VALUES ('$inventory_id','$inventory_name','$s_date','$e_date')";
if ($conn->query($sql) === TRUE) { echo $success ="Record for inventory item was inserted successfully";
} else {
echo $success = "Please try again. Error inserting inventory item record: " . $conn->error;
}

?>

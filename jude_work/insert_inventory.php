<?php

include 'connect.php';
$conn = OpenCon();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Inventory_Category = $_POST['i-category'];
$InventoryName = $_POST['i-name'];
$suppliers = $_POST['suppliers'];
$employee_name = $_POST['employee_name'];
$Stock_Date = date("Y-m-d", strtotime($_POST['s-date']));
$ExpirationDate = date("Y-m-d", strtotime($_POST['e-date']));


$sql_insert_inventory =  "INSERT INTO Inventory(Inventory_Category, InventoryName, `Stock_Date`, `ExpirationDate`, `E_SIN`) 
VALUES('$Inventory_Category', '$InventoryName', '$Stock_Date', '$ExpirationDate', '$employee_name')";



if ($conn->query($sql_insert_inventory) === TRUE) {
    $id = $conn->insert_id;
    $sql_insert_provides = "INSERT INTO Provides(Inventory_ID, Supplier_ID) VALUES('$id', '$suppliers')";
    if($conn->query($sql_insert_provides) === TRUE){
        echo "New record created successfully";
    } else {
        echo "error with provides";
    }
   
} else {
    echo "Error: " . $sql_insert_inventory. "<br>" . $conn->error;
    echo "Error: " . $sql_insert_provides. "<br>" . $conn->error;
}

$conn->close();
?>

<?php
include 'connect.php';
$conn = OpenCon();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$E_fname = $_POST['e-fname'];
$E_lname = $_POST['e-lname'];
$E_address = $_POST['e-address'];
$E_phone = $_POST['e-phone'];
$E_SIN= $_POST['e-sin'];
$E_Type= $_POST['employee-type'];

$sql_insert_employee = "INSERT INTO Employee (E_SIN,E_fname, E_lname, E_phone, E_address, E_Type)
VALUES ($E_SIN, '$E_fname', '$E_lname', '$E_phone', '$E_address', '$E_Type')";

if ($conn->query($sql_insert_employee) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql_insert_employee. "<br>" . $conn->error;
}

$conn->close();
?>

<?php
include 'connect.php';
$conn = OpenCon();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$s_fname = $_POST['sup-fname'];
$s_lname = $_POST['sup-lname'];
$s_email = $_POST['sup-email'];
$s_phone = $_POST['sup-phone'];
$sql_insert_supplier = "INSERT INTO Supplier(s_email, s_fname, s_lname, s_phone) VALUES('$s_email', '$s_fname','$s_lname', '$s_phone')";

if ($conn->query($sql_insert_supplier) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql_insert_supplier. "<br>" . $conn->error;
}

$conn->close();
?>


<?php
$id = $_GET['id'];
include 'connect.php';
$conn = OpenCon();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM Supplier WHERE s_fname = $id"; 
if ($conn->query($sql) === TRUE) {
    mysqli_close($conn);
    header('Location: search_supplier.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}

?>
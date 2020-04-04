<?php
$id = $_GET['id'];

$dbname = "cs304";
$conn = mysqli_connect("localhost", "root", "root", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM Supplier WHERE Supplier_ID = $id"; 
if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: add_supplier.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}

?>



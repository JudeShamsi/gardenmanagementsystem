<?php
include 'connect.php';
$conn = OpenCon();
$sql = "SELECT Inventory_Id, InventoryName
FROM Inventory";
$result = $conn->query($sql);
if (!empty($result) && $result->num_rows > 0) {
echo "<table><tr><th class='borderclass'>Inventory_Id</th><th class='borderclass'>InventoryName</th>";
// output data of each row
while($row = $result->fetch_assoc()){ 
echo"<tr><td class='borderclass'>".$row["Inventory_Id"]."</td><tdclass='borderclass'>".$row["InventoryName"]."</td></tr>";
}
echo "</table>";
} else {
echo "0 results";
}
CloseCon($conn);
?>
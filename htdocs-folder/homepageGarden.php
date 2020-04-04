<?php
include 'connecthg.php';
$conn = OpenCon();
$sql = "SELECT customerid, customername, customerzip FROM customer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<table><tr><th class='border-class'>customerid</th><th class='border-class'>customer name</th><th class='border- class'>customer zip</th></tr>";
// output data of each row
while($row = $result->fetch_assoc()) { echo "<tr><td class='border-
class'>".$row["customerid"]."</td><td class='border- class'>".$row["customername"]."</td><td class='border- class'>".$row["customerzip"]."</td></tr>";
}
echo "</table>";
} else {
echo "0 results";
}
CloseCon($conn);
?>
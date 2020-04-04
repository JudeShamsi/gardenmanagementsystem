// search


<?php

include 'connect.php';
$conn = OpenCon();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<h2>find Employee Schedule from Employee id</h2>
<form action="welcome_get.php" method="get">
Sin: <input type="text" name="E_SIN"><br>
<input type="submit">
</form>

<?php
$sql = "SELECT Year,Month,Day,Start_Time,End_Time FROM Schedule WHERE E_SIN=$E_SIN";
$result = $conn->query($sql);
?>

<h2>find when a certain task happens</h2>
<form action="welcome_get.php" method="get">
TaskNum: <input type="text" name="TaskNum"><br>
<input type="submit">
</form>

<?php
$sql = "SELECT Year,Month,Day FROM Has WHERE TaskNum=$TaskNum";
$result = $conn->query($sql);
?>


<h2>nested aggregation</h2>
<h2>get the number of tasks an empolyee has</h2>
<form action="welcome_get.php" method="get">
Sin: <input type="text" name="E_SIN"><br>
<input type="submit">
</form>

<?php
$sql = "SELECT Day FROM Schedule WHERE E_SIN=$E_SIN";
$result = $conn->query($sql);
$result.count();
?>

<h2>display employee shcudule/h2>
<form action="welcome_get.php" method="get">
Sin: <input type="text" name="E_SIN"><br>
<input type="submit">
</form>

<?php
$sql = "SELECT Year, Month, Day, Start_Time,End_Time FROM Schedule WHERE E_SIN=$E_SIN";
$result = $conn->query($sql);

 
  if ($result->num_rows > 0) {
    echo "<table><tr><th>Date</th><th>Start Time</th><th>End Time</th> </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $sql = SELECT Task_Type FROM Has WHERE Year = $row["Year"] AND Month = $row["Month"] AND Day = $row["Day"];
      $taskR = $conn->query($sql);
      $rowR = $taskR->fetch_assoc();
        echo "<tr><td>".$row["Year"].$row["Month"].$row["Day"]."</td><td>".$row["Start_Time"]."</td><td> ".$row["End_Time"]."</td><td> ".$taskR["Task_Type"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
 


?>


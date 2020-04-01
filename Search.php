// search

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


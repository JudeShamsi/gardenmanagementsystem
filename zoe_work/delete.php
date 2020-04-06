// Deleting - for all tables

<h2>delete Employee</h2>
<form action="welcome_get.php" method="get">
Sin: <input type="text" name="E_SIN"><br>
<input type="submit">
</form>

<?php
$sql = "DELETE FROM Employee WHERE E_SIN=$E_SIN";
?>

<h2>delete Schedule Event</h2>
<form action="welcome_get.php" method="get">
Year: <input type="text" name="Year"><br>
Month: <input type="text" name="Month"><br>
Day: <input type="text" name="Day"><br>
<input type="submit">
</form>

<?php
$sql = "DELETE FROM Schedule WHERE ((Year=$E_SIN) & (Month=$Month) &(Day=$Day))";
?>

<h2>delete Task</h2>
<form action="welcome_get.php" method="get">
TaskNum: <input type="text" name="TaskNum"><br>
<input type="submit">
</form>

<?php
$sql = "DELETE FROM Task WHERE TaskNum=$TaskNum";
?>

<h2>delete TaskNotes</h2>
<form action="welcome_get.php" method="get">
Task_Type: <input type="text" name="Task_Type"><br>
<input type="submit">
</form>

<?php
$sql = "DELETE FROM TaskNotes WHERE Task_Type=$Task_Type";
?>

<h2>delete Has</h2>
<form action="welcome_get.php" method="get">
TaskNum: <input type="text" name="TaskNum"><br>
Task_Type: <input type="text" name="Task_Type"><br>
Year: <input type="text" name="Year"><br>
Month: <input type="text" name="Month"><br>
Day: <input type="text" name="Day"><br>
<input type="submit">
</form>

<?php
$sql = "DELETE FROM Schedule Has ( (TaskNum=$TaskNum) & (Task_Type=$Task_Type) $ (Year=$E_SIN) & (Month=$Month) &(Day=$Day))";
?>

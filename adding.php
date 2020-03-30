// Adding - for all tables

<h2>Adding Employee</h2>
<form action="welcome_get.php" method="get">
Sin: <input type="text" name="E_SIN"><br>
Name: <input type="text" name="E_Name"><br>
Phone Number: <input type="text" name="E_phoneNum"><br>
E-mail: <input type="text" name="E_address"><br>
<input type="submit">
</form>

<?php
$sql = "INSERT INTO Employee (E_SIN,E_Name, E_phoneNum,E_address)
VALUES ($E_SIN, $E_Name, $E_phoneNum, $E_address)";
?>

<h2>Adding Schedule Event</h2>
<form action="welcome_get.php" method="get">
Year: <input type="text" name="Year"><br>
Month: <input type="text" name="Month"><br>
Day: <input type="text" name="Day"><br>
Start_Time: <input type="text" name="Start_Time"><br>
End_Time: <input type="text" name="End_Time"><br>
Sin: <input type="text" name="E_SIN"><br>
<input type="submit">
</form>

<?php
$sql = "INSERT INTO Schedule (Year, Month, Day,Start_Time,End_Time,E_SIN)
VALUES ($Year, $Month, $Day, $Start_Time,$End_Time, $E_SIN )";
?>

<h2>Adding Task</h2>
<form action="welcome_get.php" method="get">
TaskNum: <input type="text" name="TaskNum"><br>
Task_Type: <input type="text" name="Task_Type"><br>
<input type="submit">
</form>

<?php
$sql = "INSERT INTO Task (TaskNum, Task_Type)
VALUES ($TaskNum, $Task_Type)";
?>

<h2>Adding TaskNotes</h2>
<form action="welcome_get.php" method="get">
Task_Type: <input type="text" name="Task_Type"><br>
T_notes: <input type="text" name="T_notes"><br>
<input type="submit">
</form>

<?php
$sql = "INSERT INTO TaskNotes (Task_Type, T_notes)
VALUES ($Task_Type, $T_notes)";
?>

<h2>Adding Has</h2>
<form action="welcome_get.php" method="get">
TaskNum: <input type="text" name="TaskNum"><br>
Task_Type: <input type="text" name="Task_Type"><br>
Year: <input type="text" name="Year"><br>
Month: <input type="text" name="Month"><br>
Day: <input type="text" name="Day"><br>
<input type="submit">
</form>

<?php
$sql = "INSERT INTO Has (TaskNum, Task_Type, Year, Month, Day)
VALUES ($TaskNum, $Task_Type, $Year, $Month, $Day)";
?>

<form action="updatenutrient-query.php" method="post">
<style>
body{
  background-image: url('img.jpg');
  background-repeat: no-repeat;
}
</style> 

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<div class="navbar">
  <a href="#home" onClick="window.location='Home.html'">Home </a>
  <a href="#search" onClick="window.location='search-query.html'">Search</a>
   <a href="#update" onClick="window.location='updatepage.html'">Update</a>
   <a href="#update" onClick="window.location='search_employee_schedule.html'">Schedule</a>

  
  <div class="dropdown">
    <button class="dropbtn">Insert 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#" onClick="window.location='insert-query.html'" > Insert Plant</a>
      <a href="#" onClick="window.location='process-insertnutrient.php'">Insert Nutrient</a>
    </div>
  </div> 
</div>

<html>
<style>
input[type=text], select {
  width: 25%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 10%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}


</style>

</html>
 
<center>
Update the nutrients hazards using the nutrient name
</br>
</br>
<label>Nutrient Name</label>
<?php
include 'connecthg.php';
$conn = OpenCon();
$result = $conn->query("select N_ID, N_Name from Nutrients");
echo "<select name='id'>";
while ($row = $result->fetch_assoc())
{
unset($N_ID, $N_Name);
$N_ID = $row['N_ID'];
$N_Name = $row['N_Name'];
echo '<option value="'.$N_ID.'">'.$N_Name.'</option>';
}
echo "</select>";
?>
<br>
<label>Nutrient hazards</label>
<input name="descrp" type="text" placeholder="Enter new hazards">
<br>
<input type="submit" value="Search">
</form>

<form action="updatessentialminerals-query.php" method="post"> 
<center>
Update the essential minerals concentration using the mineral type
</br>
</br>
<label>Mineral Type</label>
<?php
$result = $conn->query("select N_ID, EM_Type from Nutrients, EssentialMinerals where EssentialMinerals.NM_ID = Nutrients.N_ID ");
echo "<select name='id'>";
while ($row = $result->fetch_assoc())
{
unset($N_ID, $EM_Type);
$N_ID = $row['N_ID'];
$EM_Type = $row['EM_Type'];
echo '<option value="'.$N_ID.'">'.$EM_Type.'</option>';
}
echo "</select>";
?>
<br>
<label>Concentration</label>
<input name="concen" type="text" placeholder="Enter new concentration">
<br>
<br>
<input type="submit" value="Search">
</form>

<form action="updatewater-query.php" method="post"> 
<center>
Update the water temperature using the nutrient name
</br>
</br>
<label>Nutrient Name</label>
<?php
$result = $conn->query("select N_ID, N_Name from Nutrients");
echo "<select name='id'>";
while ($row = $result->fetch_assoc())
{
unset($N_ID, $N_Name);
$N_ID = $row['N_ID'];
$N_Name = $row['N_Name'];
echo '<option value="'.$N_ID.'">'.$N_Name.'</option>';
}
echo "</select>";
?>
<br>
<label>Temperature</label>
<input name="temp" type="text" placeholder="Enter temperature (C)">
<br>
<br>
<input type="submit" value="Search">
</form>

<form action="updatelight-query.php" method="post"> 
<center>
Update the ligth bulb type using the wavelength of light
</br>
</br>
<label>Wavelength </label>
<?php
$result = $conn->query("select Light_SerialNo, Wavelength from Lighting ");
echo "<select name='id'>";
while ($row = $result->fetch_assoc())
{
unset($Wavelength, $Light_SerialNo);
$Wavelength = $row['Wavelength'];
$Light_SerialNo = $row['Light_SerialNo'];
echo '<option value="'.$Light_SerialNo.'">'.$Wavelength.'</option>';
}
echo "</select>";
?>
<br>
<label>Bulb type</label>
<input name="bulb" type="text" placeholder="Enter new type">
<br>
<br>
<input type="submit" value="Search">
</form>





</center>

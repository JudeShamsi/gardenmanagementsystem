<form action="calculateavg-query.php" method="post"> 
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

</br>
</br>

<center>
<h1> Calculate the average growth rate for the selected nutrient </h1>
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
<input type="submit" value="Search">
</form>
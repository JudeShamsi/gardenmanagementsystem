<?php

include 'connecthg.php';
$conn = OpenCon();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
        <title>Division Record</title>
        <link rel="stylesheet" href="./style_add_supplier.css"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <style>
            body {
                font-family: 'Montserrat', sans-serif;
                background-color: wheat;
            }
            table {
                width: 100%;
                color: #228B22;
                font-family: 'Montserrat', sans-serif;
                font-size: 17px;
                text-align: left;
                padding: 10px;
                /* border: 2px solid black; */
                /* border-collapse: collapse; */
                
            }
            th {
                background-color: #228B22;
                color: white;
                padding: 10px;
                border: 2px solid black;
                font-family: 'Montserrat', sans-serif;
            }
            tr: nth-child(even) {
                background-color: #228B22; 
            }
        </style>
<div id="Homepage" class="tabcontent">
				<h1>Homepage</h1>
		</div>
		<div id="Inventory" class="tabcontent">
			<h1>Inventory</h1>
		</div>
		<div id = "Schedule" class="tabcontent">
			<h1>Schedule</h1>
		</div>	
		<button class="headertab" onclick="openTab('Homepage', this, 'red')" id="defaultOpen">Homepage</button>
		<button class="headertab" onclick="openTab('Suppliers', this, 'yellow')">Suppliers</button>
		<button class="headertab" onclick="openTab('Schedule', this, 'green')">Schedule</button>
<?php
    $Inventory_Category = $_POST['i-category'];
    $sql = mysqli_query($conn, "SELECT s.s_fname, s.s_lname, s.s_email, s.s_phone 
    FROM Supplier s WHERE NOT EXISTS (
        (SELECT I1.Inventory_ID
            FROM Inventory I1
            WHERE I1.Inventory_Category = '$Inventory_Category') 
        EXCEPT 
        (SELECT P.Inventory_ID 
FROM Provides P, Inventory I2
WHERE P.Supplier_ID=s.Supplier_ID AND P.Inventory_ID=I2.Inventory_ID 
AND I2.Inventory_Category = '$Inventory_Category'))");

    
?>
<div class="container">
    <table class="table">
        <tr>
            <th>Supplier First Name</th>
            <th>Supplier Last Name</th>
            <th>Supplier Phone</th>
            <th>Supplier Email</th>
        </tr>
        <?php
        $sr = 1;
        while($row = mysqli_fetch_array($sql)) {?>
        <tr>
            <form action="" method="post" role = "form">
                <td><?php echo $row['s_fname'];?></td>
                <td><?php echo $row['s_lname'];?></td>
                <td><?php echo $row['s_phone'];?></td>
                <td><?php echo $row['s_email'];?></td>
        
            </form>
        </tr>
        <?php  $sr++;}
        
        ?>
    </table>
</div>

</body>
</html>

 
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
        <title>Find Suppliers By Inventory Category</title>
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
        
        <form action="homepage.html" method="post">
                <div class="pages-btn">
                <button class="headertab" onclick="openTab('Homepage', this, 'red')" id="defaultOpen">Homepage</button>
                </div>
        </form>
        <form action="add_inventory.php" method="post">
                <div class="pages-btn">
                <button class="headertab" onclick="openTab('Inventory', this, 'yellow')">Inventory</button>
                </div>
        </form>
        <form action="add_schedule.php" method="post">
                <div class="pages-btn">
                <button class="headertab" onclick="openTab('Schedule', this, 'green')">Schedule</button>
                </div>
        </form>
<?php
    $Inventory_Category = $_POST['s-category'];
    $sql = mysqli_query($conn, "SELECT * FROM Supplier AS s, Inventory AS i, Provides AS p 
    WHERE s.Supplier_ID = p.Supplier_ID 
    AND i.Inventory_ID = p.Inventory_ID  
    AND i.Inventory_Category = '$Inventory_Category'");
    
?>
<div class="container">
    
    <table class="table">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Category Type</th>
        </tr>
        <?php
        $sr = 1;
        while($row = mysqli_fetch_array($sql)) {?>
        <tr>
            <form action="" method="post" role = "form">
                <td><?php echo $row['s_fname'];?></td>
                <td><?php echo $row['s_lname'];?></td>
                <td><?php echo $row['s_email'];?></td>
                <td><?php echo $row['s_phone'];?></td>
                <td><?php echo $row['Inventory_Category'];?></td>
            </form>
        </tr>
        <?php  $sr++;}
        
        ?>
    </table>
</div>

    </form>




</body>
</html>

 
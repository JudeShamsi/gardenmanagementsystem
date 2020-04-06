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
        <title>Delete Records</title>
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
                <button class="headertab" onclick="openTab('Homepage', this, 'green')">HomePage</button>
                </div>
        </form>
        <form action="add_supplier.html" method="post">
                <div class="pages-btn">
                <button class="headertab" onclick="openTab('Suppliers', this, 'yellow')">Suppliers</button>
                </div>
        </form>
        <form action="add_schedule.php" method="post">
                <div class="pages-btn">
                <button class="headertab" onclick="openTab('Schedule', this, 'green')">Schedule</button>
                </div>
        </form>
<?php
    $sql = mysqli_query($conn, "SELECT * FROM Inventory");
    
?>
<div class="container">
    <?php
    if(isset($_POST['submitDeleteBtn'])) {
        $key = $_POST['keyToDelete'];

        // check if the record exists in the table before deleting 

        $check = mysqli_query($conn, "SELECT * FROM Inventory WHERE Inventory_ID = '$key' ");
       // $checkresult = $conn->query($check);
        if(mysqli_num_rows($check) > 0){
            
        $queryDelete = mysqli_query($conn, "DELETE FROM Inventory WHERE Inventory_ID = '$key' ");
        ?>
        
        <div class="alert alert-warning">
            <p>Record deleted</p>
        </div>

    <?php    } else {
            ?>

            <div class="alert alert-warning">
                <p>Record does not exist</p>
            </div>

            <?php }
    }
    ?>
    <table class="table">
        <tr>
            <th>Inventory Id</th>
            <th>Inventory Category</th>
            <th>Inventory Name</th>
            <th>Stock Date</th>
            <th>Expiration Date</th>
        </tr>
        <?php
        $sr = 1;
        while($row = mysqli_fetch_array($sql)) {?>
        <tr>
            <form action="" method="post" role = "form">
                <td><?php echo $sr;?></td>
                <td><?php echo $row['Inventory_Category'];?></td>
                <td><?php echo $row['InventoryName'];?></td>
                <td><?php echo $row['Stock_Date'];?></td>
                <td><?php echo $row['ExpirationDate'];?></td>
                <td>
                    <input type="checkbox" name="keyToDelete" value="<?php echo $row['Inventory_ID'];?>" required>
                 </td>
                 <td>
                    <input type="submit" name="submitDeleteBtn" class="btn btn-info">
                 </td>
            </form>
        </tr>
        <?php  $sr++;}
        
        ?>
    </table>
</div>

<div>
    <form action="add_supplier.html" method="post">
        <div class="rows" id="pages-btn">
            <input type="submit" value="Add Supplier">
        </div>
    </form>
</div> 

</body>
</html>

 
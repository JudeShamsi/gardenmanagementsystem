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
        <title>Find Schedule</title>
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
    $E_Type = $_POST['employee-type'];
    $sql = mysqli_query($conn, "SELECT DISTINCT * FROM Schedule AS s, Has AS h, Task AS t, Employee AS e WHERE h.TaskNum = t.TaskNum 
    AND s.Schedule_Num = h.Schedule_NUM AND e.E_Type = '$E_Type' AND e.E_SIN = s.E_SIN");
    
?>
<div class="container">
    
    <table class="table">
        <tr>
            <th>Scheduled Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Task</th>
            <th>Task Notes</th>
            <th>Task Type</th>

        </tr>
        <?php
        $sr = 1;
        while($row = mysqli_fetch_array($sql)) {?>
        <tr>
            <form action="" method="post" role = "form">
                <td><?php echo $row['Scheduled_Date'];?></td>
                <td><?php echo $row['Start_Time'];?></td>
                <td><?php echo $row['End_Time'];?></td>
                <td><?php echo $row['Task_Name'];?></td>
                <td><?php echo $row['T_notes'];?></td>
                <td><?php echo $row['E_Type'];?></td>
            </form>
        </tr>
        <?php  }
        
        ?>
    </table>
</div>

<div>
    <form action="find_employee_schedule.html" method="post">
        <div class="rows" id="pages-btn">
            <input type="submit" value="Go Back">
        </div>
    </form>
</div>  
    </form>




</body>
</html>

 
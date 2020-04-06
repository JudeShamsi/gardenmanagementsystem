<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'connecthg.php';
        $conn = OpenCon();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $employeeSet = $conn->query("SELECT E_fname, E_SIN FROM Employee WHERE E_Type = 'Operations'");
        $supplierSet = $conn->query("SELECT s_fname, Supplier_ID FROM Supplier");

        ?>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<link rel="stylesheet" href="./style_add_supplier.css"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<title>Add a Supplier</title>
    </head>	
    <body>
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
        
        <h1 style="color: white"></h1>
        <br>

         <h3>Add Inventory</h3> 
        <div class="container">
        <form action="insert_inventory.php" method="post">
            <div class="row">
                <div class="col-25">
                    <label>Inventory Category</label>
                </div>
                <div class="col-75">
                    <input id="i-category" name="i-category" type="text" placeholder="Type
                    Here">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Inventory Name</label>
                </div>
                <div class="col-75">
                    <input id="i-name" name="i-name" type="text" placeholder="Type
                    Here">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Stock Date</label>
                </div>
                <div class="col-75">
                    <input id="s-date" name="s-date" type="date" placeholder="Type
                    Here">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Expiration Date</label>
                </div>
                <div class="col-75">
                    <input id="e-date" name="e-date" type="date" placeholder="Type
                    Here">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Supplier</label>
                </div>
                <div class="col-75">
                <select name="suppliers">
                        <?php
                            while($rows = $supplierSet->fetch_assoc()){
                                $Supplier_ID = $rows['Supplier_ID'];
                                $S_fname = $rows['s_fname'];
                                echo "<option value='$Supplier_ID'>$S_fname</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Operations Manager Approval</label>
                </div>
                <div class="col-75">
                    <select name="employee_name">
                        <?php
                            while($rows = $employeeSet->fetch_assoc()){
                                $E_SIN = $rows['E_SIN'];
                                $E_fname = $rows['E_fname'];
                                echo "<option value='$E_SIN'>$E_fname</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Add Inventory">
            </div>
            <div >
            <h3>View Inventory Table</h3>
            <form action="search_inventory.php" method="post">
                <div class="pages-btn">
                    <input type="submit" value="Search Inventory">
                </div>
            </form>
        </div> 
        </form>
        </div>
        
        

    </body>
</html>




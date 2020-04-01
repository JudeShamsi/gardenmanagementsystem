<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'connect.php';
        $conn = OpenCon();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $employeeSet = $conn->query("SELECT E_fname, E_SIN FROM Employee WHERE E_Type = 'Operations'");
        $supplierSet = $conn->query("SELECT s_fname FROM Supplier");

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
		<button class="headertab" onclick="openTab('Homepage', this, 'red')" id="defaultOpen">Homepage</button>
		<button class="headertab" onclick="openTab('Inventory', this, 'yellow')">Inventory</button>
		<button class="headertab" onclick="openTab('Schedule', this, 'green')">Schedule</button>
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
                                $s_fname = $rows['s_fname'];
                                echo "<option value='$s_fname'>$s_fname</option>";
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
        </form>
        </div>
        
        <div >
            <h3>View Suppliers Table</h3>
            <form action="search_supplier.php" method="post">
                <div class="pages-btn">
                    <input type="submit" value="Search Suppliers">
                </div>
            </form>
        </div>    

    </body>
</html>




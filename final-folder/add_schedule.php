<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'connecthg.php';
        $conn = OpenCon();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $employeeSet = $conn->query("SELECT E_fname, E_SIN FROM Employee");
        $supplierSet = $conn->query("SELECT s_fname, Supplier_ID FROM Supplier");
        

        ?>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<link rel="stylesheet" href="./style_add_supplier.css"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<title>Create A Task In the Schedule</title>
    </head>	
    <body>
		<div id="Homepage" class="tabcontent">
				<h1>Homepage</h1>
		</div>
		<div id="Inventory" class="tabcontent">
			<h1>Inventory</h1>
		</div>
		<div id = "Schedule" class="tabcontent">
			<h1>Suppliers</h1>
        </div>	
        <form action="homepage.html" method="post">
                <div class="pages-btn">
                <button class="headertab" onclick="openTab('Homepage', this, 'green')">HomePage</button>
                </div>
        </form>
        <form action="add_inventory.php" method="post">
                <div class="pages-btn">
                <button class="headertab" onclick="openTab('Inventory', this, 'yellow')">Inventory</button>
                </div>
        </form>
        <form action="add_supplier.html" method="post">
                <div class="pages-btn">
                <button class="headertab" onclick="openTab('Suppliers', this, 'green')">Suppliers</button>
                </div>
        </form>        
        <h1 style="color: white"></h1>
        <br>
        

         <h3>Add a Task to the Schedule</h3> 
        <div class="container">
        <form action="insert_schedule.php" method="post">
        
            <div class="row">
                <div class="col-25">
                    <label>Task Type</label>
                </div>
                <div class="col-75">
                <select name="employee-type">
                        <option value='Manager Task'>Manager Task</option>;
                        <option value='Facility Task'>Facility Task</option>;
                        <option value='Gardener Task'>Gardener Task</option>;                      
                </select>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Task Name</label>
                </div>
                <div class="col-75">
                    <input id="task-name" name="t-name" type="text" placeholder="Type
                    Here">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Task Notes</label>
                </div>
                <div class="col-75">
                    <input id="task-notes" name="t-notes" type="text" placeholder="Type
                    Here">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Date of Scheduled Task</label>
                </div>
                <div class="col-75">
                    <input id="schedule-date" name="s-date" type="date" placeholder="Type
                    Here">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Start Time</label>
                </div>
                <div class="col-75">
                    <input id="schedule-start-time" name="ss-time" type="text" placeholder="Type
                    Here">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>End Time</label>
                </div>
                <div class="col-75">
                    <input id="schedule-end-time" name="se-time" type="text" placeholder="Type
                    Here">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Employee Assigned Task</label>
                </div>
                <div class="col-75">
                    <select name="employees">
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
                <input type="submit" value="Add Task">
            </div>
        </form>
        </div>
        
        
        
        <form action="view_schedule.php" method="post">
        <div class="row">
                <div class="col-25">
                    <label>View Schedule By Employee Type</label>
                </div>
                <div class="col-75">
                <select name="employee-type">
                        <option value='Gardener'>Gardener</option>;
                        <option value='Facility'>Facility</option>;
                        <option value='Operations'>Operations</option>;                      
                </select>
                </div>
        </div>
            <div class="pages-btn">
                <input type="submit" value="Search Schedule">
            </div>
            </div>
        </form> 
       
        

        <div >
            <h3>Add an Employee</h3>
            <form action="add_employee.php" method="post">
                <div class="pages-btn">
                    <input type="submit" value="Add Employee">
                </div>
            </form>
        </div>    

    </body>
</html>


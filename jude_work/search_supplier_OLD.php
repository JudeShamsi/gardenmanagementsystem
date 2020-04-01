<!DOCTYPE html>
<html>
    <head>
        <title>Suppliers</title>
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
                border: 2px solid black;
                border-collapse: collapse;
                
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
    </head>
    <body>
        <table frame=void rules=rows>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            <?php
            include 'connect.php';
            $conn = OpenCon();
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT s_fname, s_lname, s_email, s_phone FROM Supplier";
            $result = $conn->query($sql);
            if(!empty($result) && $result->num_rows > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['s_fname']."</td>";
                    echo "<td>".$row['s_lname']."</td>";
                    echo "<td>".$row['s_email']."</td>";
                    echo "<td>".$row['s_phone']."</td>";
                    echo "<td><a href='delete_supplier.php?id=".$row['s_fname']."'></a></td>"; //if you want to delete based on staff_id
                    echo "</tr>"; 
                }
                echo "</table>";
            } else {
                echo "0 result";
            }
            $conn-> close();
            ?>
        </table>
    </body>
</html>
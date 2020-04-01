<?php

include 'connect.php';
$conn = OpenCon();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html>
<head>
        <title>Delete Records</title>
</head>
<body style="padding-top: 100px;">
<?php
    //$fetchQuery = mysqli_query("SELECT * FROM Supplier") or die("could not fetch".mysql_error());
    $sql = mysqli_query($conn, "SELECT * FROM Supplier");
    
?>
<div class="container">
    <?php
    if(isset($_POST['submitDeleteBtn'])) {
        $key = $_POST['keyToDelete'];

        // check if the record exists in the table before deleting 

        $check = mysqli_query($conn, "SELECT * FROM Supplier WHERE Supplier_ID = '$key' ");
       // $checkresult = $conn->query($check);
        if(mysqli_num_rows($check) > 0){
            
        $queryDelete = mysqli_query($conn, "DELETE FROM Supplier WHERE Supplier_ID = '$key' ");
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
    <table class="table table-condensed table-boardered">
        <tr>
            <th>Supplier Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php
        $sr = 1;
        while($row = mysqli_fetch_array($sql)) {?>
        <tr>
            <form action="" method="post" role = "form">
                <td><?php echo $sr;?></td>
                <td><?php echo $row['s_fname'];?></td>
                <td><?php echo $row['s_lname'];?></td>
                <td><?php echo $row['s_email'];?></td>
                <td><?php echo $row['s_phone'];?></td>
                <td>
                    <input type="checkbox" name="keyToDelete" value="<?php echo $row['Supplier_ID'];?>" required>
                 </td>
                 <td>
                    <input type="submit" name="submitDeleteBtn" class="btn btn-info">
                 </td>
            </form>
        </tr>
        <?php  }
        $sr++;
        ?>
    </table>
</div>

</body>
</html>

 
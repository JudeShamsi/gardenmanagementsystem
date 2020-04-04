<?php

include 'connecthg.php';
$conn = OpenCon();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Task_Type = $_POST['employee-type'];
$Task_Name = $_POST['t-name'];
$T_notes = $_POST['t-notes'];
$Start_Time = $_POST['ss-time'];
$End_Time = $_POST['se-time'];
$Schedule_Date = date("Y-m-d", strtotime($_POST['s-date']));
$E_SIN = $_POST['employees'];


$sql_insert_schedule = "INSERT INTO Schedule(`Scheduled_Date`, Start_Time, End_Time, `E_SIN`) 
VALUES ('$Schedule_Date', '$Start_Time', '$End_Time', '$E_SIN')";


if ($conn->query($sql_insert_schedule) === TRUE) {
    $schedule_num = $conn->insert_id;
    echo "Last inserted ID is: " . $schedule_num;
    $sql_insert_task = "INSERT INTO Task(Task_Type, Task_Name, T_notes) 
    VALUES ('$Task_Type', '$Task_Name', '$T_notes')";        
    if($conn->query($sql_insert_task) === TRUE){
        $task_num = $conn->insert_id;
        echo "Last inserted ID is: " . $task_num;
        $sql_insert_has = "INSERT INTO Has() 
        VALUES('$task_num', '$Task_Type', '$schedule_num')";
            echo "after. schedule is: " . $schedule_num;
            echo "after. task ID is: " . $task_num;

        if($conn->query($sql_insert_has) === TRUE){
            echo "New record created successfully";
        }
    } else {
        echo "error with provides";
    }
   
} else {
    echo "Error: " . $sql_insert_schedule. "<br>" . $conn->error;
    echo "Error: " . $sql_insert_task. "<br>" . $conn->error;
    echo "Error: " . $sql_insert_has. "<br>" . $conn->error;
}

$conn->close();
?>
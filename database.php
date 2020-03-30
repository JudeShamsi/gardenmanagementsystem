<?php
/*$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
*/
/// TABLES
$sql = "CREATE TABLE Employee (
  E_SIN  INT(6) UNSIGNED PRIMARY KEY,
  E_Name          CHAR(20),
  E_phoneNum        CHAR(10),
  E_address       CHAR(20)
)";

$sql = "CREATE TABLE Schedule (
  Year               int  NOT NULL,
  Month              int  NOT NULL,
  Day                int  NOT NULL,
  Start_Time         Date,
  End_Time           Date,
  PRIMARY KEY (Year, Month, Day),
  E_SIN int FOREIGN KEY REFERENCES Employee(E_SIN)
  */
)";

$sql = "CREATE TABLE Task (
  TaskNum  int   PRIMARY KEY,
  Task_Type CHAR(20) FOREIGN KEY REFERENCES TaskNotes(Task_Type)
)";

$sql = "CREATE TABLE TaskNotes (
  Task_ Type    CHAR(20) PRIMARY KEY,
  T_notes         CHAR(1000)
)";

$sql = "CREATE TABLE Has (
   TaskNum int FOREIGN KEY REFERENCES Task(TaskNum),
   Task_Type CHAR(20) FOREIGN KEY REFERENCES TaskNotes(Task_Type),
   Year                       int  NOT NULL,
   Month                      int  NOT NULL,
   Day                        int  NOT NULL,
  PRIMARY KEY (TaskNum,  Task_ Type , Year, Month, Day ),
  FOREIGN KEY (Year, Month, Day) REFERENCES Schedule(Year, Month, Day)
)";


/*$conn->close();*/

?>

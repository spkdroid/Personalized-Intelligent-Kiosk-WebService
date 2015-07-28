<?php

// Main Insert Command Module to insert the content into database

// This is used to fetch the grade information from the server based on the user_id


include 'db.php';

//$eventid=$_GET["event_id"];

$login_id = $_GET["login_id"];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT grades_student_id,information FROM grades where grades_student_id='$login_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        $name=$row["grades_student_id"];
        $id=$row["information"];
    }
}
echo "[";
echo json_encode(array('student_id' =>$name,'grades' => $id));
echo "]";

$conn->close();
?>

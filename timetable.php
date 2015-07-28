<?php

// Main Insert Command Module to insert the content into database

// Based on the username this webservice will return the time table information from the server.

include 'db.php';

//$eventid=$_GET["event_id"];



$login_id = $_GET["login_id"];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT student_id,Class1,Class2,Class3,Class4,Class5 FROM timetable where student_id='$login_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        $name=$row["student_id"];
        $class1=$row["Class1"];
        $class2=$row["Class2"];
        $class3=$row["Class3"];
        $class4=$row["Class4"];
        $class5=$row["Class5"];
    }
}

// Json Encoding about the Time Table.
echo "[";
echo json_encode(array('student_id' =>$name,'class1'=>$class1,'class2'=>$class2,'class3'=>$class3,'class4'=>$class4,'class5'=>$class5));
echo "]";

$conn->close();
?>

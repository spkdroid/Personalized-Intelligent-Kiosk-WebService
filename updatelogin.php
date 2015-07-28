<?php

// Main Insert Command Module to insert the content into database
// This is used to as an new sign up serveice when the user login into the system for the fist time.
// The webservice will read the username,password,mailid and department and will load into the Database.

include 'db.php';

//$eventid=$_GET["event_id"];

$login_dpt = $_GET["login_dpt"];
$login_id = $_GET["login_id"];
$login_name= $_GET["login_name"];
$login_password = $_GET["login_password"];


//$eventdesc = $_GET["event_desc"];
//$eventlocation = $_GET["event_location"];
//$eventdate=date('Y-m-d',strtotime($eventdate));

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql ="INSERT INTO DAY_AT_DAL_LOGIN (login_dpt,login_id,login_name,login_password) VALUES ('$login_dpt','$login_id','$login_name','$login_password')";

//$sql = "UPDATE DAY_AT_DAL_LOGIN SET login_dpt='$login_dpt',login_id='$login_id',login_name='$login_name',login_password='$login_password'";

if (mysqli_query($conn, $sql))
{
   // echo "Record updated successfully";
echo "[";
echo json_encode(array('result' =>"SUCCESS"));
echo "]";
}
else
{
echo "[";
echo json_encode(array('result' =>"FAILURE"));
echo "]";
//    echo "Error updating record: " . mysqli_error($conn);
}
$conn->close();
?>

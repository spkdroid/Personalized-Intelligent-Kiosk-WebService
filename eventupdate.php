<?php
// Main Insert Command Module to insert the content into database
// Updating the Event into the database
// this file will be reading the username,eventname,event_date,event message and the time of the event
// This will return success when the data is entered into the system FAILURE Token when there is an event of failure
include 'db.php';
//$eventid=$_GET["event_id"];
$dal_id = $_GET["dal_id"];
$event_name= $_GET["event_name"];
$event_date = $_GET["event_date"];
$event_msg = $_GET["event_msg"];
$event_time = $_GET["event_time"];
//$eventdesc = $_GET["event_desc"];
//$eventlocation = $_GET["event_location"];
//$eventdate=date('Y-m-d',strtotime($eventdate));
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Insert Query to update the content into the database
$sql ="INSERT INTO event_dal_log (dal_id,event_name,event_date,event_msg,event_time) VALUES ('$dal_id','$event_name','$event_date','$event_msg','$event_time')";
//$sql = "UPDATE DAY_AT_DAL_LOGIN SET login_dpt='$login_dpt',login_id='$login_id',login_name='$login_name',login_password='$login_password'";
// when the statement is executed successfully SUCCESS message is shown
// when the statement is failed to execute FAILURE message is shown
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

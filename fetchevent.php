<?php
// This is used to fetch the event from the database
// This application will be reading the user id and the date
// Main Insert Command Module to insert the content into database
include 'db.php';
//$eventid=$_GET["event_id"];
$dal_id = $_GET["dal_id"];
$dal_date=$_GET["dal_date"];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// SQL statement to fetch the event and other detail based on the date
// event_dal_log is the table which contains all the information about the event name,event date,event message and the time
// Based on the user the information is retrived and shown in the kiosk
$sql = "SELECT dal_id,event_name,event_date,event_msg,event_time from event_dal_log where dal_id='$dal_id' and event_date='$dal_date'";
$result = $conn->query($sql);
// json response is constructed and is sent back to the kiosk
echo "[";
if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
  $dal_id = $row["dal_id"];
	$event_name= $row["event_name"];
	$event_date =$row["event_date"];
	$event_msg = $row["event_msg"];
	$event_time = $row["event_time"];
echo json_encode(array('dal_id' =>$dal_id,'event_name' => $event_name,'event_date'=> $event_date,'event_msg'=> $event_msg,'event_time'=> $event_time));
echo ",";
}
}
// final empty json array element to mention that it is the last element
echo "{}";
echo "]";
$conn->close();
?>

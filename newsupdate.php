<?php

// Main Insert Command Module to insert the content into database

// When the USER want to update his/her preference information.


include 'db.php';
//$eventid=$_GET["event_id"];
$dal_id = $_GET["dal_id"];
$preference= $_GET["preference"];
//$eventdesc = $_GET["event_desc"];
//$eventlocation = $_GET["event_location"];
//$eventdate=date('Y-m-d',strtotime($eventdate));
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql ="INSERT INTO news_feed_preference (dal_id,preference) VALUES ('$dal_id','$preference')";
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

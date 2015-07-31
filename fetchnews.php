<?php
// Main Insert Command Module to insert the content into database
// This service is used to find the news feed preference of the user.
// when the user id is given the corresponding news preference is taken from the database
include 'db.php';
//$eventid=$_GET["event_id"];
$dal_id=$_GET["dal_id"];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// This is used to find the user preference for the news feed that need to be shown in the kiosk
// Each user has the preference updated in the database
$sql = "SELECT dal_id,preference from news_feed_preference where dal_id='$dal_id'";
$result = $conn->query($sql);
//Json is constructed with their username and the preference
echo "[";
if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
   	$dal_id=$row["dal_id"];
    $preference = $row["preference"];
echo json_encode(array('dal_id'=> $dal_id,'preference' => $preference));
}
}
echo "]";
$conn->close();
?>

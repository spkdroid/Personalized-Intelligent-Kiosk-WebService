<?php
// An update module that changes the news feed preference
// Main Insert Command Module to insert the content into database
include 'db.php';
$login_id = $_GET["login_id"];
$news_pref= $_GET["pref"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// SQL statement to update the news feed preference
$sql = "UPDATE DAY_AT_DAL_LOGIN SET nf='$news_pref' where login_id='$login_id'";
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

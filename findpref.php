<?php
// Main Insert Command Module to insert the content into database
// nf is the news_feed_preference of the user
// based on the news_feed_preference the appropriate news has been show
include 'db.php';

$login_id = $_GET["login_id"];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//SQL statement to find the nf which is the news feed preference. based on the nf tag the type of news feed will be changed
$sql="select nf from DAY_AT_DAL_LOGIN where login_id='$login_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        $party_name = $row["nf"];
}
}
// party_name contains the news feed type for the user
echo "[";
echo json_encode(array('result' =>"$party_name"));
echo "]";
$conn->close();
?>

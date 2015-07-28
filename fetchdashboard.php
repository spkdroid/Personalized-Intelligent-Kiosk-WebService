<?php

// Main Insert Command Module to insert the content into database

// Based on the login information the the user details is fetched and is showin the dashboard

// When there is an event of failure FOF is showin in the screen

include 'db.php';

//$eventid=$_GET["event_id"];

$login_id = $_GET["login_id"];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT login_id,login_name FROM DAY_AT_DAL_LOGIN where login_id='$login_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        $name=$row["login_name"];
        $id=$row["login_id"];
    }
}
if($name!=NULL && $id!=NULL)
{
echo "[";
echo json_encode(array('name' =>$name,'id' => $id));
echo "]";
}
else
{
echo "[";
echo json_encode(array('name' =>"FOF",'id' =>"FOF"));
echo "]";
}
$conn->close();
?>

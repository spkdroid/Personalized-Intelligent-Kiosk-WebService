<?php

// Main Insert Command Module to insert the content into database
// this is the module that is used to check the username and the password
// Based on the username and the password a True tag is responded
// when the password is wrong then the False tag is responded
include 'db.php';
$login_id = $_GET["login_id"];
$login_password = $_GET["login_password"];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// SQL statment to match the user name and the password
$sql = "SELECT login_password FROM DAY_AT_DAL_LOGIN where login_id='$login_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        $pass=$row["login_password"];
    }
}
// JSON RESPONSE IS constructed
echo "[";
if($pass==$login_password)
{
echo json_encode(array('result' =>"TRUE"));
}
else
{
echo json_encode(array('result' =>"FALSE"));
}
echo "]";
$conn->close();
?>

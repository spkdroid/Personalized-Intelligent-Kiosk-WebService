<?php
// Main Insert Command Module to insert the content into database
// This is used to as an new sign up serveice when the user login into the system for the fist time.
// The webservice will read the username,password,mailid and department and will load into the Database.
include 'db.php';
$login_dpt = $_GET["login_dpt"];
$login_id = $_GET["login_id"];
$login_name= $_GET["login_name"];
$login_password = $_GET["login_password"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//SQL STATEMENT TO insert into the database when the sign in operation is performed
$sql ="INSERT INTO DAY_AT_DAL_LOGIN (login_dpt,login_id,login_name,login_password) VALUES ('$login_dpt','$login_id','$login_name','$login_password')";
// JSON RESPONSE is constructed using this part of code
if (mysqli_query($conn, $sql))
{
echo "[";
echo json_encode(array('result' =>"SUCCESS"));
echo "]";
}
else
{
echo "[";
echo json_encode(array('result' =>"FAILURE"));
echo "]";
}
$conn->close();
?>

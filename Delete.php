
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>View Records</title>

</head>

<body><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "User_info";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
//$User_Name= $_POST("User_Name");
//$User_ID= $_POST["User_ID"];
$User_ID=1;
$sql = "DELETE FROM Users WHERE User_ID='$User_ID'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
</body>
</html>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>View Records</title>

</head>

<body>

<?php
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
$User_ID= 7;
$User_Name= "X6";
$User_Email= "k8666@drexel.edu";
$Book_title= "Gooo";
$sql = "INSERT INTO Users (User_ID, User_Name, User_Email,Book_title)
VALUES ('$User_ID', '$User_Name', '$User_Email','$Book_title')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
 </body>
</html>

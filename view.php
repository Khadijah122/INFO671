<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>
   <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>

<title>View Records</title>

</head>

<body>



<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
$User_ID=2;


$sql = "Select * From Users WHERE User_ID='$User_ID'";

   mysql_select_db('User_info');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
    echo "<table>";
        echo "<tr>";
        echo "<th> Book Title </th>";
        echo "<th> User ID </th>";
        echo "<th> User Name </th>";
        echo "<th> User Email </th>";
        echo "<th> Edit </th>";
        echo "<th> Delete </th>";
         echo "</tr>";
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
       
       
        
        echo "<tr>";
            echo "<td>" . $row['Book_title'] . "</td>";
            echo "<td>" . $row['User_ID'] . "</td>";
            echo "<td>" . $row['User_Name'] . "</td>";
            echo "<td>" . $row['User_Email'] . "</td>";
            echo "<td>  <a href='Edit.php'>Edit </a></td>";
            echo "<td><a href='Delete.php'>Delete </a></td>";
           echo "</tr>";
       
       
       
       
       
     

                          
        
   }
   
   
   mysql_close($conn);
?>



</body>

</html>

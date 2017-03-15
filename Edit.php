
  
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       
        <title>Edit User Information </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="webStyle.css"> 
       
            
    </head>
    <body >

        
            <div id="top">
                <br/>
                <br/>
                <br/>
                <h2>Drexel Library Website </h2>
            </div>

            <div class="navbar">

                <a href="index.html">Home</a>
                <a href="view.php">Borrowed Book list</a>
                <a href="contact.html">Contact</a>
            <a href="about.html">About</a>

            </div>
            <br/>

       
        <div class="wrap">
            

                <div class="inner-container">

                    <div class="box">

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



                        $User_ID = $_POST["User_ID"];
                        $User_Name = $_POST["User_Name"];
                        $User_Email = $_POST["User_Email"];
                        $Book_title = mysql_real_escape_string($_POST['Book_title']);

                        // $sql = "UPDATE  Users SET User_Name='$User_Name',User_ID='$User_ID',User_Email='$User_Email', Book_title='$Book_title'  WHERE User_ID='$User_ID'";
                        $sql = "UPDATE  Users SET User_Name='$User_Name',User_Email='$User_Email', Book_title='$Book_title'  WHERE User_ID='$User_ID'";


                        if ($conn->query($sql) === TRUE) {



                                       echo "<center> <h2> <br> <br>Record with the ID " . $User_ID . " has been edited successfully </h2></center>";

                        } else {
                            echo "Error updating record: " . $conn->error;
                        }

                        $conn->close();
                        ?>

                    </div>
                </div>
            </div>
        

    </body>
</html>

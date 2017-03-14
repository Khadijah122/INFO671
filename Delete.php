<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

    <head>

        <title>View Records</title>
        <link rel="stylesheet" type="text/css" href="webStyle.css">    
    </head>

    <body>
        <div id="container"> 
            <div id="top">
                <br/>
                <br/>
                <br/>
                <h2>Drexel Library Website </h2>
            </div>

            <div class="navbar">

                <a href="home.html">Home</a>
                <a href="view.php">Borrowed Book list</a>
                <a href="#contact">Contact</a>
                <a href="#about">About</a>

            </div>
            <br/>

        </div> 
        <div class="wrap">


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

            $User_ID = $_GET['User_ID'];



            $sql = "DELETE FROM Users WHERE User_ID=$User_ID";
            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully";
                echo $User_ID;
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
            ?>

        </div>
    </body>
</html>

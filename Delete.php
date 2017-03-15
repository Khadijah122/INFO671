<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

   <head>
      
        <title>Delete User Information </title>

        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="webStyle.css"> 
       
            
    </head>
    <body>

        
            <div id="top">
                <br/>
                <br/>
                <br/>
                <h2>Drexel Library Website </h2>
            </div>

            <div class="navbar">

                <a href="home.html">Home</a>
                <a href="view.php">Borrowed Book list</a>
                <a href="contact.html">Contact</a>
             <a href="about.html">About</a>

            </div>
           

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

            $User_ID = $_GET['User_ID'];



            $sql = "DELETE FROM Users WHERE User_ID=$User_ID";
            if ($conn->query($sql) === TRUE) {
            echo "<center> <h2> <br> <br>Record with the ID " . $User_ID . " has been deleted successfully </h2></center>";
                
               
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
            ?>
 </div>
                     </div>
        </div>
    </body>
</html>

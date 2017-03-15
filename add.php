
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
            $User_ID = $_POST["userID"];
            $User_Name = $_POST["userName"];
            $User_Email = $_POST["userEmail"];
            $Book_title = mysql_real_escape_string($_POST['title']);

            
            
            $sql = "INSERT INTO Users (User_ID, User_Name, User_Email,Book_title)
VALUES ('$User_ID', '$User_Name', '$User_Email','$Book_title')"
            
          ;
          
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
            ?>
         </div>
    </body>
</html>

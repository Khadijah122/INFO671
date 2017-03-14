<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>
        <title>Library Home Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

                <a href="index.html">Home</a>
                <a href="view.php">Borrowed Book list</a>
                <a href="#contact">Contact</a>
                <a href="#about">About</a>

            </div>
            <br/>

        </div> 







        <script>
            function ValidateForm() {
                var hasError = false;
                if (document.getElementById('lname').value === "") {
                    document.getElementById('wronglname').style.display = "inline";
                    hasError = true;
                } else {
                    document.getElementById('wrongname').style.display = "none";
                }
                if (document.getElementById('id').value.search(/^[0-9]+$/)) {
                    document.getElementById('wrongid').style.display = "inline";
                    hasError = true;
                } else {
                    document.getElementById('wrongid').style.display = "none";
                }
                if (document.getElementById('email').value.search(/^[a-zA-Z]+([_\.-]?[a-zA-Z0-9]+)*@[a-zA-Z0-9]+([\.-]?[a-zA-Z0-9]+)*(\.[a-zA-Z]{2,4})+$/) === -1) {
                    document.getElementById('wrongemail').style.display = "inline";
                    hasError = true;
                } else {
                    document.getElementById('wrongemail').style.display = "none";
                }
                return !hasError;
            }
            document.getElementById('test').onsubmit = ValidateForm;
        </script>

        <div class="wrap">
            <h2>Please enter the student details here:</h2> 
            <?php
            $User_ID = $_GET['User_ID'];
echo $User_ID;

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
            
            $sql = "SELECT * FROM Users WHERE User_ID='$User_ID'";
           $stmt = $conn->prepare($sql);
//$stmt->bind_param("s", $editID);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

 echo  $row['Book_title'] ;
                echo $row['User_ID'] ;
                echo $row['User_Name'] ;
                echo $row['User_Email'] ;

                       
            ?>

            <form id='test' action = "Edit.php" method = "post">
                
                Book Title: 
                <input type  ="text" name="Book_title" value="<?php echo $row['Book_title'] ?>"><br/><br/>
                User_ID: 
                <input name= "User_ID"  type="text" value="<?php echo $row['User_ID'] ?>"><span id="wronglname" class="error">*This is a required field</span> <br/><br/>
                User_Name:
                <input name= "User_Name"  type="text" size="12" value="<?php echo $row['User_Name'] ?>"><span id="wrongid" class="error">*This is a required field</span> <br/><br/>
                Email :
                <input name= "User_Email"  type="text" value="<?php echo $row['User_Email'] ?>"><span id="wrongemail" class="error">* Wrong Email Address</span> <br/><br/>

                <div>
                    <input type="submit" value="Submit">
                </div>
            </form>

            <div><button type="button" onclick="index.html">Previous</button>
                <button type="button" onclick="alert('code target here')">Next</button></div>
        </div>

    </body>
</html>

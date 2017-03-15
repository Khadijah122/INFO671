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
                <a href="contact.html">Contact</a>
            <a href="about.html">About</a>

            </div>
            <br/>

        </div> 







        <script>
           
            function ValidateForm() {

                var hasError = false;
                //.search(/^[a-zA-Z]+$/)
                if (document.getElementById('lname').value === "") {
                    document.getElementById('wronglname').style.display = "inline";
                    hasError = true;
                } else {
                    document.getElementById('wronglname').style.display = "none";
                }

                if (document.getElementById('id').value.search(/^[0-9]+$/)=== -1) {
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
            document.getElementById('test').onsubmit = "return ValidateForm()";
        
        </script>

        <div class="wrap">
             <div class="inner-container">

                    <div class="box">

            <h2>Please enter the student details here:</h2> 
          

            <form id='test' action = "edit.php" method = "post" onSubmit="return ValidateForm()">
               
           <?php $User_ID = $_GET['User_ID'];
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
                  ?> 
                
                
                <h4>  User_ID:
            <?php
            $User_ID = $_GET["User_ID"];
            echo $User_ID;
            ?></h4> <input type  ="hidden" name="User_ID" value="<?php echo $_GET['User_ID'] ?>"> 
               
                Book Title: 
                &nbsp;&nbsp; <input type  ="text" name="Book_title" value="<?php echo $row['Book_title'] ?>"><br/><br/>

                User Name:
                <input name= "User_Name"  type="text" size="12" value="<?php echo $row['User_Name'] ?>"><span id="wrongid" class="error">*This is a required field</span> <br/><br/>
                User Email:
            &nbsp;<input name= "User_Email"  type="text" value="<?php echo $row['User_Email'] ?>"><span id="wrongemail" class="error">* Wrong Email Address</span> <br/><br/>

                
                
                    <input type="submit" value="Next">
                
                
            </form>

           
        </div>
             </div>
            </div>
   

    </body>
</html>

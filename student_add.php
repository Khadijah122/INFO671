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

                <a href="home.html">Home</a>
                <a href="view.php">Borrowed Book list</a>
                <a href="#contact">Contact</a>
                <a href="#about">About</a>

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
            <h2>Please enter the student details here:</h2> 
            Book Title:
            <?php
            $title = $_GET["title"];

            echo $title;
            ?>

            <form id='test' action = "add.php" method = "post" onSubmit="return ValidateForm()">
                <input type  ="hidden" name="title" value="<?php echo $_GET['title'] ?>">
                Full_Name *
                <input name= "userName" id="lname" type="text"><span id="wronglname" class="error">*This is a required field</span> <br/><br/>
                Student_ID *
                <input name= "userID" id="id" type="text" size="12"><span id="wrongid" class="error">*This is a required field</span> <br/><br/>
                Email_ID *
                <input name= "userEmail" id="email" type="text"><span id="wrongemail" class="error">* Wrong Email Address</span> <br/><br/>

                <div>
                    <input type="submit" value="Submit">
                </div>
            </form>

            <div><button type="button" onclick="home.html">Previous</button>
                <button type="button" onclick="alert('code target here')">Next</button></div>
        </div>

    </body>
</html>

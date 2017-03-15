
  
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" type="text/css" href="webStyle.css"> 
        <style>
            body{
                padding:0;
                margin:0;
            }
            .vid-container{
                position:relative;
                height:100vh;
                overflow:hidden;
            }
            .bgvid{
                position:absolute;
                left:0;
                top:0;
                width:100vw;
            }
            .inner-container{
                width:400px;
                height:400px;
                position:absolute;
                top:calc(50vh - 200px);
                left:calc(50vw - 200px);
                overflow:hidden;
            }
            .bgvid.inner{
                top:calc(-50vh + 200px);
                left:calc(-50vw + 200px);
                filter: url("data:image/svg+xml;utf9,<svg%20version='1.1'%20xmlns='http://www.w3.org/2000/svg'><filter%20id='blur'><feGaussianBlur%20stdDeviation='10'%20/></filter></svg>#blur");
                -webkit-filter:blur(10px);
                -ms-filter: blur(10px);
                -o-filter: blur(10px);
                filter:blur(10px);
            }
            .box{
                position:absolute;
                height:100%;
                width:100%;
                font-family:Helvetica;
                color:#fff;
                background:rgba(0,0,0,0.13);
                padding:30px 0px;
            }
            .box h2{
                text-align:center;
                margin:30px 0;
                font-size:30px;
            }
            .box input{
                display:block;
                width:300px;
                margin:20px auto;
                padding:15px;
                background:rgba(0,0,0,0.2);
                color:#fff;
                border:0;
            }
            .box input:focus,.box input:active,.box button:focus,.box button:active{
                outline:none;
            }
            .box button{
                background:#2ecc71;
                border:0;
                color:#fff;
                padding:10px;
                font-size:20px;
                width:330px;
                margin:20px auto;
                display:block;
                cursor:pointer;
            }
            .box button:active{
                background:#27ae60;
            }
            .box p{
                font-size:14px;
                text-align:center;
            }
            .box p span{
                cursor:pointer;
                color:#666;
            }
        </style>
    </head>
    <body  background=86132.jpg>

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
        <div class="wrap">
            <div class="vid-container">

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



                            echo "<center> <h2> <br> <br>Record updated successfully </h2></center>";
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }

                        $conn->close();
                        ?>

                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

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

        <div class="wrap">     


            <?php
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';

            $conn = mysql_connect($dbhost, $dbuser, $dbpass);

            if (!$conn) {
                die('Could not connect: ' . mysql_error());
            }



            $sql = "Select * From Users ";
            mysql_select_db('User_info');
            $retval = mysql_query($sql, $conn);

            if (!$retval) {
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
            while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {

                echo "<tr>";
                echo "<td>" . $row['Book_title'] . "</td>";
                echo "<td>" . $row['User_ID'] . "</td>";
                echo "<td>" . $row['User_Name'] . "</td>";
                echo "<td>" . $row['User_Email'] . "</td>";
                echo "<td>" . "<a href=student_add.php?User_ID=" . $row['User_ID'] . "> Edit </a></td>";



                echo "<td>" . "<a href=Delete.php?User_ID=" . $row['User_ID'] . "> Delete </a></td>";

                echo "</tr>";
            }


            mysql_close($conn);
            ?>

        </div>
    </body>

</html>

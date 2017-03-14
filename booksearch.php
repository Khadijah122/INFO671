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
            <p>List of books available in the library:</p> 

            <?php
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $age = $_POST["age"];
            $query = array(
                "api-key" => "dbf288a288f0459c98de7bcd6e07f7bf",
                "age-group" => "$age"
            );
            curl_setopt($curl, CURLOPT_URL, "http://api.nytimes.com/svc/books/v3/lists/best-sellers/history.json" . "?" . http_build_query($query)
            );
            $result = json_decode(curl_exec($curl));
            //echo json_encode($result);
            $books = $result->results;
            echo "<table>";
            echo "<h2> Total number of books are:" . $result->num_results . "</h2>";
            echo "<tr>";
            echo "<th>Title</th>";
            echo "<th>Author</th>";
            echo "<th>Add Book</th>";
            echo "</tr>";

            foreach ($books as $book) {
                echo "<tr>";
                echo "<td>" . $book->title . "</td>";
                echo "<td>" . $book->author . "</td>";


                echo "<td>" . "<a href=student_add.php?title=" . urlencode($book->title) . "> Add this book</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
    </body>
</html>

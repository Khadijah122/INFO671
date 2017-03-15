<html>
    <head>
        <title>Book Search</title>
        <meta charset="UTF-8">
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
        <br/>
        <div class="wrap">
            <div class="table-inner-container">

                <div class="box">

                    <p>List of books available in the library:</p> 

                    <?php
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    /* whb I have created a variables that store the age input that the user enterd */


                    $age = $_POST ['Age'];
                    $query = array(
                        "api-key" => "646064ed6e0a4f67b6dd6b2a8007abf0",
                        "age-group" => $age
                    );
                    curl_setopt($curl, CURLOPT_URL, "http://api.nytimes.com/svc/books/v3/lists/best-sellers/history.json" . "?" . http_build_query($query)
                    );
                    $result = json_decode(curl_exec($curl));


                    $books = $result->results;
                    echo "<table>";
                    echo "<h2> Total Number of Books are:" . $result->num_results . "</h2>";
                    echo "<tr>";
                    echo "<th> Number </th>";
                    echo "<th>Title</th>";
                    echo "<th>Author</th>";
                    echo "<th>Add Book</th>";
                    echo "</tr>";
                    $count = 1;
                    foreach ($books as $book) {
                        echo "<tr>";
                        echo "<td>" . $count . "</td>";
                        echo "<td>" . $book->title . "</td>";
                        echo "<td>" . $book->author . "</td>";
                        echo "<td>" . "<a href=student_add.php?title=" . urlencode($book->title) . "> Add this book</a></td>";
                        echo "</tr>";
                        $count++;
                    }
                    echo "</table>";
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>

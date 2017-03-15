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
            <a href="#contact">Contact</a>
            <a href="#about">About</a>

        </div>
        <br/>
        <div class="wrap">
            <div class="book-table-inner-container ">
                <div class="box">
                    <p>List of books available in the library:</p> 

                    <?php
                    // Built by LucyBot. www.lucybot.com
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    $title = $_POST["title"];
                    $query = array(
                        "api-key" => "63ffe4d7d41c40649a2742c747a3c668",
                        "title" => "$title"
                    );
                    curl_setopt($curl, CURLOPT_URL, "https://api.nytimes.com/svc/books/v3/lists/best-sellers/history.json" . "?" . http_build_query($query)
                    );
                    $result = json_decode(curl_exec($curl));


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
            </div>
        </div>
    </body>
</html>

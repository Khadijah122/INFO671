<html>
    <body>
        <style>
            body {
                background-color:pink;
            }
            p {
                font-size: 20px; 
                font-family: cursive;
            }
            table{
                font-family:cursive;            
                width: 95%;
            }
            td{
                border: 1px blue;
                text-align: left;
                padding:  5px;
            }
            th{
                height: 100px;
                background-color:blueviolet;
                font-family:cursive;
            }
            tr:hover{background-color:violet}
        </style>
        <div>
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
            curl_setopt($curl, CURLOPT_URL, "https://api.nytimes.com/svc/books/v3/lists/best-sellers/history.json" . "?" . http_build_query($query)
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
            echo "<td>" . "<a href='booksearch.php#$Book_title = $book->title'> Add this book</a>". "</td>";
            $bookname = $_GET['book'];
            echo "</tr>";
            }
            echo "</table>";
            
            
            function(){
            $Book_title = $book->title;
            include('add.php');
            }
            ?>
        </div>
    </body>
</html>




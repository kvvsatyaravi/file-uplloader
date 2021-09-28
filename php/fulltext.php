
<html>
    <title>Uploaded text</title>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<body>
    <div class="container">
    <center><h3>Text content</h3></center>
    <div class="row-2 ">
    <center><table class="table table-bordered border-primary table-hover" border="1">
        <tr>
        <th>Text</th>
        </tr>
        
        <?php
        include '../db/auth.php';
        $dat=$_SERVER['REQUEST_URI'];

        $number = str_replace(['+', '-'], '', filter_var($dat, FILTER_SANITIZE_NUMBER_INT));
        echo '<tr>';
        $query = "SELECT * FROM textuploader WHERE sno='$number'";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc())
        {

        echo "<tr>";
        echo "<td>" . $row['text'] . "</td>";
        echo "</tr>";

        }

        echo "</table></center>";
        
    }
    else{
        echo "0 results";
    }
        
    $con->close();
        ?>

    </div>
    </div>
</body>
</html>
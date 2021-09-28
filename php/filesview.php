<html>
    <title>Uploaded files</title>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<body>
    <div class="container">
    <center><h3>Files uploaded</h3></center>
    <div class="row-2 ">
    <center><table class="table table-bordered border-primary table-hover" border="1">
        <tr>
        <th>Sno</th>
        <th>File name</th>
        <th>Type</th>
        <th>Size</th>
        <th>Date & Time</th>
        <th>Button</th>
        </tr>
        
        <?php
        include '../db/auth.php';
        echo '<tr>';
        $query = "SELECT * FROM filesupload";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc())
        {

        echo "<tr>";

        echo "<td>" . $row['sno'] . "</td>";

        echo "<td>" . $row['filename'] . "</td>";

        echo "<td>" . $row['type'] . "</td>";

        echo "<td>" . $row['size'] . "</td>";

        echo "<td>" . $row['date'] . "</td>";
        echo "<td>
        <a href=../files/". $row['filename'] ."  class='btn btn-danger '>Click here
          <i class='fas fa-times'></i>
        </a>
        </td>";

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
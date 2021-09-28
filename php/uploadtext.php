
<?php
include '../db/auth.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $title = mysqli_real_escape_string($con,$_POST['title']);
  $data = mysqli_real_escape_string($con,$_POST['data']);

  if ($title and $data) {
    echo "text title:".$title."<br>";
    echo "text data:".$data."<br>";
    $insert = "INSERT INTO textuploader(title,text) VALUES ('$title','$data')";
    if(mysqli_query($con, $insert)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
    }
     
    // Close connection
    mysqli_close($con);
    
  } else {
    echo "something went wrong";
  }
}
?>
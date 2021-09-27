<?php   
include 'db/auth.php';
   if(isset($_FILES['file'])){
      $errors= array();
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $file_type = substr($file_type, strpos($file_type, "/") + 1);
      echo "file extension is these ".$file_type."<br>";
      echo "file name is".$file_name."<br>file size is".formatSizeUnits($file_size)."<br>file path".getcwd();
      $file_size = formatSizeUnits($file_size);
      $extensions= array("jpeg","jpg","png","pdf","zip");
      
      if(in_array($file_type,$extensions)=== false){
         $errors[]="extension not allowed, please choose a jpef,png,pdf,jpg file.";
      }
      
      if($file_size > 10485760){
         $errors[]='File size must be lower than 10 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"files/".$file_name);
         $file_path = "files/";
         $file_path = getcwd($file_path);
         $insert = "INSERT INTO filesupload(filename,filepath,type,size) VALUES ('$file_name','$file_path','$file_type','$file_size')";
         if(mysqli_query($con, $insert)){
            echo "Records inserted successfully.";
            echo "Success";
        } else{
            echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
        }
        // Close connection
        mysqli_close($con);
        
      }else{
         print_r($errors);
      }
   }

   function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}
?>
<?php   
   if(isset($_FILES['file'])){
      $errors= array();
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $file_type = substr($file_type, strpos($file_type, "/") + 1);
      echo "file extension is these ".$file_type."<br>";
      
      $extensions= array("jpeg","jpg","png","pdf","zip");
      
      if(in_array($file_type,$extensions)=== false){
         $errors[]="extension not allowed, please choose a jpef,png,pdf,jpg file.";
      }
      
      if($file_size > 10485760){
         $errors[]='File size must be lower than 10 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"files/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
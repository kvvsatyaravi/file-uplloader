<?php    
$upload = 'err'; 
if(!empty($_FILES['file'])){ 
     
    // File upload configuration 
    $targetDir = "files/"; 
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
     
    $fileName = basename($_FILES['file']['name']); 
    $targetFilePath = $targetDir.$fileName; 
    $fileSize = $_FILES['file']['size'];
      if ($fileSize < 10000000) {
        $errors[] = "File should be lesser than 10 mb";
      }
    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
    if(in_array($fileType, $allowTypes)){ 
        // Upload file to the server 
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){ 
            $upload = 'file uploaded sucessfully'; 
        } 
    } 
} 
echo $upload;
    

?>
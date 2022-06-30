<?php
if (isset($_POST['submitBtn']) && $_POST['submitBtn'] == 'Upload Files')
{
  if (isset($_FILES['FileSelection_1']) && $_FILES['FileSelection_1']['error'] === UPLOAD_ERR_OK)
  {
    // uploaded file details
    $fileTmpPath = $_FILES['FileSelection_1']['tmp_name'];
    $fileName = $_FILES['FileSelection_1']['name'];
    $fileSize = $_FILES['FileSelection_1']['size'];
    $fileType = $_FILES['FileSelection_1']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    // removing extra spaces
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
   
    echo "Files selected - ";
    echo $newFileName;

    // file extensions allowed
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc', 'odt', 'pdf');

    // Check file size (5MB)
    if ($_FILES["FileSelection_1"]["size"] > 5000000) {
      $message = "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    if (!in_array($fileExtension, $allowedfileExtensions)) 
    {
      $message .= ' Upload failed as the file type is not acceptable. The allowed file types are:' . implode(',', $allowedfileExtensions);
      $uploadOk = 0;
    }
    if ($uploadOk == 1)
    {
      // directory where file will be moved
      $uploadFileDir = '/home/datauuv/uploads/';
      $dest_path = $uploadFileDir . $newFileName;
      echo $dest_path;
      if(move_uploaded_file($fileTmpPath, $dest_path))
      {
        $message = 'File uploaded successfully.';
      }
      else
      {
        $message = 'An error occurred while uploading the file to the destination directory. Ensure that the web server has access to write in the path directory.';
      }
    }
  }
  else
  {
    $message = 'Error occurred while uploading the file.<br>';
    $message .= 'Error:' . $_FILES['FileSelection_1']['error'];
  }
  echo $message;
}
  $_SESSION['message'] = $message;
  //header("Location: index.php");
<?php 
// Upload all the selected files
// write a JSON file with the structured data
// 
// before uploading do some sanity checking
// Only write the JSON file when ALL uploads succeeded
$errors = [];
$maxsize = 5 * 1024 * 1024; // 5 MB as maxsize per file
$path = '/home/datauuv/uploads/';
//echo '---';
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Only respond to 'POST' actions.
    $extensions = ['doc', 'docx', 'odt', 'rtf', 'pdf', 'txt'];
    echo '---';
    
    $waka = $_POST['Panui'];
    // actual upload of files
    // $file_name = $_FILES['Panui']['name']; 
    // $file_tmp  = $_FILES['Panui']['tmp_name']; 
    // $file_type = $_FILES['Panui']['type'];
    // $file_size = $_FILES['Panui']['size'];
    $file_name = $waka['name'];
    $file_tmp = $waka['tmp_name'];
    $file_type = $waka['type'];
    $file_size = $waka['size'];

    $fileNameCmps = explode(".", $file_name);
    $file_ext = strtolower(end($fileNameCmps));

    // $file = $path . $file_name;
    $newFileName = $file_name . '-' . time() . '.' . $fileExtension; // keep the files in understandable names
    if (!in_array($file_ext, $extensions)) {
        $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
    }

    if ($file_size > $maxsize) {
        $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type . ' - max size allowed = ' . $maxsize;
    }
    $newFileName = $path . $newFileName;

    // if (empty($errors)) {
      move_uploaded_file($file_tmp, $newFileName);
      $files .= 'Panui file: ' . $newFileName; 
    // }

    print_r($_FILES);

    // ---------------------------------------------
    // Write out the JSON object
    //
    $jsoncontent = $_POST['JSON'];
    $jsonfile = $path . $_POST['jsonfile']; //'json/test.json'; // Set the json-file, base this on the aplicant-name?
    file_put_contents($jsonfile, $jsoncontent); // write the json contents

}
;?>

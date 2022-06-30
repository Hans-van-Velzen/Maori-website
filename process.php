<?php 
$errors = [];
$maxsize = 5 * 1024 * 1024; // 5 MB
echo '---';
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $path = '/home/datauuv/uploads/';
    $extensions = ['doc', 'docx', 'odt', 'rtf', 'pdf', 'txt'];
    echo '---';
    // actual upload of files
    $file_name = $_FILES['Panui']['name']; 
    $file_tmp  = $_FILES['Panui']['tmp_name']; 
    $file_type = $_FILES['Panui']['type'];
    $file_size = $_FILES['Panui']['size'];

    $fileNameCmps = explode(".", $file_name);
    $file_ext = strtolower(end($fileNameCmps));

    $file = $path . $file_name;
    $newFileName = $file_name . '-' . time() . '.' . $fileExtension; // keep the files in understandable names
    if (!in_array($file_ext, $extensions)) {
        $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
    }

    if ($file_size > $maxsize) {
        $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type . ' - max size allowed = ' . $maxsize;
    }
    $newFileName = $path . $newFileName;

    if (empty($errors)) {
      move_uploaded_file($file_tmp, $newFileName);
      $files .= 'Panui file: ' . $newFileName; 
    }

    print_r($_FILES);

// }
;?>

<?php
// Upload all the selected files
// write a JSON file with the structured data
//
// TODO
// before uploading do some sanity checking
// Only write the JSON file when ALL uploads succeeded
$errors = [];
$maxsize = 5 * 1024 * 1024; // 5 MB as maxsize per file
$path = '/home/datauuv/uploads/';
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Only respond to 'POST' actions.
    $extensions = ['doc', 'docx', 'odt', 'rtf', 'pdf', 'txt'];

    $all_files = count($_FILES['files']['tmp_name']);

    // // actual upload of files
    for ($i=0; $i < $all_files; $i++) {
        $file_name = $_FILES['files']['name'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        $file_type = $_FILES['files']['type'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $fileNameCmps = explode(".", $file_name);
        $file_ext = strtolower(end($fileNameCmps));

        $newFileName = $path . $file_name . '-' . time() . '.' . $file_ext; // keep the files in understandable names
        if (!in_array($file_ext, $extensions)) {
            $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
        }
        if ($file_size > $maxsize) {
            $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type . ' - max size allowed = ' . $maxsize;
        }
        if (empty($errors)) {
            move_uploaded_file($file_tmp, $newFileName);
        }
    }

    // print_r($_FILES);
    // print_r($_POST);
    if ($errors) print_r($errors);

    // ---------------------------------------------
    // Write out the JSON object

    $jsonfile = $path . $_POST['jsonfile'] . '.json'; // Set the json-file, base this on the aplicant-name?
    $jsonData = substr(serialize($_POST['JSON']), 19); // remove the unneeded prefix
    file_put_contents($jsonfile, json_encode($jsonData)); // write the json contents

}
;?>

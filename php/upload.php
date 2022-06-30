<?php
//session_start();

// $message = '';
// $uploadOk = 1;
echo 'Upload.php started' . "\r\n";
$errors = [];
$maxsize = 5 * 1024 * 1024; // 5 MB
$files = '[';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the files attribute has been populated
    echo '---' . $_FILES['files'];
    if  (isset($_FILES['Panui']) && $_FILES['Panui']['error'] === UPLOAD_ERR_OK
      && isset($_FILES['LandblockInfo']) && $_FILES['LandblockInfo']['error'] === UPLOAD_ERR_OK
    )
    // repeat below trick for ALL files to be uploaded
    {
        $errors = [];
        $path = '/home/datauuv/uploads/';
        $extensions = ['doc', 'docx', 'odt', 'rtf', 'pdf', 'txt'];

        $all_files = count($_FILES['Panui']['tmp_name']);
        for ($i = 0; $i < $all_files; $i++) {
            $file_name = $_FILES['Panui']['name']; 
            $file_tmp  = $_FILES['Panui']['tmp_name']; 
            $file_type = $_FILES['Panui']['type'];
            $file_size = $_FILES['Panui']['size'];

            $fileNameCmps = explode(".", $file_name);
            $file_ext = strtolower(end($fileNameCmps));
        
            $file = $path . $file_name;
            $newFileName = md5(time() . $file_name) . '.' . $fileExtension;
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
        }
        // Do LandblockInfo        
        $file_name = $_FILES['LandblockInfo']['name']; 
        $file_tmp  = $_FILES['LandblockInfo']['tmp_name']; 
        $file_type = $_FILES['LandblockInfo']['type'];
        $file_size = $_FILES['LandblockInfo']['size'];

        $fileNameCmps = explode(".", $file_name);
        $file_ext = strtolower(end($fileNameCmps));

        $file = $path . $file_name;
        $newFileName = md5(time() . $file_name) . '.' . $fileExtension;

        if (!in_array($file_ext, $extensions)) {
            $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
        }

        if ($file_size > $maxsize) {
            $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type . ' - max size allowed = ' . $maxsize;
        }
        $newFileName = $path . $newFileName;

        if (empty($errors)) {
        //   echo 'Moving now ' . $file_name . ' - ' . $newFileName;
            move_uploaded_file($file_tmp, $newFileName);
            $files .= 'LandblockInfo file: ' . $newFileName; 
        }

        // Do MeetingMinutes        
        $file_name = $_FILES['MeetingMinutes']['name']; 
        $file_tmp  = $_FILES['MeetingMinutes']['tmp_name']; 
        $file_type = $_FILES['MeetingMinutes']['type'];
        $file_size = $_FILES['MeetingMinutes']['size'];

        $fileNameCmps = explode(".", $file_name);
        $file_ext = strtolower(end($fileNameCmps));

        $file = $path . $file_name;
        $newFileName = md5(time() . $file_name) . '.' . $fileExtension;
        if (!in_array($file_ext, $extensions)) {
            $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
        }

        if ($file_size > $maxsize) {
            $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type . ' - max size allowed = ' . $maxsize;
        }
        $newFileName = $path . $newFileName;

        if (empty($errors)) {
        //   echo 'Moving now ' . $file_name . ' - ' . $newFileName;
            move_uploaded_file($file_tmp, $newFileName);
            $files .= 'MeetingMinutes file: ' . $newFileName; 
        }

        // Do ElectManagementCommittee        
        $file_name = $_FILES['ElectManagementCommittee']['name']; 
        $file_tmp  = $_FILES['ElectManagementCommittee']['tmp_name']; 
        $file_type = $_FILES['ElectManagementCommittee']['type'];
        $file_size = $_FILES['ElectManagementCommittee']['size'];

        $fileNameCmps = explode(".", $file_name);
        $file_ext = strtolower(end($fileNameCmps));

        $file = $path . $file_name;
        $newFileName = md5(time() . $file_name) . '.' . $fileExtension;
        if (!in_array($file_ext, $extensions)) {
            $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
        }

        if ($file_size > $maxsize) {
            $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type . ' - max size allowed = ' . $maxsize;
        }
        $newFileName = $path . $newFileName;

        if (empty($errors)) {
        //   echo 'Moving now ' . $file_name . ' - ' . $newFileName;
        
            move_uploaded_file($file_tmp, $newFileName);
            $files .= 'ElectManagementCommittee file: ' . $newFileName; 
        }

        // Do JOP        
        $file_name = $_FILES['JOP']['name']; 
        $file_tmp  = $_FILES['JOP']['tmp_name']; 
        $file_type = $_FILES['JOP']['type'];
        $file_size = $_FILES['JOP']['size'];

        $fileNameCmps = explode(".", $file_name);
        $file_ext = strtolower(end($fileNameCmps));

        $file = $path . $file_name;
        $newFileName = md5(time() . $file_name) . '.' . $fileExtension;
        if (!in_array($file_ext, $extensions)) {
            $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
        }

        if ($file_size > $maxsize) {
            $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type . ' - max size allowed = ' . $maxsize;
        }
        $newFileName = $path . $newFileName;

        if (empty($errors)) {
        //   echo 'Moving now ' . $file_name . ' - ' . $newFileName;
            move_uploaded_file($file_tmp, $newFileName);
            $files .= 'JusticeOfPeace file: ' . $newFileName; 
        }

        // Do MaoriIncRegisteredAddress        
        $file_name = $_FILES['MaoriIncRegisteredAddress']['name']; 
        $file_tmp  = $_FILES['MaoriIncRegisteredAddress']['tmp_name']; 
        $file_type = $_FILES['MaoriIncRegisteredAddress']['type'];
        $file_size = $_FILES['MaoriIncRegisteredAddress']['size'];

        $fileNameCmps = explode(".", $file_name);
        $file_ext = strtolower(end($fileNameCmps));

        $file = $path . $file_name;
        $newFileName = md5(time() . $file_name) . '.' . $fileExtension;
        if (!in_array($file_ext, $extensions)) {
            $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
        }

        if ($file_size > $maxsize) {
            $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type . ' - max size allowed = ' . $maxsize;
        }
        $newFileName = $path . $newFileName;

        if (empty($errors)) {
        //   echo 'Moving now ' . $file_name . ' - ' . $newFileName;
            move_uploaded_file($file_tmp, $newFileName);
            $files .= 'MaoriIncRegisteredAddress file: ' . $newFileName; 
        }

        // Do Affidavit        
        $file_name = $_FILES['Affidavit']['name']; 
        $file_tmp  = $_FILES['Affidavit']['tmp_name']; 
        $file_type = $_FILES['Affidavit']['type'];
        $file_size = $_FILES['Affidavit']['size'];
        
        $fileNameCmps = explode(".", $file_name);
        $file_ext = strtolower(end($fileNameCmps));
        
        $file = $path . $file_name;
        $newFileName = md5(time() . $file_name) . '.' . $fileExtension;
        if (!in_array($file_ext, $extensions)) {
            $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
        }

        if ($file_size > $maxsize) {
            $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type . ' - max size allowed = ' . $maxsize;
        }
        $newFileName = $path . $newFileName;

        if (empty($errors)) {
        //   echo 'Moving now ' . $file_name . ' - ' . $newFileName;
            move_uploaded_file($file_tmp, $newFileName);
            $files .= 'Affidavit file: ' . $newFileName; 
        }
    }
    if ($errors) {
        print_r($errors);
        }
    else {
        echo 'No files found???';
        }
    
    
}
?>
<?php
  $ds = DIRECTORY_SEPARATOR;
  $FOLDER_LIMIT = 65000;

  $uploadFolder = 'uploads';
  $subFolder = '000001';
  $currentFolder = $uploadFolder . $ds . $subFolder;

  if (!empty($_FILES)) {
    
    $tempFile = $_FILES['file']['tmp_name'];      
      
    $targetPath = '..' . $ds . $currentFolder . $ds;
      
    $targetFile =  $targetPath . time() . '_' . uniqid($more_entropy = true) . '_' . $_FILES['file']['name'];

    move_uploaded_file($tempFile, $targetFile);
  }

  print_r($_POST);
?>
<?php
  $ds = DIRECTORY_SEPARATOR;
  $FOLDER_LIMIT = 65000;

  $uploadFolder = 'uploads';
  $subFolder = '000001';
  $currentFolder = $uploadFolder . $ds . $subFolder;

  if (!empty($_FILES)) {
    
    $tempFile = $_FILES['file']['tmp_name'];      
      
    $targetPath = '..' . $ds . $currentFolder . $ds;
    $newFilename = time() . '_' . uniqid($more_entropy = true) . '_' . $_FILES['file']['name'];
      
    $targetFile =  $targetPath . $newFilename;

    move_uploaded_file($tempFile, $targetFile);
    makeThumbnails($targetPath . $ds . 'thumbnails' . $ds, $targetFile, $newFilename, 250, 200);
  }

  print_r($_POST);


  function makeThumbnails($updir, $img, $id,$MaxWe=100,$MaxHe=150){
    $arr_image_details = getimagesize($img); 
    $width = $arr_image_details[0];
    $height = $arr_image_details[1];

    $percent = 100;
    if($width > $MaxWe) $percent = floor(($MaxWe * 100) / $width);

    if(floor(($height * $percent)/100)>$MaxHe)  
    $percent = (($MaxHe * 100) / $height);

    if($width > $height) {
        $newWidth=$MaxWe;
        $newHeight=round(($height*$percent)/100);
    }else{
        $newWidth=round(($width*$percent)/100);
        $newHeight=$MaxHe;
    }

    if ($arr_image_details[2] == 1) {
        $imgt = "ImageGIF";
        $imgcreatefrom = "ImageCreateFromGIF";
    }
    if ($arr_image_details[2] == 2) {
        $imgt = "ImageJPEG";
        $imgcreatefrom = "ImageCreateFromJPEG";
    }
    if ($arr_image_details[2] == 3) {
        $imgt = "ImagePNG";
        $imgcreatefrom = "ImageCreateFromPNG";
    }

    if ($imgt) {
        $old_image = $imgcreatefrom($img);
        $new_image = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresized($new_image, $old_image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

      $imgt($new_image, substr($updir . "" . $id, 0, -4) . "_t.jpg", 100);
      return;    
    }
  }
?>
<?php

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "mediabank";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  echo "Connected successfully";

  function addNewMedia($path, $year, $type, $uploadDate, $keywords) {
    $stmt = "
      INSERT INTO Media (path, year, type, uploaded, keywords) 
        VALUES ('" . $path . "', '" . $year . "', '" . $type . "', '" . $uploadDate . "', '" . $keywords . "');
      ";

    if ($conn->query($stmt) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $stmt . "<br>" . $conn->error;
    }
  }

?>
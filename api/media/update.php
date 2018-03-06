<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../db.php';

$database = new Database();
$db = $database->getConnection();

function updateOne($db, $values) {
  $query = 'UPDATE Media SET EventID = ?, year = ?, keywords = ? WHERE MediaID = ?';
  $stmt = $db->prepare($query);
  if ($stmt->execute($values) == TRUE) {
    echo json_encode("Updated");
  } else {
    echo json_encode("Failed");
  }
}

updateOne($db, array(
  $_POST['EventID'], 
  (int)$_POST['year'], 
  $_POST['keywords'], 
  $_POST['MediaID']
));
?>
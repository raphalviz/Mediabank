<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../auth.php';
include_once '../db.php';

$database = new Database();
$db = $database->getConnection();

function createOne($db, $values) {
  $query = 'INSERT INTO Events(name, type) VALUES (?, ?)';
  $stmt = $db->prepare($query);
  $stmt->execute($values);

  echo json_encode($db->lastInsertId());
}

if (isAuth() == TRUE) {
  createOne($db, array(
    htmlspecialchars($_POST['name']), 
    htmlspecialchars($_POST['type'])
  ));
} else {
  http_response_code(401);
  echo json_encode('Unauthorized');
}

?>
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../db.php';

$database = new Database();
$db = $database->getConnection();

function findById($db, $id) {
  $query = 'SELECT * FROM Media WHERE MediaID = ?';
  $stmt = $db->prepare($query);
  $stmt->execute([$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  return $result;
}

function findAll($db) {
  $query = 'SELECT * FROM Media LIMIT 30';
  $stmt = $db->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

$result = findAll($db);
echo json_encode($result);

?>
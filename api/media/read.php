<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../db.php';

$database = new Database();
$db = $database->getConnection();

$method = $_GET['method'];

function findById($db, $id) {
  $query = 'SELECT * FROM Media WHERE MediaID = ?';
  $stmt = $db->prepare($query);
  $stmt->execute([$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  echo json_encode($result);
}

function findAll($db) {
  $query = 'SELECT * FROM Media LIMIT 50';
  $stmt = $db->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($result);
}

function searchByKeyword($db, $keywords) {
  $return_array = array();
  $keywords = implode('|', explode(' ', $keywords));

  $query = 'SELECT * FROM Media WHERE keywords REGEXP ?';
  $stmt = $db->prepare($query);
  $stmt->execute([$keywords]);
  
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($result);
}

switch ($method) {
  case 'findbyid':
    findById($db, $_GET['id']);
    break;
  case 'findall':
    findAll($db);
    break;
  case 'keywords':
    searchByKeyword($db, $_GET['keywords']);
    break;
}

?>
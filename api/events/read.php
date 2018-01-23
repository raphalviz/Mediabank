<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../db.php';

$database = new Database();
$db = $database->getConnection();

$method = $_GET['method'];

function findById($db, $id) {
  $query = 'SELECT * FROM Events WHERE EventID = ?';
  $stmt = $db->prepare($query);
  $stmt->execute([$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  echo json_encode($result);
}

function searchByName($db, $name) {
  $return_array = array();

  $query = 'SELECT * FROM Events WHERE name = ?';
  $stmt = $db->prepare($query);
  $stmt->execute([$name]);
  
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($result);
}

switch ($method) {
  case 'findbyid':
    findById($db, $_GET['id']);
    break;
  case 'searchByName':
    searchByName($db, $_GET['name']);
    break;
}

?>
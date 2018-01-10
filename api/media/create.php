<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../db.php';

$database = new Database();
$db = $database->getConnection();

function createOne($db, $values) {
  $query = 'INSERT INTO Media(path, year, type, uploaded, keywords) VALUES (?, ?, ?, ?, ?)';
  $stmt = $db->prepare($query);
  $stmt->execute($values);
}

createOne($db, array('path/ye', '2018', 'image', date('Y-m-d H:i:s'), 'test keywords'))

?>
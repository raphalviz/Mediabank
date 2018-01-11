<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../db.php';

$database = new Database();
$db = $database->getConnection();

function createOne($db, $values) {
  $query = 'INSERT INTO Events(name, type) VALUES (?, ?)';
  $stmt = $db->prepare($query);
  $stmt->execute($values);
}

createOne($db, array($_POST['name'], $_POST['type']));

?>
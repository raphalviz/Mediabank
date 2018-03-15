<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../db.php';

$database = new Database();
$db = $database->getConnection();

$method = $_GET['method'];

function findByMediaID($db, $id) {
  $query = 'SELECT firstname, lastname
            FROM ((Media INNER JOIN Tags ON Media.MediaID = Tags.MediaID) 
            INNER JOIN People ON People.PersonID = Tags.PersonID) 
            WHERE Media.MediaID = ?';
  $stmt = $db->prepare($query);
  $stmt->execute([$id]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  echo json_encode($result);
}

findByMediaID($db, $_GET['mediaid']);
?>
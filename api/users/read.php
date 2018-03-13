<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../db.php';

$database = new Database();
$db = $database->getConnection();

function findByUsername($db, $username) {
  $query = 'SELECT * FROM Users WHERE username = ?';
  $stmt = $db->prepare($query);
  $stmt->execute([$username]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if (password_verify($_POST['password'], $result['password'])) {
    session_start();
    
    $_SESSION['username'] = $result['username'];
    echo json_encode("Login Successful.");
  }
}

findByUsername($db, $_POST['username']);
?>
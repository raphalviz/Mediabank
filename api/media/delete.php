<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../db.php';

$database = new Database();
$db = $database->getConnection();

function deleteOne($db, $values) {
	$query = 'DELETE FROM Media WHERE MediaID = ?';
	$stmt = $db->prepare($query);
	if ($stmt->execute($values) == TRUE) {
		echo json_encode("Success");
	} else {
		echo json_encode("Failed");
	}
}

/* IMPORTANT TODO: authentication */
deleteOne($db, array($_POST['MediaID']));
?>
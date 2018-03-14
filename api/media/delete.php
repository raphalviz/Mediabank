<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../auth.php';
include_once '../db.php';

$database = new Database();
$db = $database->getConnection();

function deleteFile($db, $id) {
	$query = 'SELECT * FROM Media WHERE MediaID = ?';
	$stmt = $db->prepare($query);
	$stmt->execute([$id]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	unlink($_SERVER['DOCUMENT_ROOT'].'/aacc-gallery/'.$result['path']);
}

function deleteOne($db, $values) {
	$query = 'DELETE FROM Media WHERE MediaID = ?';
	$stmt = $db->prepare($query);
	if ($stmt->execute($values) == TRUE) {
		echo json_encode("Success");
	} else {
		echo json_encode("Failed");
	}
}

if (isAuth() == TRUE) {
	deleteFile($db, $_POST['MediaID']);
	deleteOne($db, array($_POST['MediaID']));
} else {
	http_response_code(401);
	echo json_encode('Unauthorized');
}
?>
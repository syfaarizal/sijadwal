<?php
header("Content-Type: application/json");
require_once "db.php";

if (!isset($_GET['id'])) {
    echo json_encode(null);
    exit;
}

$id = intval($_GET['id']);

try {
    $stmt = $pdo->prepare("SELECT * FROM jadwal WHERE id = :id");
    $stmt->execute([":id" => $id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($data);
} catch (PDOException $e) {
    echo json_encode(null);
}
?>
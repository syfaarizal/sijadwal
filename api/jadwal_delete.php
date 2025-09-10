<?php
header("Content-Type: application/json");
require_once "db.php";

if (!isset($_GET['id'])) {
    echo json_encode(["success" => false, "message" => "ID tidak ditemukan"]);
    exit;
}

$id = intval($_GET['id']);

try {
    $stmt = $pdo->prepare("DELETE FROM jadwal WHERE id = :id");
    $stmt->execute([":id" => $id]);

    echo json_encode(["success" => true]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}

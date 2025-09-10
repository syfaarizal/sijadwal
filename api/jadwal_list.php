<?php
header('Content-Type: application/json');
require 'db.php';

try {
    $stmt = $pdo->query("
        SELECT id, course, lecturer, room, class, day, start_time, end_time
        FROM jadwal
        ORDER BY FIELD(day,'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'), start_time
    ");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}

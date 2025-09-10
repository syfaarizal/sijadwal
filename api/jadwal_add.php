<?php
header("Content-Type: application/json");
require_once "db.php";

try {
    // Cek apakah ada data POST
    if (empty($_POST)) {
        echo json_encode(["success" => false, "message" => "No data received"]);
        exit;
    }

    $sql = "INSERT INTO jadwal (course, lecturer, room, class, day, start_time, end_time) 
            VALUES (:course, :lecturer, :room, :class, :day, :start_time, :end_time)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":course" => $_POST["course"],
        ":lecturer" => $_POST["lecturer"],
        ":room" => $_POST["room"],
        ":class" => $_POST["class"],
        ":day" => $_POST["day"],
        ":start_time" => $_POST["start_time"],
        ":end_time" => $_POST["end_time"]
    ]);

    echo json_encode(["success" => true]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}

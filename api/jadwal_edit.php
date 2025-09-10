<?php
header("Content-Type: application/json");
require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
    exit;
}

try {
    $id = $_POST["id"];
    $course = $_POST["course"];
    $lecturer = $_POST["lecturer"];
    $room = $_POST["room"];
    $class = $_POST["class"];
    $day = $_POST["day"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];

    $sql = "UPDATE jadwal 
            SET course=:course, lecturer=:lecturer, room=:room, class=:class, 
                day=:day, start_time=:start_time, end_time=:end_time
            WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":course" => $course,
        ":lecturer" => $lecturer,
        ":room" => $room,
        ":class" => $class,
        ":day" => $day,
        ":start_time" => $start_time,
        ":end_time" => $end_time,
        ":id" => $id
    ]);

    echo json_encode(["success" => true]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}

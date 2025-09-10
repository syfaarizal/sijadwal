<?php
$host = 'localhost';      // host MySQL
$db   = 'db_jadwal';      // nama database yang kita buat
$user = 'root';           // default XAMPP user
$pass = '';               // default password kosong
$port = 3307;             // ubah kalau MySQL pakai port lain, misal 3307

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
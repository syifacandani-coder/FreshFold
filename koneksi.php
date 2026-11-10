<?php
$host = "103.157.26.48";
$user = "KA-IUP";     // Sesuaikan dengan username database Anda
$pass = "KA-IUP";         // Sesuaikan dengan password database Anda
$db   = "KA-IUP";   // Nama database dari file SQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
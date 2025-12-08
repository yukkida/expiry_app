<?php
$dsn = 'mysql:host=localhost;dbname=expiry_app;charset=utf8mb4';
$user = 'root';
$password = '';
try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    exit('DB接続エラー: ' . $e->getMessage());
}
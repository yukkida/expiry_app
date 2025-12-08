<?php
require 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$expire_date = $_POST['expire_date'];

$sql = "UPDATE items SET name = ?, quantity = ?, expire_date = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$name, $quantity, $expire_date, $id]);

header("Location: index.php");
exit;
<?php
require_once 'db.php';

$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
$expire_date = isset($_POST['expire_date']) ? trim($_POST['expire_date']) : '';

$errors = [];

if ($name === '') {
    $errors[] = '商品名を入力してください。';
}
if ($quantity <= 0) {
    $errors[] = '個数は1以上にしてください。';
}
if ($expire_date === '') {
    $errors[] = '期限日を入力してください。';
} else {
    $d = DateTime::createFromFormat('Y-m-d', $expire_date);
    if (!($d && $d->format('Y-m-d') === $expire_date)) {
        $errors[] = '正しい日付を入力してください。';
    }
}

if (count($errors) > 0) {
    foreach ($errors as $e) {
        echo '<p>' . htmlspecialchars($e, ENT_QUOTES) . '</p>';
    }
    echo '<p><a href="add.php">戻る</a></p>';
    exit;
}

//登録
$sql = "INSERT INTO items (name, quantity, expire_date) VALUES (:name, :quantity, :expire_date)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':name' => $name,
    ':quantity' => $quantity,
    ':expire_date' => $expire_date,
]);
header('Location: index.php');
exit;
<?php
require 'db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM items WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$item = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品編集</title>
</head>
<body>

<h2>商品を編集</h2>

<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $item['id'] ?>">

    名前：<input type="text" name="name" value="<?= $item['name'] ?>"><br><br>

    個数：<input type="number" name="quantity" value="<?= $item['quantity'] ?>"><br><br>

    賞味期限：
    <input type="date" name="expire_date" value="<?= $item['expire_date'] ?>"><br><br>

    <button type="submit">更新</button>
</form>

<br>
<!--編集画面にも削除ボタン-->
<a href="delete.php?id=<?= $item['id'] ?>"
    onclick="return confirm('削除しますか？');">
削除
</a>

</body>
</html>
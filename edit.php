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
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="app">

    <h1 class="title">商品を編集</h1>

    <div class="center-box">
        <form action="update.php" method="POST" class="add-form">
            <input type="hidden" name="id" value="<?= $item['id'] ?>">

            <label>
                商品名
                <input type="text" name="name" value="<?= htmlspecialchars($item['name']) ?>" required>
            </label>

            <label>
                個数
                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" required>
            </label>

            <label>
                賞味期限
                <input type="date" name="expire_date" value="<?= $item['expire_date'] ?>" required>
            </label>

            <button type="submit" class="add-btn full-btn">更新</button>
        </form>

        <a href="delete.php?id=<?= $item['id'] ?>"
            class="delete-btn"
            onclick="return confirm('削除しますか？');">
            削除
        </a>
    </div>

</div>

</body>
</html>
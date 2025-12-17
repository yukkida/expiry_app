<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM items ORDER BY expire_date ASC");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>賞味期限アプリ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="app">

    <h2 class="title">登録商品</h2>

    <!-- 一覧（スクロール部分） -->
    <div class="item-list">
        <?php foreach ($items as $item): ?>
            <div class="item-card">
                <a class="edit-btn" href="edit.php?id=<?php echo $item['id']; ?>">編集</a>

                <div class="item-name">
                    <?php echo htmlspecialchars($item['name']); ?>
                    <span class="qty"><?php echo $item['quantity']; ?>個</span>
                </div>

                <div class="expire">
                    賞味期限　<?php echo htmlspecialchars($item['expire_date']); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- 追加ボタン -->
    <div class="add-area">
        <a href="add.php" class="add-btn">商品の追加</a>
    </div>

</div>

</body>
</html>
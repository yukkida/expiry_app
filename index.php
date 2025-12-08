<?php
require_once 'db.php';  // ← これがないと $pdo が定義されない

$stmt = $pdo->query("SELECT * FROM items ORDER BY expire_date ASC");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>賞味期限アプリ</title>
</head>
<body>

<h2>登録されている商品一覧</h2>

<?php foreach ($items as $item): ?>
    <div>
        <strong><?php echo htmlspecialchars($item['name']); ?></strong>
        （<?php echo $item['quantity']; ?>個）
        <br>
        賞味期限：<?php echo htmlspecialchars($item['expire_date']); ?>
        <br>

        <!-- 編集ボタン -->
        <a href="edit.php?id=<?php echo $item['id']; ?>">編集</a>

        <!-- 削除ボタン -->
        <a href="delete.php?id=<?php echo $item['id']; ?>"
            onclick="return confirm('本当に削除しますか？');">
            削除
        </a>
    </div>
    <hr>
<?php endforeach; ?>

<br>
<a href="add.php">商品の追加</a>

</body>
</html>
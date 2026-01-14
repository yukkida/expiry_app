<?php
require_once 'db.php';

/* 並び替え*/
$sort = $_GET['sort'] ?? 'expire';

switch ($sort) {
    case 'created':
        $order = 'id ASC';
        break;
    case 'name':
        $order = 'name COLLATE utf8mb4_unicode_ci ASC';
    break;
    default:
        $order = 'expire_date ASC';
}

$sql = "SELECT * FROM items ORDER BY $order";
$stmt = $pdo->query($sql);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>賞味期限アプリ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="app">

    <h2 class="title">登録商品</h2>

    <div class="sort-area">
    <a href="index.php?sort=expire" class="add-btn sort-btn">期限日順</a>
    <a href="index.php?sort=created" class="add-btn sort-btn">登録順</a>
    <a href="index.php?sort=name" class="add-btn sort-btn">名前順</a>
    </div>

    <div class="item-list">
        <?php foreach ($items as $item): ?>

            <?php
                $today = new DateTime();

                $expire = new DateTime($item['expire_date']);

                $diff = (int)$today->diff($expire)->format('%r%a');

                $class = '';
                if ($diff < 0) {
                    $class = 'expired';
                } elseif ($diff <= 3) {
                    $class = 'soon';
                }
            ?>

            <div class="item-card <?php echo $class; ?>">
                <a class="edit-btn" href="edit.php?id=<?php echo $item['id']; ?>">編集</a>

                <div class="item-name">
                    <?php echo htmlspecialchars($item['name']); ?>
                    <span class="qty"><?php echo $item['quantity']; ?>個</span>
                </div>

                <div class="expire">
                    賞味期限<?php echo htmlspecialchars($item['expire_date']); ?>
                </div>
            </div>

        <?php endforeach; ?>
    </div>

    <div class="add-area">
        <a href="add.php" class="add-btn">商品の追加</a>
    </div>
</div>
</body>
</html>

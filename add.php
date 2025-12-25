<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品の追加</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="app add-page">

    <div class="center-box">

        <h2 class="title">商品の追加</h2>

        <form action="save.php" method="post" class="add-form card">

            <label>
                商品名
                <input type="text" name="name" required maxlength="255" placeholder="例：牛乳">
            </label>

            <label>
                個数
                <input type="number" name="quantity" required min="1" value="1">
            </label>

            <label>
                期限日
                <input type="date" name="expire_date" required>
            </label>

            <div class="add-area">
                <button type="submit" class="add-btn">登録する</button>
                <a href="index.php" class="add-btn">一覧に戻る</a>
            </div>

        </form>

    </div>
</div>

</body>
</html>
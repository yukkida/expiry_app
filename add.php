<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>商品の追加</title>
    <style>
        body { font-family: Arial, sans-serif; max-width:600px; margin:30px auto; padding:0 16px; }
        label { display:block; margin-top:12px; }
        input[type="text"], input[type="number"], input[type="date"] { width:100%; padding:8px; margin-top:6px; box-sizing:border-box; }
        .btns { margin-top:18px; }
        .submit { background:#28a745; color:#fff; border:none; padding:10px 14px; border-radius:6px; cursor:pointer; }
        .back { background:#ccc; color:#000; border:none; padding:10px 14px; border-radius:6px; cursor:pointer; margin-left:8px; }
    </style>
</head>
<body>

<h2>商品の追加</h2>

<form action="save.php" method="post">
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

    <div class="btns">
        <button type="submit" class="submit">登録する</button>
        <a href="index.php"><button type="button" class="back">一覧に戻る</button></a>
    </div>
</form>
</body>
</html>
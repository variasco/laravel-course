<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categories</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include_once "menu.php"; ?>
    <h2>Категории</h2>
    <?php foreach ($categories as $item) : ?>
        <a href="/news/category/<?= $item["id"] ?>"><?= $item["name"] ?></a><br>
    <?php endforeach; ?>
</body>

</html>
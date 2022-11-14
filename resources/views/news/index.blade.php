<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $category["name"] ?? "Новости" ?></title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    @include("menu")
    <h2>Новости <?= $category["name"] ?? "" ?></h2>
    <?php foreach ($news as $item) : ?>
        <a href="<?= route("news.show", $item["id"]) ?>"><?= $item["title"] ?></a><br>
    <?php endforeach; ?>
</body>

</html>
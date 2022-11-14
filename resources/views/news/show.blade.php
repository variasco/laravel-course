<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $news["title"] ?? "Новость не существует" ?></title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    @include("menu")
    <?php if ($news) : ?>
        <h2><?= $news["title"] ?></h2>
        <p><?= $news["short"] ?></p>
        <p><?= $news["description"] ?></p>
    <?php else : ?>
        <p>Новость не существует</p>
    <?php endif; ?>
</body>

</html>
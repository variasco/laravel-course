<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Создать новую новость</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    @include("menu")
    <h2>Создать новую новость</h2>
    <form method="POST" action="/news/create">
        <label for="title">
            <input type="text" name="title" placeholder="Название">
        </label>
        <label for="description">
            <input type="text" name="description" placeholder="Описание">
        </label>
        <label for="short">
            <input type="text" name="short" placeholder="Короткое описание">
        </label>
        <button type="submit">Создать</button>
    </form>
</body>

</html>
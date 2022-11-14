<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вход</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include_once "menu.php"; ?>
    <h2>Вход</h2>
    <form method="POST" action="/login">
        <label for="login">
            <input type="text" name="login" placeholder="Логин">
        </label>
        <label for="pass">
            <input type="password" name="pass" placeholder="Пароль">
        </label>
        <label for="remember">
            <input type="checkbox" name="remember">
            Запомнить меня
        </label>
        <button type="submit">Войти</button>
    </form>
</body>

</html>
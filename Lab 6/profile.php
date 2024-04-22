<?php
    session_start();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сортер</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>
        <nav>
        <?php if (!isset($_SESSION['user'])) { ?>
                <a class="hed-link" href="./registration.php">Регистрация</a>
                <a class="hed-link" href="./index.php">Авторизация</a>
            <?php } ?>
            <?php if (isset($_SESSION['user'])) { ?>
                <a class="hed-link" href="./profile.php">Профиль</a>
            <?php } ?>
            <a class="hed-link" href="./posts.php">Посты</a>
        </nav>
    </header>

    <main>
        <h2>Логин пользователя - <?= $_SESSION['user']['login'] ?></h2>
        <p>Ваше имя: <?= $_SESSION['user']['name'] ?></p>
        <p>Ваш email: <?= $_SESSION['user']['email'] ?></p>
        <a class="link logout" href="./logout.php">Выйти</a>
    </main>

</body>

</html>
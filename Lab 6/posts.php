<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Посты</title>
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
        <section class="nav-post">
            <ul class="nav-post__list">
                <li class="nav-post__item">
                    <a class="nav-link" href="./posts.php">Добавить</a>
                </li>
                <li class="nav-post__item">
                    <a class="nav-link" href="./viewing.php">Смотреть посты</a>
                </li>
            </ul>
        </section>

        <section class="message">
        <form class="message__form" action="add.php" method="post">
            <span>Введите ваш пост</span>
            <textarea name="sms" cols="50" rows="5" class="message__txt" placeholder="Начните писать" required></textarea>
            <button class="message__btn" type="submit">Добавить запись</button>
        </form>
        </section>
    </main>
    <footer>
        <?php
        if (isset($_SESSION['message'])) {
        echo '<p  style="font-size: 2rem;" class="msg"> ' . $_SESSION['message'] . ' </p>';
        unset($_SESSION['message']);
        }
        ?>
    </footer>
</body>

</html>
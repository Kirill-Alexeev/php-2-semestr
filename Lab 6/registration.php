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
        <form class="form" action="signup.php" method="post">
            <label>ФИО:
                <p class="error-message"></p>
                <input class="input" type="text" name="name" placeholder="Введите полное имя" required>
            </label>
            <label>Логин:
                <p class="error-message"></p>
                <input class="input" type="text" name="login" placeholder="Введите логин" required>
            </label>
            <label>Почта:
                <p class="error-message"></p>
                <input class="input" type="email" name="email" placeholder="Введите адрес почты" required>
            </label>
            <label>Пароль:
                <p class="error-message"></p>
                <input class="input" type="password" name="password" placeholder="Введите пароль" required>
            </label>
            <label>Подтвердите пароль:
                <p class="error-message"></p>
                <input class="input" type="password" name="password_confirm" placeholder="Подтвердите пароль" required>
            </label>
            <button type="submit">Зарегистрироваться</button>
            <p>
                Уже есть аккаунт? - <a class="link" href="./index.php">Авторизоваться!</a>
            </p>
            <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                unset($_SESSION['message']);
            }
            ?>
        </form>
    </main>
</body>

</html>
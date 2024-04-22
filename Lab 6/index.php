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
        <section>
            <form action="login.php" method="post">
                <label>Логин
                    <input type="text" name="login" placeholder="Введите свой логин" required>
                </label>
                <label>Пароль
                    <input type="password" name="password" placeholder="Введите пароль" required>
                </label>
                <button type="submit">Войти</button>
                <p>
                    Ещё нет аккаунта? - <a href="./registration.php">Зарегистрироваться!</a>
                </p>
                <?php
                    if (isset($_SESSION['message'])) {
                        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                        unset($_SESSION['message']);
                    }
                ?>
            </form>
        </section>
    </main>

</body>
</html>
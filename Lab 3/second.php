<!doctype html>
<html lang="ru">

<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <main>
        <div class="main__wrapper">
            <textarea class="main__textarea" name="" cols="100" rows="15">
                <?php
                print_r(get_headers('http://localhost/php%202%20semestr/Lab%203/index.html'));
                ?>
            </textarea>
            <a href="index.html" class="main__link">Первая страница</a>
        </div>
    </main>
</body>

</html>
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
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
            <a class="nav-link" href="./viewing.php?channel=all">Смотреть посты</a>
        </li>
      </ul>
    </section>

    <div class="wrapper">
      <section class="post">
        <ul class="post__list">
          <li class="post__item">
              <a class="link" href="./viewing.php?channel=all">Все</a>
          </li>
          <li class="post__item">
              <a class="link" href="?channel=music">Музыка</a>
          </li>
          <li class="post__item">
              <a class="link" href="?channel=cooking">Кулинария</a>
          </li>
          <li class="post__item">
              <a class="link" href="?channel=movie">Кино</a>
          </li>
        </ul>
      </section>
      <section class="news-line">
        <ul class="news-line__list">
          <?php
          require_once 'connect.php';
          $channel = $_GET['channel'] ?? 'all';
          $channel_condition = $channel !== 'all' ? "AND channels.name = '$channel'" : '';
          $sql = "SELECT hashtags.name AS hashtag_name, sms.description AS message, users.login AS sender
                  FROM sms
                  JOIN hashtags ON sms.hashtag_id = hashtags.id
                  JOIN users ON sms.user_id = users.id
                  LEFT JOIN channels ON sms.channel_id = channels.id
                  WHERE sms.save = 0 $channel_condition";
          $result = $connect->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $hashtag_name = $row["hashtag_name"];
              $message = $row["message"];
              $sender = $row["sender"];
              echo "<li class='news-line__item'>";
              echo "<p class='news-line__user' style='color: var(--link-color);'>От: " . $sender . "</p>";
              echo "<p class='news-line__message' style='color: var(--input-border);'>#" . $hashtag_name . "</p>";
              echo "<p class='news-line__hastags'>Сообщение: " . $message . "</p>";
              echo "</li>";
            }
          } else {
            echo "<p style='font-size: 2rem;'>Нет сообщений.</p>";
          }
          ?>
        </ul>
      </section>
    </div>
  </main>
  <footer>
  </footer>
</body>

</html>
<?php
session_start();
require_once 'connect.php';

$userid = $_SESSION['user']['id'];
$text = $_POST["sms"];

preg_match_all('/#\w+/', $text, $matches);
$hashtags = $matches[0];
$channels = ['music', 'cooking', 'movie'];

$text_without_hashtags = preg_replace('/#\w+\s*/', '', $text);

foreach ($hashtags as $hashtag) {
    $hashtag = ltrim($hashtag, '#');
    
    $sql_insert_hashtag = "INSERT INTO hashtags (name) VALUES ('$hashtag')";
    if ($connect->query($sql_insert_hashtag) === FALSE) {
        echo "Error: " . $sql_insert_hashtag . "<br>" . $connect->error;
    }
    
    $hashtag_id = $connect->insert_id;
    
    $channel_id = array_search($hashtag, $channels) !== false ? array_search($hashtag, $channels) + 1 : null;
    
    $sql_insert_sms = "INSERT INTO sms (hashtag_id, channel_id, description, user_id) VALUES ('$hashtag_id', '$channel_id', '$text_without_hashtags', '$userid')";
    if (mysqli_query($connect, $sql_insert_sms)) {
        $_SESSION['message'] = 'Пост успешно добавлен!';
    } else {
        echo "Error: " . $sql_insert_sms . "<br>" . mysqli_error($connect);
    }
}

header('Location: ./posts.php');

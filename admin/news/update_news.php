<?php

require_once '../initiallization.php';


$posts['news_id'] = htmlspecialchars($_POST['news_id'], ENT_QUOTES, 'utf-8');
$posts['product_id'] = htmlspecialchars($_POST['product_id'], ENT_QUOTES, 'utf-8');
$posts['date'] = htmlspecialchars($_POST['date'], ENT_QUOTES, 'utf-8');
$posts['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES, 'utf-8');
$posts['text'] = htmlspecialchars($_POST['text'], ENT_QUOTES, 'utf-8');
$posts['image_path'] = htmlspecialchars($_POST['image_path'], ENT_QUOTES, 'utf-8');
$posts['url'] = htmlspecialchars($_POST['url'], ENT_QUOTES, 'utf-8');
$posts['is_deleted'] = htmlspecialchars($_POST['is_deleted'], ENT_QUOTES, 'utf-8');

$title_limit = 20;
$title_length = strlen($posts['title']);
if($title_limit < $title_length) {
    array_push($errors, '※タイトルは20文字以内で入力してください');
    $_SESSION['flash']['errors'] = $errors;
}

$text_limit = 50;
$text_length = strlen($posts['text']);
if($text_limit < $text_length) {
    array_push($errors, '※本文は50文字以内で入力してください');
    $_SESSION['flash']['errors'] = $errors;
}

if(isset($_SESSION['flash']['errors'])) {
    header("location: edit_news.php?news_id={$posts['news_id']}");
    exit();
}

$update_sql = "UPDATE news SET
                product_id=:product_id,
                date=:date,
                title=:title,
                text=:text,
                image_path=:image_path,
                url=:url,
                is_deleted = :is_deleted
                WHERE news_id = {$posts['news_id']}";

$news_st = $pdo->prepare($update_sql);
$news_st->bindParam(':product_id', $posts['product_id']);
$news_st->bindParam(':date', $posts['date']);
$news_st->bindParam(':title', $posts['title']);
$news_st->bindParam(':text', $posts['text']);
$news_st->bindParam(':image_path', $posts['image_path']);
$news_st->bindParam(':url', $posts['url']);
$news_st->bindParam(':is_deleted', $posts['is_deleted']);
$news_st->execute();

header('location: news_list.php');

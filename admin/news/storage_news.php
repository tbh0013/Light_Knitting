<?php

require_once '../initiallization.php';

if ($_SESSION['admin_login'] === false) {
    header("Location: ./../index.php");
    exit();
}

$posts['product_id'] = htmlspecialchars($_POST['product_id'], ENT_QUOTES, 'utf-8');
$posts['date'] = htmlspecialchars($_POST['date'], ENT_QUOTES, 'utf-8');
$posts['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES, 'utf-8');
$posts['text'] = htmlspecialchars($_POST['text'], ENT_QUOTES, 'utf-8');
$posts['url'] = htmlspecialchars($_POST['url'], ENT_QUOTES, 'utf-8');
$main_file_name = $_FILES['image_path']['name'];
if($main_file_name !== ""){
    if (is_uploaded_file($_FILES["image_path"]["tmp_name"])) {
        $main_file_name = date('YmdHis')."_".$_FILES["image_path"]["name"];

        if (pathinfo($main_file_name, PATHINFO_EXTENSION) == 'jpg' || pathinfo($main_file_name, PATHINFO_EXTENSION) == 'png') {
            $main_file_tmp_name = $_FILES["image_path"]["tmp_name"];
                if (move_uploaded_file($main_file_tmp_name, "../img/" .$main_file_name)) {
                    echo "メイン画像アップロード完了";
                } else {
                    array_push($errors, '※メイン画像をアップロードできませんでした。');
                }
            } else {
                array_push($errors,'※メイン画像のファイル形式はjpg/pngのみです。');
            }
    } else {
        array_push($errors, '※メイン画像の登録ができませんでした。');
    }
}



$title_limit = 20;
$title_length = mb_strlen($posts['title']);
if($title_limit < $title_length) {
    array_push($errors, '※タイトルは20文字以内で入力してください');
}

$text_limit = 100;
$text_length = mb_strlen($posts['text']);
if($text_limit < $text_length) {
    array_push($errors, '※本文は100文字以内で入力してください');
}

if (empty($errors)) {
    $news_st = $pdo->prepare("INSERT INTO news(product_id, date, title, text, image_path, url)VALUES(:product_id, :date, :title, :text, :image_path, :url)");
    $news_st->bindParam(':product_id', $posts['product_id']);
    $news_st->bindParam(':date', $posts['date']);
    $news_st->bindParam(':title', $posts['title']);
    $news_st->bindParam(':text', $posts['text']);
    $news_st->bindParam(':image_path', $main_file_name);
    $news_st->bindParam(':url', $posts['url']);
    $news_st->execute();
    header('location: news_list.php');
    exit();
} else {
    $_SESSION['flash']['errors'] = $errors;
    header('location: create_news.php');
    exit();
}


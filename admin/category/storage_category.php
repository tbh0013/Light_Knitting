<?php

require_once '../initiallization.php';

if ($_SESSION['admin_login'] === false) {
    header("Location: ./../index.php");
    exit();
}

$posts['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8');

$name_limit = 20;
$name_length = mb_strlen($posts['name']);
if($name_limit < $name_length) {
    array_push($errors, '※カテゴリー名は20文字以内で入力してください');
}

if (empty($errors)) {
    $category_st = $pdo->prepare("INSERT INTO categories(name)VALUES(:name)");
    $category_st->bindParam(':name', $posts['name']);
    $category_st->execute();
    header('location: category_list.php');
    exit();
} else {
    $_SESSION['flash']['errors'] = $errors;
    header("location: create_category.php");
    exit();
}




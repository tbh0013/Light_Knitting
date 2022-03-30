<?php

require_once '../initiallization.php';


$posts['category_id'] = htmlspecialchars($_POST['category_id'], ENT_QUOTES, 'utf-8');
$posts['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8');
$posts['is_deleted'] = htmlspecialchars($_POST['is_deleted'], ENT_QUOTES, 'utf-8');

$name_limit = 20;
$name_length = strlen($posts['name']);
if($name_limit < $name_length) {
    array_push($errors, '※カテゴリー名は20文字以内で入力してください');
    $_SESSION['flash']['errors'] = $errors;
}

if(isset($_SESSION['flash']['errors'])) {
    header("location: edit_category.php?category_id={$posts['category_id']}");
    exit();
}


$update_sql = "UPDATE categories SET
                name=:name,
                is_deleted = :is_deleted
                WHERE category_id = {$posts['category_id']}";

$category_st = $pdo->prepare($update_sql);
$category_st->bindParam(':name', $posts['name']);
$category_st->bindParam(':is_deleted', $posts['is_deleted']);
$category_st->execute();

header('location: category_list.php');

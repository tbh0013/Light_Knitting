<?php

require_once '../initiallization.php';


$posts['product_id'] = htmlspecialchars($_POST['product_id'], ENT_QUOTES, 'utf-8');
$posts['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8');
$posts['price'] = htmlspecialchars($_POST['price'], ENT_QUOTES, 'utf-8');
$posts['category'] = htmlspecialchars($_POST['category'], ENT_QUOTES, 'utf-8');
$posts['image_path'] = htmlspecialchars($_POST['image_path'], ENT_QUOTES, 'utf-8');
$posts['sub_image_path'] = htmlspecialchars($_POST['sub_image_path'], ENT_QUOTES, 'utf-8');
$posts['description'] = htmlspecialchars($_POST['description'], ENT_QUOTES, 'utf-8');
$posts['is_line_up'] = htmlspecialchars($_POST['is_line_up'], ENT_QUOTES, 'utf-8');

$name_limit = 20;
$name_length = strlen($posts['name']);
if($name_limit < $name_length) {
    array_push($errors, '※商品名は20文字以内で入力してください');
    $_SESSION['flash']['errors'] = $errors;
}

$description_limit = 50;
$description_length = strlen($posts['description']);
if($description_limit < $description_length) {
    array_push($errors, '※商品説明は50文字以内で入力してください');
    $_SESSION['flash']['errors'] = $errors;
}

if(isset($_SESSION['flash']['errors'])) {
    header("location: edit_product.php?product_id={$posts['product_id']}");
    exit();
}

$update_sql = "UPDATE products SET
                name=:name,
                price=:price,
                category_id=:category,
                image_path=:image_path,
                sub_image_path=:sub_image_path,
                description=:description,
                is_line_up=:is_line_up,
                is_deleted = :is_deleted
                WHERE product_id = {$posts['product_id']}";

$product_st = $pdo->prepare($update_sql);
$product_st->bindParam(':name', $posts['name']);
$product_st->bindParam(':price', $posts['price']);
$product_st->bindParam(':category', $posts['category']);
$product_st->bindParam(':image_path', $posts['image_path']);
$product_st->bindParam(':sub_image_path', $posts['sub_image_path']);
$product_st->bindParam(':description', $posts['description']);
$product_st->bindParam(':is_line_up', $posts['is_line_up']);
$product_st->bindParam(':is_deleted', $posts['is_deleted']);
$product_st->execute();

header('location: product_list.php');

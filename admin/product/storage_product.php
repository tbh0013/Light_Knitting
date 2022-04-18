<?php

require_once '../initiallization.php';

if ($_SESSION['admin_login'] === false) {
    header("Location: ./../index.php");
    exit();
}

$posts['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8');
$posts['price'] = htmlspecialchars($_POST['price'], ENT_QUOTES, 'utf-8');
$posts['category'] = htmlspecialchars($_POST['category'], ENT_QUOTES, 'utf-8');
$posts['description'] = htmlspecialchars($_POST['description'], ENT_QUOTES, 'utf-8');
$posts['is_line_up'] = htmlspecialchars($_POST['is_line_up'], ENT_QUOTES, 'utf-8');
$main_file_name = $_FILES['image_path']['name'];
$sub_file_name = $_FILES['sub_image_path']['name'];

$category_check_st = $pdo->query("SELECT category_id FROM categories WHERE category_id = {$posts['category']} AND is_deleted = 0");
$category_check_st->setFetchMode(PDO::FETCH_ASSOC);
$category_check = $category_check_st->fetchAll();
if($category_check === array()) {
    array_push($errors, '※カテゴリーIDを正しく入力してください');
}

$name_limit = 20;
$name_length = mb_strlen($posts['name']);
if ($name_limit < $name_length) {
    array_push($errors, '※商品名は20文字以内で入力してください');
}

$is_changed_main = ($main_file_name !== "");
if ($is_changed_main) {
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

$is_changed_sub = ($sub_file_name !== "");
if($is_changed_sub){
    if (is_uploaded_file($_FILES["sub_image_path"]["tmp_name"])) {
        $sub_file_name = date('YmdHis')."_".$_FILES["sub_image_path"]["name"];

        if (pathinfo($sub_file_name, PATHINFO_EXTENSION) == 'jpg' || pathinfo($sub_file_name, PATHINFO_EXTENSION) == 'png') {
            $sub_file_tmp_name = $_FILES["sub_image_path"]["tmp_name"];
            if (move_uploaded_file($sub_file_tmp_name, "../img/" .$sub_file_name)) {
                echo "サブ画像アップロード完了";
            } else {
                array_push($errors, '※サブ画像をアップロードできませんでした。');
            }
        } else {
            array_push($errors, '※サブ画像のファイル形式はjpg/pngのみです。');
        }
    } else {
        array_push($errors, '※サブ画像の登録ができませんでした。');
    }
}

$description_limit = 50;
$description_length = mb_strlen($posts['description']);
if ($description_limit < $description_length) {
    array_push($errors, '※商品説明は50文字以内で入力してください');
}

if (!preg_match('/^([0-1]{1})$/',$posts['is_line_up'])) {
    array_push($errors, '※ラインナップフラグを正しく入力してください');
}

if (empty($errors)) {
    $product_st = $pdo->prepare("INSERT INTO products(name, price, category_id, image_path, sub_image_path, description, is_line_up)VALUES(:name, :price, :category, :image_path, :sub_image_path, :description, :is_line_up)");
    $product_st->bindParam(':name', $posts['name']);
    $product_st->bindParam(':price', $posts['price']);
    $product_st->bindParam(':category', $posts['category']);
    $product_st->bindParam(':image_path', $main_file_name);
    $product_st->bindParam(':sub_image_path', $sub_file_name);
    $product_st->bindParam(':description', $posts['description']);
    $product_st->bindParam(':is_line_up', $posts['is_line_up']);
    $product_st->execute();
    $product_id = $pdo->lastInsertId();

    $sizes_st = $pdo->query("SELECT size_id FROM sizes");
    $sizes_st->setFetchMode(PDO::FETCH_ASSOC);
    $sizes = $sizes_st->fetchAll();
    $product_size = $pdo->prepare("INSERT INTO product_sizes(product_id, size_id)VALUES(:product_id, :size_id)");

    if ($posts['category'] === 1) {
        foreach ($sizes as $size) {
            $product_size->bindParam(':product_id', $product_id);
            $product_size->bindParam(':size_id', $size['size_id']);
            $product_size->execute();
            header('location: product_list.php');
            exit();
        }
    } else {
        $size = 0;
        $product_size->bindParam(':product_id', $product_id);
        $product_size->bindParam(':size_id', $size);
        $product_size->execute();
        header('location: product_list.php');
        exit();
    }
} else {
    $_SESSION['flash']['errors'] = $errors;
    header("location: create_product.php");
    exit();
}
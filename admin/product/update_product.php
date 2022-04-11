<?php

require_once '../initiallization.php';

if ($_SESSION['admin_login'] === false) {
    header("Location: ./../index.php");
    exit();
}

$posts['product_id'] = htmlspecialchars($_POST['product_id'], ENT_QUOTES, 'utf-8');
$posts['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8');
$posts['price'] = htmlspecialchars($_POST['price'], ENT_QUOTES, 'utf-8');
$posts['category'] = htmlspecialchars($_POST['category'], ENT_QUOTES, 'utf-8');
$posts['description'] = htmlspecialchars($_POST['description'], ENT_QUOTES, 'utf-8');
$posts['is_line_up'] = htmlspecialchars($_POST['is_line_up'], ENT_QUOTES, 'utf-8');
$posts['delete_main_file'] = htmlspecialchars($_POST['delete_main_file'], ENT_QUOTES, 'utf-8');
$posts['delete_sub_file'] = htmlspecialchars($_POST['delete_sub_file'], ENT_QUOTES, 'utf-8');
$main_file_name = $_FILES['image_path']['name'];
$sub_file_name = $_FILES['sub_image_path']['name'];

$category_check_st =  $pdo->query("SELECT category_id FROM categories WHERE category_id = {$posts['category']} AND is_deleted = 0");
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

if ($is_changed_main === false) {
    if ($posts['delete_main_file'] === "delete") {
        $is_changed_main = true;
        $main_file_name = "";
    }
}

if ($is_changed_sub === false) {
    if ($posts['delete_sub_file'] === "delete") {
        $is_changed_sub = true;
        $sub_file_name = "";
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

    $img_query = ($is_changed_main) ? "image_path=:image_path," : "";
    $sub_img_query = ($is_changed_sub) ? "sub_image_path=:sub_image_path," : "";

    $query = "UPDATE products SET
        name=:name,
        price=:price,
        category_id=:category,
        {$img_query}
        {$sub_img_query}
        description=:description,
        is_line_up=:is_line_up,
        is_deleted = :is_deleted
        WHERE product_id = {$posts['product_id']}";

    $update_sql = $query;
    $product_st = $pdo->prepare($update_sql);
    if ($is_changed_main) $product_st->bindParam(':image_path', $main_file_name);
    if ($is_changed_sub) $product_st->bindParam(':sub_image_path', $sub_file_name);
    $product_st->bindParam(':name', $posts['name']);
    $product_st->bindParam(':price', $posts['price']);
    $product_st->bindParam(':category', $posts['category']);
    $product_st->bindParam(':description', $posts['description']);
    $product_st->bindParam(':is_line_up', $posts['is_line_up']);
    $product_st->bindParam(':is_deleted', $posts['is_deleted']);
    $product_st->execute();
    header('location: product_list.php');
    exit();
} else {
    $_SESSION['flash']['errors'] = $errors;
    header("location: edit_product.php?product_id={$posts['product_id']}");
    exit();
}
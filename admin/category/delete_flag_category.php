<?php

require_once '../initiallization.php';

if ($_SESSION['admin_login'] === false) {
    header("Location: ./../index.php");
    exit();
}

$category_id = htmlspecialchars($_GET['category_id'], ENT_QUOTES, 'utf-8');

$check_sql = "SELECT is_deleted FROM categories WHERE category_id = $category_id";
$check_st = $pdo->query($check_sql);
$check_st->execute();
$checks = $check_st->fetchAll(PDO::FETCH_ASSOC);

foreach($checks as $check) {
    if($check['is_deleted'] === "0") {
        $category_sql = "SELECT category_id, is_deleted FROM products WHERE category_id = {$category_id} AND is_deleted = 0";
        $category_st = $pdo->query($category_sql);
        $category_st->setFetchMode(PDO::FETCH_ASSOC);
        $categories = $category_st->fetchAll();

        if($categories === array()) {
            $deleted_sql = "UPDATE categories SET
                            is_deleted=:is_deleted
                            WHERE category_id = $category_id";

            $deleted_st = $pdo->prepare($deleted_sql);
            $flag = 1;
            $deleted_st->bindParam(':is_deleted', $flag, PDO::PARAM_INT);
            $deleted_st->execute();
            header('location: category_list.php');
        } else {
            echo 'カテゴリーに商品が含まれている為、削除できません。';
            echo '<pre>';
            echo "<a href="."category_list.php".">カテゴリー一覧に戻る</a>";
        }
    } else if($check['is_deleted'] === "1"){
        $deleted_sql = "UPDATE categories SET
                        is_deleted=:is_deleted
                        WHERE category_id = $category_id";

        $deleted_st = $pdo->prepare($deleted_sql);
        $flag = 0;
        $deleted_st->bindParam(':is_deleted', $flag, PDO::PARAM_INT);
        $deleted_st->execute();
        header('location: category_list.php');
    }
}

<?php
require_once 'initiallization.php';

$products = array();
$categories = array();
$categories_id = null;

if(isset($_GET['category_id'])) {
    $categories_id = $_GET['category_id'];
}

if(!is_numeric($categories_id) && ($categories_id !== null)) {
    header('location: no_page.php');
    exit();
}


if (isset($categories_id)) {
    $categories_st = $pdo->query("SELECT category_id, name FROM categories WHERE category_id = $categories_id AND is_deleted = 0");
    $categories_st->setFetchMode(PDO::FETCH_ASSOC);
    $categories = $categories_st->fetchAll();

    if($categories === array()) {
        header('location: no_page.php');
        exit();
    }
    // $category_list_st = $pdo->query("SELECT category_id, name FROM categories WHERE is_deleted = 0");
    // $category_list_st->setFetchMode(PDO::FETCH_ASSOC);
    // $category_list = $category_list_st->fetchAll();

    // echo "<pre>";
    // var_dump($categories_id);
    // echo "</pre>";
    // $result = array_column($category_list, 'category_id');
    // echo "<pre>";
    // var_dump($result);
    // echo "</pre>";

    // if(array_search($categories_id, $result,)){
    //     echo "成功";
    // } else {
    //     echo "失敗";
    // }
    // exit;

    $products_st = $pdo->query("SELECT * FROM products WHERE category_id = $categories_id AND is_deleted = 0");
    $products_st->setFetchMode(PDO::FETCH_ASSOC);
    $products = $products_st->fetchAll();
} else {
    $categories[0]['name'] = "All Items";
    $product_sql = "SELECT
                    products.*
                    FROM products
                    JOIN categories
                    USING(category_id)
                    WHERE products.is_deleted = 0
                    AND categories.is_deleted = 0";
    $products_st = $pdo->query($product_sql);
    $products_st->setFetchMode(PDO::FETCH_ASSOC);
    $products = $products_st->fetchAll();
}

require_once 'views/v_items.php';
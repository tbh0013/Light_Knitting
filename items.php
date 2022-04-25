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

    $products_st = $pdo->query("SELECT * FROM products WHERE category_id = $categories_id AND is_deleted = 0 ORDER BY updated_at DESC");
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
                    AND categories.is_deleted = 0
                    ORDER BY category_id,updated_at DESC ";
    $products_st = $pdo->query($product_sql);
    $products_st->setFetchMode(PDO::FETCH_ASSOC);
    $products = $products_st->fetchAll();
}

require_once 'views/v_items.php';
<?php
session_start();
$errors = [];
$pdo = new PDO("mysql:dbname=knit_shop", "root");

$errors = isset($_SESSION['flash']['errors'])
            ? $_SESSION['flash']['errors']
            : array();
unset($_SESSION['flash']['errors']);

$product_id = $_GET['product_id'];

$product_join_size_sql ="SELECT
                        products.product_id,
                        products.name AS p_name,
                        products.price,
                        products.description,
                        products.image_path,
                        products.sub_image_path,
                        product_sizes.product_id,
                        sizes.size_name,
                        categories.name AS c_name
                        FROM products
                        LEFT JOIN product_sizes
                        ON products.product_id = product_sizes.product_id
                        LEFT JOIN sizes
                        ON product_sizes.size_id = sizes.size_id
                        LEFT JOIN categories
                        ON products.category_id = categories.category_id
                        WHERE products.product_id = {$product_id}";
$product_join_size_st = $pdo->query($product_join_size_sql);
$product_join_size_st->setFetchMode(PDO::FETCH_ASSOC);
$product_join_size = $product_join_size_st->fetchAll();

$size_array = array_column($product_join_size, 'size_name');


require_once 'views/v_item_detail.php';

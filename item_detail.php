<?php
require_once 'initiallization.php';

$errors = isset($_SESSION['flash']['errors'])
            ? $_SESSION['flash']['errors']
            : array();
unset($_SESSION['flash']['errors']);

$product_id = $_GET['product_id'];

if(!is_numeric($product_id)) {
    header('location: no_page.php');
    exit();
}

$products_sql ="SELECT
                        products.product_id,
                        products.name AS p_name,
                        products.price,
                        products.description,
                        products.image_path,
                        products.sub_image_path,
                        product_sizes.product_id,
                        products.is_deleted,
                        sizes.size_name,
                        categories.name AS c_name
                        FROM products
                        LEFT JOIN product_sizes
                        ON products.product_id = product_sizes.product_id
                        LEFT JOIN sizes
                        ON product_sizes.size_id = sizes.size_id
                        LEFT JOIN categories
                        ON products.category_id = categories.category_id
                        WHERE products.product_id = {$product_id}
                        AND products.is_deleted = 0";
$products_st = $pdo->query($products_sql);
$products_st->setFetchMode(PDO::FETCH_ASSOC);
$products = $products_st->fetchAll();

if($products === array()) {
    header('location: no_page.php');
    exit();
}

$size_array = array_column($products, 'size_name');


require_once 'views/v_item_detail.php';

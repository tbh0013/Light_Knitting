<?php
require_once 'initiallization.php';

$product_id = $_POST['product_id'];

$product_size_sql = "SELECT
                        sizes.size_name
                        FROM products
                        LEFT JOIN product_sizes
                        ON products.product_id = product_sizes.product_id
                        LEFT JOIN sizes
                        ON product_sizes.size_id = sizes.size_id
                        WHERE products.product_id = {$product_id}";

$product_size_st = $pdo->query($product_size_sql);
$product_size_st->setFetchMode(PDO::FETCH_ASSOC);
$product_size = $product_size_st->fetchAll();
$size_array = array_column($product_size, 'size_name');

$posts['num'] = (int) $_POST['num'];

if (isset($_POST['size_exist'])) {
    $posts['size'] = htmlspecialchars($_POST['size']);
}

$min_num = 1;
$max_num = 5;
if ($posts['num'] < $min_num || $max_num < $posts['num']) {
    array_push($errors, '※数量を選択してください');
}

if (isset($posts['size'])) {
    if (!in_array($posts['size'], $size_array, true)) {
        array_push($errors, '※サイズを選択してください');
    }
}

if (empty($errors)) {

    if (isset($_POST['submit']) && $posts['num'] >= 1) {
        $in_product[0] = $posts['num'];
    }

    if (isset($posts['size'])) {
        $in_product[1] = $posts['size'];
    }

    if (isset($_SESSION['cart'][$product_id])) {
        $cart_sizes = array_column($_SESSION['cart'][$product_id], '1');
        $key = array_search($posts['size'], $cart_sizes, true);
        if ($key === FALSE) {
            $_SESSION['cart'][$product_id][] = $in_product;
        } else {
            $_SESSION['cart'][$product_id][$key] = $in_product;
        }

    }else {
        $_SESSION['cart'][$product_id][] = $in_product;
    }

    header('Location: cart.php');
    exit;

} else {

    $_SESSION['flash']['errors'] = $errors;

    header("Location: item_detail.php?product_id={$product_id}");
    exit;
}
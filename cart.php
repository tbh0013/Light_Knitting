<?php
session_start();

$cart_rows = array();
$sum = 0;
$can_buy = false;
$pdo = new PDO("mysql:dbname=knit_shop", "root");
$i = 0;

// カートの中身を確認
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

foreach ($_SESSION['cart'] as $product_id => $products) {
    foreach ($products as $num_size) {
        $cart_st = $pdo->query("SELECT * FROM products WHERE product_id = {$product_id}");
        $cart_st->setFetchMode(PDO::FETCH_ASSOC);
        $cart_row = $cart_st->fetch();
        $cart_st->closeCursor();

        $cart_row['num'] = $num_size[0];
        $sum += $num_size[0] * $cart_row['price'];

        if (isset($num_size[1])) {
            $cart_row['size'] = $num_size[1];
        }

        $cart_rows[] = $cart_row;
    }
}

// 空の場合
if (!empty($cart_row)) {
    $can_buy = true;
}

require_once 'views/v_cart.php';
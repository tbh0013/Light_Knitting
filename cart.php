<?php
require_once 'initiallization.php';

$cart_rows = array();
$sum = 0;
$can_buy = false;
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

        // 数量とサイズのキー変更
        if(isset($num_size[1])) {
            $num_size_keys = ["num", "size"];
            $num_size_array = array_combine($num_size_keys, $num_size);
            $cart_row['size'] = $num_size_array['size'];
            $cart_row['num'] = $num_size_array["num"];
            $sum += $cart_row['num'] * $cart_row['price'];
        } else {
            $num_keys = ["num"];
            $num_array = array_combine($num_keys, $num_size);
            $cart_row['num'] = $num_array["num"];
            $sum += $cart_row['num'] * $cart_row['price'];
        }
        $cart_row['sum'] = $sum;

        $cart_rows[] = $cart_row;
    }
}

// 空の場合
if (!empty($cart_row)) {
    $can_buy = true;
}

require_once 'views/v_cart.php';
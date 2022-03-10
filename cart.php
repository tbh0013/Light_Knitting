<?php 
    session_start();

    $cart_rows = array();
    $sum = 0;
    $can_buy = false;
    $pdo = new PDO("mysql:dbname=knit_shop", "root");
    $i =0;

    // カートの中身を確認
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

  // POST内容確認
    if(isset($_POST['submit']) && $_POST['num'] >= 1 ){
        $_SESSION['cart'][$_POST['product_id']] = [$_POST['num']];
    }
    if(isset($_POST['size'])) {
        array_push($_SESSION['cart'][$_POST['product_id']], $_POST['size']);
    }

    // メモ：PDOオブジェクトを作成、DB接続→プリペアードステートメントのSQLをprepare関数を使って設定→execute関数でSQL文を実行
    //     :closeCursor() は、 他の SQL ステートメントを発行できるようにサーバーへの接続を解放しますが、 ステートメントは再実行可能な状態のまま残されます。
    foreach($_SESSION['cart'] as $product_id => $num_size) {
    
        $cart_st = $pdo->prepare("SELECT * FROM products WHERE product_id = ?");
        $cart_st->execute(array($product_id));
        $cart_st->setFetchMode(PDO::FETCH_ASSOC);
        $cart_row = $cart_st->fetch();
        $cart_st->closeCursor();

        $cart_row['num'] = $num_size[0];
        $sum += $num_size[0] * $cart_row['price'];

        if(isset($num_size[1])) {
            $cart_row['size'] = $num_size[1];
        }

        $cart_rows[] = $cart_row;
    }

    // 空の場合
    if (!empty($cart_row)) {
        $can_buy = true;
    }

    require 'views/v_cart.php';

?>
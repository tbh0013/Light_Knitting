<?php
require_once 'initiallization.php';

$page_check = 0;
$cart_rows = array();

if (!isset($_POST['submit_check'])) {
    $name = '';
    $email = '';
    $code = '';
    $address = '';
    $tel = '';
}

if (isset($_POST['submit_check'])) {
    $cart_rows = cart_detail();

    $posts['customer_name'] = htmlspecialchars($_POST['customer_name']);
    $posts['mail'] = htmlspecialchars($_POST['mail']);
    $posts['code'] = htmlspecialchars($_POST['code']);
    $posts['address'] = htmlspecialchars($_POST['address']);
    $posts['address_after'] = htmlspecialchars($_POST['address_after']);
    $posts['tel'] = htmlspecialchars($_POST['tel']);
    $posts['address'] = $posts['address'].$posts['address_after'];


    $order_st = $pdo->prepare("INSERT INTO orders(customer_name, mail, post_code, address, tel)VALUES(:customer_name, :mail, :post_code, :address, :tel)");
    $order_st->bindParam(':customer_name', $posts['customer_name'], PDO::PARAM_STR);
    $order_st->bindParam(':mail', $posts['mail'], PDO::PARAM_STR);
    $order_st->bindParam(':post_code', $posts['code'], PDO::PARAM_STR);
    $order_st->bindParam(':address', $posts['address'], PDO::PARAM_STR);
    $order_st->bindParam(':tel', $posts['tel'], PDO::PARAM_STR);
    $order = $order_st->execute();
    $order_id = $pdo->lastInsertId();

    foreach ($cart_rows as $cart) {
        $order_detail_st = $pdo->prepare("INSERT INTO order_details(order_id, product_id, product_size_id, quantity)VALUES(:order_id, :product_id, :product_size_id, :quantity)");
        $order_detail_st->bindParam(':order_id',$order_id ,PDO::PARAM_INT);
        $order_detail_st->bindParam(':product_id',$cart['product_id'],PDO::PARAM_INT);
        $order_detail_st->bindParam(':product_size_id',$cart['product_size_id'],PDO::PARAM_INT);
        $order_detail_st->bindParam(':quantity',$cart['num'],PDO::PARAM_INT);
        $order_detail = $order_detail_st->execute();
    }

    $body = "商品が購入されました。\n\n"
            . "お名前: {$posts['customer_name']}\n"
            . "メールアドレス: {$posts['mail']}\n\n"
            . "郵便番号: {$posts['code']}\n\n"
            . "ご住所: {$posts['address']}\n"
            . "電話番号: {$posts['tel']}\n\n"
            . "商品名: {$cart['p_name']}\n"
            . "単価: {$cart['price']} 円\n"
            . "数量: {$cart['num']}\n\n";
    $from = "test";
    $pfrom = "-f $from";
    $to = "example@mail.com";

    // mb_send_mail($to, "購入メール", $body, "From: $from", $pfrom);
    $_SESSION['cart'] = null;
    require_once 'views/v_buy_complete.php';
    exit();
}

if (isset($_POST['submit'])) {
    $posts['name'] = htmlspecialchars($_POST['name']);
    $posts['mail'] = htmlspecialchars($_POST['mail']);
    $posts['code'] = htmlspecialchars($_POST['code']);
    $posts['address'] = htmlspecialchars($_POST['address']);
    $posts['address_after'] = htmlspecialchars($_POST['address_after']);
    $posts['tel'] = htmlspecialchars($_POST['tel']);
    foreach ($posts as $key => $val) {
        if (!$val) {
            switch($key) {
                case 'name':
                    array_push($errors, '※お名前を入力してください。');
                break;
                case 'email':
                    array_push($errors, '※メールアドレスを入力してください。');
                break;
                case 'code':
                    array_push($errors, '※郵便番号を入力してください。');
                break;
                case 'address':
                    array_push($errors, '※ご住所を入力してください。');
                break;
                case 'tel':
                    array_push($errors, '※電話番号を入力してください');
                break;
            }
        }

        if ($key == 'tel') {
            if (!preg_match("/^0[0-9]{9,10}\z/", $val)) {
            array_push($errors, '※電話番号が正しくありません。ハイフンなし0から始まる半角数字10桁或いは11桁を入力して下さい');
            }
        }

        if ($key == 'code') {
            $code_fixed_value = 7;
            $code_string = (string) $val;
            $code_length = mb_strlen($val);
            // !preg_match("^\d{7}$", $code_string

            if (!is_numeric($val) || $code_fixed_value != $code_length || !preg_match("/^[0-9]{7}+$/", $code_string)) {
                array_push($errors, '※郵便番号が正しくありません。ハイフンなし7文字の半角数字を入力して下さい');
            }

            // if ($code_fixed_value != $code_length) {
            //     array_push($errors, '※郵便番号が正しくありません。ハイフンなし7文字の数字を入力して下さい');
            // }
            //         if (!is_numeric($val)) {
            //             array_push($errors, '※郵便番号が正しくありません。ハイフンなし半角7文字の数字を入力して下さい');
            //         }
            //             if(!preg_match("/^[0-9]{7}+$/", $code_string)) {
            //                 array_push($errors, '※郵便番号が正しくありません。ハイフンなし半角7文字の数字を入力して下さい');
            //             }
        }
    }

    if (empty($errors)) {
        $cart_rows = cart_detail();
        $page_check = 1;
        require_once 'views/v_buy.php';
        exit();
    }
}

require_once 'views/v_buy.php';

function cart_detail() {
    global $sum;

    foreach ($_SESSION['cart'] as $product_id => $products) {
        foreach ($products as $num_size) {

            // 数量とサイズのキー変更
            if(isset($num_size[1])) {
                $num_size_keys = ["num", "size"];
                $num_size_array = array_combine($num_size_keys, $num_size);
            } else {
                $num_keys = ["num"];
                $num_array = array_combine($num_keys, $num_size);
            }

            if (isset($num_size_array)) {
                $cart_sql ="SELECT
                products.product_id,
                products.name AS p_name,
                products.price,
                products.description,
                products.image_path,
                products.sub_image_path,
                product_sizes.product_size_id,
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
                AND sizes.size_name = {$num_size_array['size']}";
            } else {
                $cart_sql ="SELECT
                products.product_id,
                products.name AS p_name,
                products.price,
                products.description,
                products.image_path,
                products.sub_image_path,
                product_sizes.product_size_id,
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
            }

            global $pdo;
            $cart_st = $pdo->query($cart_sql);
            $cart_st->setFetchMode(PDO::FETCH_ASSOC);
            $cart_row = $cart_st->fetch();
            $cart_st->closeCursor();

            if(isset($num_size_array)) {
                $cart_row['size'] = $num_size_array['size'];
                $cart_row['num'] = $num_size_array['num'];
                $sum += $cart_row['num'] * $cart_row['price'];
            } else {
                $cart_row['num'] = $num_array["num"];
                $sum += $cart_row['num'] * $cart_row['price'];
            }
            $cart_row['sum'] = $sum;

            $cart_rows[] = $cart_row;
            $num_size_array = null;
            $num_array = null;
        }
    }
    return $cart_rows;
}
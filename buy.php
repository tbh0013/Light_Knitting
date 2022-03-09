<?php
    session_start();

    $page_check = 0;
    $cart_rows = array();

    if(!isset($_POST['submit_check'])){
        $errors = [];
        $name = '';
        $email = '';
        $code = '';
        $address = '';
        $tel = '';
    }

    if(isset($_POST['submit_check'])){
        $cart_rows = cart_detail();
        $pdo = new PDO("mysql:dbname=knit_shop", "root");

        $posts['customer_name'] = htmlspecialchars($_POST['customer_name']);
        $posts['mail'] = htmlspecialchars($_POST['mail']);
        $posts['code'] = htmlspecialchars($_POST['code']);
        $posts['address'] = htmlspecialchars($_POST['address']);
        $posts['tel'] = htmlspecialchars($_POST['tel']);

        $order_st = $pdo->prepare("INSERT INTO orders(customer_name, mail, post_code, address, tel)VALUES(:customer_name, :mail, :post_code, :address, :tel)");
        $order_st->bindParam(':customer_name', $posts['customer_name'], PDO::PARAM_STR);
        $order_st->bindParam(':mail', $posts['mail'], PDO::PARAM_STR);
        $order_st->bindParam(':post_code', $posts['code'], PDO::PARAM_INT);
        $order_st->bindParam(':address', $posts['address'], PDO::PARAM_STR);
        $order_st->bindParam(':tel', $posts['tel'], PDO::PARAM_INT);
        $order = $order_st->execute();
        $order_id = $pdo->lastInsertId();

        foreach($cart_rows as $cart) {
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
        require 'views/v_buy_complete.php';
        exit();
    }

    if(isset($_POST['submit'])) {
        $posts['name'] = htmlspecialchars($_POST['name']);
        $posts['mail'] = htmlspecialchars($_POST['mail']);
        $posts['code'] = htmlspecialchars($_POST['code']);
        $posts['address'] = htmlspecialchars($_POST['address']);
        $posts['tel'] = htmlspecialchars($_POST['tel']);
        
        foreach($posts as $key => $val) {
            if(!$val) {
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

            if($key == 'tel') {
                if(preg_match('/[^\d-]/', $val)) {
                array_push($errors, '※電話番号が正しくありません。');
                }
            }

            if($key == 'code') {
                if(preg_match('/[^\d-]/', $val)) {
                array_push($errors, '※郵便番号が正しくありません。');
                }
            }
        }

        if(empty($errors)) {
            $cart_rows = cart_detail();
            $page_check = 1;
            require 'views/v_buy.php';
                exit();
        }
    }

    require 'views/v_buy.php';

    function cart_detail() {
        foreach($_SESSION['cart'] as $product_id => $num_size) {
            $cart_sql ="SELECT
            products.product_id,
            products.name AS p_name,
            products.price,
            products.description,
            products.image_path,
            products.sub_image_path,
            product_sizes.product_size_id,
            categories.name AS c_name
            FROM products
            LEFT JOIN product_sizes
            ON products.product_id = product_sizes.product_id
            LEFT JOIN sizes
            ON product_sizes.size_id = sizes.size_id
            LEFT JOIN categories
            ON products.category_id = categories.category_id
            WHERE products.product_id = ?";

            $pdo = new PDO("mysql:dbname=knit_shop", "root");
            $cart_st = $pdo->prepare($cart_sql);
            $cart_st->execute(array($product_id));
            $cart_st->setFetchMode(PDO::FETCH_ASSOC);
            $cart_row = $cart_st->fetch();
            $cart_st->closeCursor();
            
            $cart_row['num'] = $num_size[0];
            $sum = 0;
            $sum += $num_size[0] * $cart_row['price']; 
            $cart_row['sum'] = $sum;

            if(isset($num_size[1])) {
                $cart_row['size'] = $num_size[1];
            }

            $cart_rows[] = $cart_row;
        }
        return $cart_rows;
    }
?>

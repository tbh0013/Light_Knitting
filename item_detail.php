<?php
    session_start();
    $errors = [];
    $pdo = new PDO("mysql:dbname=knit_shop", "root");
    
    if(isset($_POST['product_id'])) {
        $products_id = $_POST['product_id'];
    }else {
        $products_id = $_GET['product_id'];
    }


    // #item_detail_container内で使用するDB
    $product_st = $pdo->query("SELECT product_id, name, price, image_path, sub_image_path, description FROM products WHERE product_id = $products_id");
    $product_st->setFetchMode(PDO::FETCH_ASSOC);
    $products = $product_st->fetchAll();

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
                            WHERE products.product_id = $products_id";

    $product_join_size_st = $pdo->query($product_join_size_sql);
    $product_join_size_st->setFetchMode(PDO::FETCH_ASSOC);
    $product_join_size = $product_join_size_st->fetchAll();

    $size_array = array_column($product_join_size, 'size_name');


    if(isset($_POST['submit'])) {
        $posts['num'] = htmlspecialchars($_POST['num']);

        if(isset($_POST['size_exist'])) {
            $posts['size'] = htmlspecialchars($_POST['size']);
        }

        if($posts['num'] === '---') {
            array_push($errors, '※数量を選択してください');
        }

        if(isset($_POST['size'])) {
            if($posts['size'] === '---') {
                array_push($errors, '※サイズを選択してください');
            }
        }

        if(empty($errors)) {
            require 'cart.php';
            exit();
        }

    }


    require 'views/v_item_detail.php';


?>

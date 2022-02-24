<?php
  session_start();

  $pdo = new PDO("mysql:dbname=knit_shop", "root");
  
  $category_name = $_SESSION['category_name'];
  $products_id = $_GET['product_id'];

  // #item_detail_container内で使用するDB
  $product_st = $pdo->query("SELECT product_id, name, price, image_path, sub_image_path, description FROM products WHERE product_id = $products_id");
  $product_st->setFetchMode(PDO::FETCH_ASSOC);
  $products = $product_st->fetchAll();


  // #item_information内で使用するproduct_sizesテーブルとsizesテーブル結合 仮想テーブル作成
  $product_join_size_sql = "SELECT
                            product_sizes.product_size_id,
                            product_sizes.product_id,
                            sizes.size_name
                            FROM product_sizes
                            LEFT JOIN sizes
                            ON product_sizes.size_id = sizes.size_id
                            WHERE product_sizes.product_id = $products_id";

  $product_join_size_st = $pdo->query($product_join_size_sql);
  $product_join_size_st->setFetchMode(PDO::FETCH_ASSOC);
  $product_join_size = $product_join_size_st->fetchAll();


  require 'views/v_item_detail.php';



  // 仮装テーブル作成 3テーブル結合
  // SELECT FROM products as p INNER JOIN product_sizes as p_s ON p.product_id = p_s.product_id INNER JOIN sizes as s ON p_s.size_id = s.size_id
//   $product_join_size_sql ="SELECT
//                                 products.product_id,
//                                 products.name,
//                                 products.price,
//                                 products.description,
//                                 products.image_path,
//                                 products.sub_image_path,
//                                 product_sizes.product_size_id,
//                                 product_sizes.product_id,
//                                 sizes.size_name
//                                 FROM products
//                                 LEFT JOIN product_sizes
//                                 ON products.product_id = product_sizes.product_id
//                                 LEFT JOIN sizes
//                                 ON product_sizes.size_id = sizes.size_id
//                                 WHERE products.product_id = $products_id";
// $product_join_size_st = $pdo->query($product_join_size_sql);
// $product_join_size_st->setFetchMode(PDO::FETCH_ASSOC);
// $product_join_size = $product_join_size_st->fetchAll();
// var_dump($product_join_size);

?>

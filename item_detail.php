<?php
  session_start();

  $pdo = new PDO("mysql:dbname=knit_shop", "root");
  
  // 要検討の為コメントアウト
  // $category_name = $_SESSION['category_name'];
  $products_id = $_GET['product_id'];

  // #item_detail_container内で使用するDB
  $product_st = $pdo->query("SELECT product_id, name, price, image_path, sub_image_path, description FROM products WHERE product_id = $products_id");
  $product_st->setFetchMode(PDO::FETCH_ASSOC);
  $products = $product_st->fetchAll();
  // var_export($products);

  // #item_information内で使用するproduct_sizesテーブルとsizesテーブル結合 仮想テーブル作成
  // $product_join_size_sql = "SELECT
  //                           product_sizes.product_size_id,
  //                           product_sizes.product_id,
  //                           sizes.size_name
  //                           FROM product_sizes
  //                           LEFT JOIN sizes
  //                           ON product_sizes.size_id = sizes.size_id
  //                           WHERE product_sizes.product_id = $products_id";

  // $product_join_size_st = $pdo->query($product_join_size_sql);
  // $product_join_size_st->setFetchMode(PDO::FETCH_ASSOC);
  // $product_join_size = $product_join_size_st->fetchAll();

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
  // var_export($product_join_size);
  $size_array = array_column($product_join_size, 'size_name');

  // $product_array = array();
  // $product_array = current($product_join_size);
  // var_export($product_a);

  require 'views/v_item_detail.php';

?>

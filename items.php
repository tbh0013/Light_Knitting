<?php
  session_start();

  $pdo = new PDO("mysql:dbname=knit_shop", "root");

  if(isset($_GET['category_id'])) {
  // カテゴリーごとの表示で使用するDB
  $categories_id = $_GET['category_id'];
  $products_st = $pdo->query("SELECT * FROM products WHERE category_id=$categories_id");
  $products_st->setFetchMode(PDO::FETCH_ASSOC);
  $products = $products_st->fetchAll();

  $categories_st = $pdo->query("SELECT category_id, name FROM categories WHERE category_id = $categories_id");
  $categories_st->setFetchMode(PDO::FETCH_ASSOC);
  $categories = $categories_st->fetchAll();

  } else {
    // 全てのアイテム表示で使用するDB
    $categories[0]['name'] = "All Items";
    $products_st = $pdo->query("SELECT * FROM products");
    $products_st->setFetchMode(PDO::FETCH_ASSOC);
    $products = $products_st->fetchAll();
  }


  require 'views/v_items.php';


  // item_detailページの#item_headingで使用→AllItemがあるため、v_itemからGetでcategory_nameを送った方が良さそう
  $_SESSION['category_name'] = $categories[0]['name'];

?>

<!------------ アイテムページ各種表示メモ
・各種製品ページにidを付与 items.php?id=2
・&_GETでid取得

items.php→item_detil.phpへのページ遷移
・items.phpにてforeachでアイテムを表示→SESSIONでproduct_idを保存→item_detil.phpで受け取る?
・現状：foreachで個々にformタグに囲まれたアイテムを表示→GETでproduct_idをitem_detei.phpに送信→受け取る

-->
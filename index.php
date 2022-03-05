<?php
  session_start();


  $pdo = new PDO("mysql:dbname=knit_shop", "root");

  $products_st = $pdo->query("SELECT * FROM products");
  $products_st->setFetchMode(PDO::FETCH_ASSOC);
  $products = $products_st->fetchAll();

  $news_st = $pdo->query("SELECT * FROM news");
  $news_st->setFetchMode(PDO::FETCH_ASSOC);
  $news_s = $news_st->fetchAll();

/*---------------------------トップページ ラインナップ データベース連携メモ-------------------------------------- 

  lineupフラグ付きの商品レコード3件をスライドで表示する
  $productsからis_line_upカラム（１）,image_pathカラムを持ったレコードを抽出→配列に代入
  →imageパスカラムを配列に保存→画面表示（file_get_contents,header)
  ページ表示時にUPDATE文でline_upカラムを書き換える？ 0非表示、1表示

  ...query→返り値PDOStatementオブジェクト 配列でデータ取得 
  ...fetch→返り値SQL文の結果、queryの返値を見える配列にして受け取る

  functionの削除、画像パスを途中まで文字列→製品名.jpgのみ変数に代入
  ランダムで配置する場合→5件抽出→viewでランダムに表示するようにプログラムする
--------------------------------------------------------------------------------------------------------*/
  // categoriesテーブル結合、カテゴリー名取り出し
  $lineup_join_category = "SELECT
                            products.product_id,
                            products.is_line_up,
                            products.image_path,
                            categories.name
                            FROM products
                            LEFT JOIN categories
                            ON products.category_id = categories.category_id
                            WHERE products.is_line_up = 1";

  $lineup_st = $pdo->query($lineup_join_category);
  // いちおコメントアウト
  // $lineup_st = $pdo->query('SELECT product_id, is_line_up,image_path FROM products WHERE is_line_up = 1');
  $lineup_st->setFetchMode(PDO::FETCH_ASSOC);
  $lineups = $lineup_st->fetchAll();

  // foreach($lineups as $lineup) {
  //   echo lineup_list($lineup['image_path']);
  // }


  /*---------------------トップページ ニュース データベース連携メモ---------------------------------------------------
  ニューステーブルの日付カラムが新しい5件を表示。
  全データ取得→新しい5件のみのデータを配列で取得
  →foreachで連想配列のdate(日付)とtext(内容)を取り出して表示
  ---------------------------------------------------------------------------------------------------------*/
  $top_news_st = $pdo->query('SELECT DATE_FORMAT(date, "%Y-%m-%d") as t_date,text,url,news_id FROM news ORDER BY date DESC LIMIT 5');
  $top_news_st->setFetchMode(PDO::FETCH_ASSOC);
  $top_news = $top_news_st->fetchAll();
  
  require 'views/v_index.php';
?>
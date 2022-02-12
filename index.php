<?php
//-------------------------TODO:ページ共通-----------------------------------------------------------
  session_start();

  // 変数
  $pdo = connect();

  $products_st = $pdo->query("SELECT * FROM products");
  $products_st->setFetchMode(PDO::FETCH_ASSOC);
  $products = $products_st->fetchAll();

  $news_st = $pdo->query("SELECT * FROM news");
  $news_st->setFetchMode(PDO::FETCH_ASSOC);
  $news_s = $news_st->fetchAll();

  // 関数
  function connect() {
    return new PDO("mysql:dbname=knit_shop_test", "root"); 
  }


/*---------------------------TODO:トップページ ラインナップ データベース連携メモ-------------------------------------- 

  lineupフラグ付きの商品レコード3件をスライドで表示する
  $productsからis_line_upカラム（１）,image_pathカラムを持ったレコードを抽出→配列に代入
  →imageパスカラムを配列に保存→画面表示（file_get_contents,header)
  ページ表示時にUPDATE文でline_upカラムを書き換える？ 0非表示、1表示

  ...query→返り値PDOStatementオブジェクト 配列でデータ取得 
  ...fetch→返り値SQL文の結果、queryの返値を見える配列にして受け取る

--------------------------------------------------------------------------------------------------------*/


function lineup_list($lineup_code){
    return '<img src='.$lineup_code.' alt="">';
  }

  $lineup_st = $pdo->query("SELECT is_line_up,image_path FROM products WHERE is_line_up = 1");
  $lineup_st->setFetchMode(PDO::FETCH_ASSOC);
  $lineups = $lineup_st->fetchAll();
  var_dump($lineups);

  foreach($lineups as $lineup) {
    echo lineup_list($lineup['image_path']);
  }


  // エラー確認中のコード
  // $image_path_code = lineup_list($lineup['image_path']);
  // $image_data = file_get_contents($image_path_code);
  // header('Content-type: image/jpg');
  // 画像表示確認、v_index.htmlだとエラーで表示されず
  

  /*---------------------TODO:トップページ ニュース データベース連携メモ---------------------------------------------------
  ニューステーブルの日付カラムが新しい5件を表示。
  全データ取得→新しい5件のみのデータを配列で取得
  →foreachで連想配列のdate(日付)とtext(内容)を取り出して表示
  ---------------------------------------------------------------------------------------------------------*/
  function news_list($news_list_code){
    return "''.$news_list_code. '";
  }
  
  foreach($news_s as $news) {
    echo news_list($news['text']);
  }

  /*---------------------TODO:アイテムページ データベース連携メモ---------------------------------------------------
  ---------------------------------------------------------------------------------------------------------*/

// require 'views/v_index.php';
?>  
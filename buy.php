<?php
  session_start();

  $errors = [];
  $name = '';
  $email = '';
  $code = '';
  $address = '';
  $tel = '';
  $sum = 0;
  
  if(isset($_POST['check'])){
    $_SESSION['cart'] = null;
    require 'views/v_buy_complete.php';
    exit();
  }

  if(isset($_POST['submit'])) {

    $posts['name'] = htmlspecialchars($_POST['name']);
    $posts['email'] = htmlspecialchars($_POST['email']);
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
      $pdo = new PDO("mysql:dbname=knit_shop", "root");
      $body = "商品が購入されました。\n\n"
              . "お名前: $name\n"
              . "メールアドレス: $email\n\n"
              . "郵便番号: $code\n\n"
              . "ご住所: $address\n"
              . "電話番号: $tel\n\n";

      foreach($_SESSION['cart'] as $product_id => $num_size) {
      
      $cart_st = $pdo->prepare("SELECT * FROM products WHERE product_id = ?");
      $cart_st->execute(array($product_id));
      $cart_st->setFetchMode(PDO::FETCH_ASSOC);
      $cart_row = $cart_st->fetch();
      $cart_st->closeCursor();
      $body .= "商品名: {$cart_row['name']}\n"
            . "単価: {$cart_row['price']} 円\n"
            . "数量: $num_size[0]\n\n";

      $cart_row['num'] = $num_size[0];
      $sum += $num_size[0] * $cart_row['price']; 
      if(isset($num_size[1])) {
        $cart_row['size'] = $num_size[1];
      }
      $cart_rows[] = $cart_row;
      }
      // $from = "test";
      // $pfrom = "-f $from";
      // $to = "example@mail.com";

      // mb_send_mail($to, "購入メール", $body, "From: $from", $pfrom);
      require 'views/v_buy_check.php';
      exit();
    }
  }

  require 'views/v_buy.php';
?>

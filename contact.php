<?php
  session_start();

$errors = [];
$name = '';
$email = '';
$tel = '';
$title = '';
$message = '';

if(isset($_POST['check'])){
  $pdo = new PDO("mysql:dbname=knit_shop", "root");
  $contact_st = $pdo->prepare("INSERT INTO contacts(name)VALUES(:name)");
  $contact_st->bindParam(':name', $posts['name'], PDO::PARAM_STR);
  $contact = $contact_st->execute();

  // , tel, mail, title, message
  // :tel, :mail, :title, :message,
  require 'views/v_contact_complete.php';
  exit();
}


if(isset($_POST['submit'])) {

  $posts['name'] = htmlspecialchars($_POST['name']);
  $posts['email'] = htmlspecialchars($_POST['email']);
  $posts['tel'] = htmlspecialchars($_POST['tel']);
  $posts['title'] = htmlspecialchars($_POST['title']);
  $posts['message'] = htmlspecialchars($_POST['message']);

  foreach($posts as $key => $val) {
    if(!$val) {
      switch($key) {
        case 'name':
        array_push($errors, 'お名前を入力してください。');
        break;
        case 'email':
        array_push($errors, 'メールアドレスを入力してください。');
        break;
        case 'tel':
        array_push($errors, '電話番号を入力してください。');
        break;
        case 'title':
        array_push($errors, '件名を入力してください。');
        break;
        case 'message':
        array_push($errors, 'お問い合わせ内容を入力してください。');
        break;
      }
    }

    if($key == 'tel') {
      if(preg_match('/[^\d-]/', $val)) {
        array_push($errors, '電話番号が正しくありません。');
      }
    }
  }

  if(empty($errors)) {
    
    require 'views/v_contact_check.php';
    exit();
  }
}

require 'views/v_contact.php';
?>
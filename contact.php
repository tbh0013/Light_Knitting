<?php
require_once 'initiallization.php';

$page_check = 0;

if (isset($_POST['submit_check'])){

    $posts['name'] = htmlspecialchars($_POST['name']);
    $posts['mail'] = htmlspecialchars($_POST['mail']);
    $posts['tel'] = htmlspecialchars($_POST['tel']);
    $posts['title'] = htmlspecialchars($_POST['title']);
    $posts['message'] = htmlspecialchars($_POST['message']);

    $pdo = new PDO("mysql:dbname=knit_shop", "root");
    $contact_st = $pdo->prepare("INSERT INTO contacts(name, tel, mail, title, message)VALUES(:name, :tel, :mail, :title, :message)");
    $contact_st->bindParam(':name', $posts['name'], PDO::PARAM_STR);
    $contact_st->bindParam(':tel', $posts['tel'], PDO::PARAM_INT);
    $contact_st->bindParam(':mail', $posts['mail'], PDO::PARAM_STR);
    $contact_st->bindParam(':title', $posts['title'], PDO::PARAM_STR);
    $contact_st->bindParam(':message', $posts['message'], PDO::PARAM_STR);

    $contact = $contact_st->execute();

    require_once 'views/v_contact_complete.php';
    exit();
}


if (isset($_POST['submit'])) {

    $posts['name'] = htmlspecialchars($_POST['name']);
    $posts['mail'] = htmlspecialchars($_POST['mail']);
    $posts['tel'] = htmlspecialchars($_POST['tel']);
    $posts['title'] = htmlspecialchars($_POST['title']);
    $posts['message'] = htmlspecialchars($_POST['message']);

    foreach ($posts as $key => $val) {
        if (!$val) {
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

        if ($key == 'tel') {
            if (preg_match('/[^\d-]/', $val)) {
                array_push($errors, '電話番号が正しくありません。');
            }
        }
    }

        if (empty($errors)) {
            $page_check = 1;
            require_once 'views/v_contact.php';
            exit();
        }
}

require_once 'views/v_contact.php';
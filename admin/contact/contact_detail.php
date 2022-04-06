<?php

require_once '../initiallization.php';

if ($_SESSION['admin_login'] === false) {
    header("Location: ./../index.php");
    exit();
}

$contact_id = htmlspecialchars($_GET['contact_id'], ENT_QUOTES, 'utf-8');

$contact_st = $pdo->query("SELECT * FROM contacts WHERE contact_id = $contact_id");
$contact_st->setFetchMode(PDO::FETCH_ASSOC);
$contact_list = $contact_st->fetchAll();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <title>お問い合わせ内容</title>
    </head>

    <body>
        <header>
            <div class="container">
                <h1 class="text-center">管理画面</h1>
            </div>
        </header>

        <main style="min-height: 100vh;">
            <div class="wrapper">
                <div class="container table-responsive">
                    <h2 class="text-center mt-3">お問い合わせ一覧</h2>
                    <div class="container d-flex justify-content-between">
                        <button onclick="location.href = '../menu.php'" class="mt-3">メニューに戻る</button>
                        <button onclick="location.href = 'contact_list.php'" class="mt-3">お問い合わせ一覧に戻る</button>
                    </div>
                    <table class="table border-dark mx-auto">
                        <thead>
                            <tr class="text-nowrap">
                                <th>お問い合わせID</th>
                                <th>名前</th>
                                <th>電話番号</th>
                                <th>メールアドレス</th>
                                <th>タイトル</th>
                                <th>お問い合わせ内容</th>
                                <th>削除フラグ</th>
                                <th>作成日</th>
                                <th>更新日</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($contact_list as $contact) : ?>
                                <tr>
                                    <td><?php echo $contact['contact_id']; ?></td>
                                    <td><?php echo $contact['name']; ?></td>
                                    <td><?php echo $contact['tel']; ?></td>
                                    <td><?php echo $contact['mail']; ?></td>
                                    <td><?php echo $contact['title']; ?></td>
                                    <td><?php echo $contact['message']; ?></td>
                                    <td><?php echo $contact['is_deleted'];?></td>
                                    <td><?php echo $contact['created_at']; ?></td>
                                    <td><?php echo $contact['updated_at']; ?></td>
                                <tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <footer class="container-fluid d-flex justify-content-center align-items-center">
            <p class="m-0">(C)2021 Light Knitting.</p>
        </footer>
    </body>
</html>
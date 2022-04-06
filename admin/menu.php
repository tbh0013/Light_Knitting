<?php

require_once './initiallization.php';

if ($_SESSION['admin_login'] === false) {
    header("Location: ./index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <title>管理画面メニュー</title>
    </head>

    <body>
        <header>
            <div class="container">
                <h1 class="text-center">管理画面メニュー</h1>
            </div>
        </header>

        <main style="min-height: 100vh;">
            <div class="wrapper">
                <div class="container d-flex flex-column justify-content-center col-md-4">
                    <button onclick="location.href = 'product/product_list.php'" class="m-3">商品一覧</button>
                    <button onclick="location.href = 'news/news_list.php'" class="m-3">お知らせ一覧</button>
                    <button onclick="location.href = 'category/category_list.php'" class="m-3">カテゴリ一覧</button>
                    <button onclick="location.href = 'contact/contact_list.php'" class="m-3">お問い合わせ一覧</button>
                    <button onclick="location.href = 'order/order_list.php'" class="m-3">購入履歴一覧</button>
                    <button onclick="location.href = 'logout.php'" class="m-3">ログアウト</button>
                </div>
            </div>
        </main>

        <footer class="container-fluid d-flex justify-content-center align-items-center">
            <p class="m-0">(C)2021 Light Knitting.</p>
        </footer>
    </body>
</html>

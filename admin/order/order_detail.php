<?php

require_once '../initiallization.php';

$order_id = htmlspecialchars($_GET['order_id'], ENT_QUOTES, 'utf-8');

$order_sql = "SELECT
                order_details.order_id,
                order_details.order_detail_id,
                order_details.product_id,
                order_details.product_size_id,
                order_details.quantity,
                order_details.created_at,
                order_details.updated_at,
                products.name,
                sizes.size_id,
                sizes.size_name
                FROM order_details
                LEFT JOIN products
                ON order_details.product_id = products.product_id
                LEFT JOIN product_sizes
                ON order_details.product_size_id = product_sizes.product_size_id
                LEFT JOIN sizes
                ON product_sizes.size_id = sizes.size_id
                WHERE order_details.order_id = {$order_id}";

$order_st = $pdo->query($order_sql);
$order_st->setFetchMode(PDO::FETCH_ASSOC);
$order_list = $order_st->fetchAll();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <title>購入履歴一覧</title>
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
                    <h2 class="text-center mt-3">購入詳細</h2>
                    <div class="container d-flex justify-content-between">
                        <button onclick="location.href = '../index.php'" class="mt-3">ページトップ</button>
                        <button onclick="location.href = 'order_list.php'" class="mt-3">購入一覧に戻る</button>
                    </div>
                    <table class="table border-dark mx-auto">
                        <thead>
                            <tr class="text-nowrap">
                                <th>注文ID</th>
                                <th>注文明細ID</th>
                                <th>商品ID</th>
                                <th>商品サイズID</th>
                                <th>数量</th>
                                <th>作成日</th>
                                <th>更新日</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($order_list as $order) : ?>
                                <tr>
                                    <td><?php echo $order['order_id']; ?></td>
                                    <td><?php echo $order['order_detail_id']; ?></td>
                                    <td><?php echo $order['product_id'].' : ('.$order['name'].')'; ?></td>
                                    <td><?php echo $order['product_size_id']?> <?php echo $order['size_name'] != null ? ": (".$order['size_name'].")" : ": (FREE)"; ?></td>
                                    <td><?php echo $order['quantity']; ?></td>
                                    <td><?php echo $order['created_at']; ?></td>
                                    <td><?php echo $order['updated_at']; ?></td>
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
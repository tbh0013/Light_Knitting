<?php

require_once '../initiallization.php';

if ($_SESSION['admin_login'] === false) {
    header("Location: ./../index.php");
    exit();
}

$order_id = htmlspecialchars($_GET['order_id'], ENT_QUOTES, 'utf-8');


$order_st = $pdo->query("SELECT * FROM orders WHERE order_id = {$order_id} ORDER BY updated_at DESC");
$order_st->setFetchMode(PDO::FETCH_ASSOC);
$order_list = $order_st->fetchAll();

$order_detail_sql = "SELECT
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

$order_detail_st = $pdo->query($order_detail_sql);
$order_detail_st->setFetchMode(PDO::FETCH_ASSOC);
$order_detail_list = $order_detail_st->fetchAll();

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
                        <button onclick="location.href = '../menu.php'" class="mt-3">メニューに戻る</button>
                        <button onclick="location.href = 'order_list.php'" class="mt-3">購入一覧に戻る</button>
                    </div>
                    <table class="table table-resposive border-dark mx-auto mt-5">
                        <?php foreach($order_list as $order) : ?>
                            <tr>
                                <td><?php echo '更新日'; ?></td>
                                <td><?php echo $order['updated_at']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo '注文ID'; ?></td>
                                <td><?php echo $order['order_id']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo 'お客様名'; ?></td>
                                <td><?php echo $order['customer_name']; ?></td>
                            </tr>
                            <tr>
                                <td class="text-nowrap"><?php echo 'メールアドレス'; ?></td>
                                <td><?php echo $order['mail']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo '郵便番号'; ?></td>
                                <td><?php echo $order['post_code']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo '住所'; ?></td>
                                <td><?php echo $order['address']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo '電話番号'; ?></td>
                                <td><?php echo $order['tel']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo '削除フラグ'?></td>
                                <td><?php echo $order['is_deleted']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <table class="table table-resposive border-dark mx-auto mt-5">
                        <?php foreach($order_detail_list as $order_detail) : ?>
                            <tr>
                                <td><?php echo '注文明細ID'; ?></td>
                                <td><?php echo $order_detail['order_detail_id']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo '商品ID'; ?></td>
                                <td><?php echo $order_detail['product_id'].' : ('.$order_detail['name'].')'; ?></td>
                            </tr>
                            <tr>
                                <td class="text-nowrap"><?php echo '商品サイズID'; ?></td>
                                <td><?php echo $order_detail['product_size_id']?> <?php echo $order_detail['size_name'] != null ? ": (".$order_detail['size_name'].")" : ": (FREE)"; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo '数量'; ?></td>
                                <td><?php echo $order_detail['quantity'] ?></td>
                            </tr>
                            <tr>
                                <td><?php echo '作成日'; ?></td>
                                <td><?php echo $order_detail['created_at'] ?></td>
                            </tr>
                            <tr>
                                <td><?php echo '更新日'; ?></td>
                                <td><?php echo $order_detail['updated_at'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </main>

        <footer class="container-fluid d-flex justify-content-center align-items-center">
            <p class="m-0">(C)2021 Light Knitting.</p>
        </footer>

    </body>
</html>
<?php

require_once '../initiallization.php';

if ($_SESSION['admin_login'] === false) {
    header("Location: ./../index.php");
    exit();
}

$order_st = $pdo->query('SELECT * FROM orders ORDER BY updated_at DESC');
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
                    <h2 class="text-center mt-3">購入履歴一覧</h2>
                    <div class="container d-flex justify-content-between">
                        <button onclick="location.href = '../menu.php'" class="mt-3">メニューに戻る</button>
                    </div>
                    <table class="table border-dark mx-auto">
                        <thead>
                            <tr class="text-nowrap">
                                <th>更新日</th>
                                <th>注文ID</th>
                                <th>お客様名</th>
                                <th>削除フラグ</th>
                                <th>作成日</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($order_list as $order) : ?>
                                <tr class="text-nowrap">
                                    <td><?php echo $order['updated_at']; ?></td>
                                    <td><?php echo $order['order_id']; ?></td>
                                    <td><?php echo $order['customer_name']; ?></td>
                                    <td><?php echo $order['is_deleted'] ? '有効' : '無効'; ?></td>
                                    <td><?php echo $order['created_at']; ?></td>
                                    <td class="text-nowrap"><button onclick="location.href = 'order_detail.php?order_id=<?php echo $order['order_id']; ?>'">詳細</button></td>
                                    <td class="text-nowrap"><?php if ($order['is_deleted'] == '0') : ?>
                                            <button class="delete" data-id="<?php echo $order['order_id']; ?>">削除</button>
                                        <?php elseif ($order['is_deleted'] == '1') : ?>
                                            <button class="cancel" data-id="<?php echo $order['order_id']; ?>">削除キャンセル</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <footer class="container-fluid d-flex justify-content-center align-items-center">
            <p class="m-0">(C)2021 Light Knitting.</p>
        </footer>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(".delete").click(function(){
                var order_id = this.dataset.id;
                if(confirm("ニュースID:"+order_id+"に削除フラグを有効にします。よろしいでしょうか？")) {
                    window.location.href = "delete_flag_order.php?order_id="+order_id;
                }else{
                    return false;
                }
            })
        </script>
        <script>
            $(".cancel").click(function(){
                var order_id = this.dataset.id;
                if(confirm("ニュースID:"+order_id+"の削除フラグを無効にします。よろしいでしょうか？")) {
                    window.location.href = "delete_flag_order.php?order_id="+order_id;
                }else{
                    return false;
                }
            })
        </script>
    </body>
</html>
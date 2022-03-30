<?php

require_once '../initiallization.php';

$product_st = $pdo->query('SELECT * FROM products ORDER BY updated_at DESC');
$product_st->setFetchMode(PDO::FETCH_ASSOC);
$product_list = $product_st->fetchAll();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <title>商品一覧</title>
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
                    <h2 class="text-center mt-3">商品一覧</h2>
                    <div class="container d-flex justify-content-between">
                        <button onclick="location.href = '../index.php'" class="mt-3">ページトップ</button>
                        <button onclick="location.href = 'create_product.php'" class="mt-3">追加する</button>
                    </div>
                    <table class="table border-dark mx-auto">
                        <thead>
                            <tr class="text-nowrap">
                                <th>更新日</th>
                                <th>商品ID</th>
                                <th>商品名</th>
                                <th>ラインナップフラグ</th>
                                <th>削除フラグ</th>
                                <th>作成日</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($product_list as $product) : ?>
                                <tr>
                                    <td><?php echo $product['updated_at']; ?></td>
                                    <td><?php echo $product['product_id']; ?></td>
                                    <td><?php echo $product['name']; ?></td>
                                    <td><?php echo $product['is_line_up'] ? '有効' : '無効'; ?></td>
                                    <td><?php echo $product['is_deleted'] ? '有効' : '無効'; ?></td>
                                    <td><?php echo $product['created_at']; ?></td>
                                    <td><button onclick="location.href = 'edit_product.php?product_id=<?php echo $product['product_id']; ?>'">詳細・編集</button></td>
                                    <td><button class="delete" data-id=<?php echo $product['product_id']; ?>>削除</button></td>
                                    <td><button class="cancel" data-id=<?php echo $product['product_id']; ?>>削除キャンセル</button></td>

                                <tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <footer class="container-fluid d-flex justify-content-center align-items-center" style="height: 100px;">
            <p class="m-0">(C)2021 Light Knitting.</p>
        </footer>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(".delete").click(function(){
                var product_id = this.dataset.id;
                if(confirm("商品ID:"+product_id+"に削除フラグを有効にします。よろしいでしょうか？")) {
                    window.location.href = "delete_flag_product.php?product_id="+product_id;
                }else{
                    return false;
                }
            })
            $(".cancel").click(function(){
                var product_id = this.dataset.id;
                if(confirm("商品ID:"+product_id+"の削除フラグを無効にします。よろしいでしょうか？")) {
                    window.location.href = "delete_flag_product.php?product_id="+product_id;
                }else{
                    return false;
                }
            })
        </script>
    </body>
</html>


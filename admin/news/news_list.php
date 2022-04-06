<?php

require_once '../initiallization.php';

if ($_SESSION['admin_login'] === false) {
    header("Location: ./../index.php");
    exit();
}

$news_st = $pdo->query('SELECT * FROM news ORDER BY updated_at DESC');
$news_st->setFetchMode(PDO::FETCH_ASSOC);
$news_list = $news_st->fetchAll();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <title>ニュース一覧</title>
    </head>

    <body>
        <header>
            <div class="container">
                <h1 class="text-center">管理画面</h1>
            </div>
        </header>

        <main style="min-height: calc(100vh - 100px);">
            <div class="wrapper">
                <div class="container table-responsive">
                    <h2 class="text-center mt-3">ニュース一覧</h2>
                    <div class="container d-flex justify-content-between">
                        <button onclick="location.href = '../menu.php'" class="mt-3">メニューに戻る</button>
                        <button onclick="location.href = 'create_news.php'" class="mt-3">追加する</button>
                    </div>
                    <table class="table border-dark mx-auto">
                        <thead>
                            <tr class="text-nowrap">
                                <th>更新日</th>
                                <th>ニュースid</th>
                                <th>商品id</th>
                                <th>タイトル</th>
                                <th>削除フラグ</th>
                                <th>作成日</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($news_list as $news) : ?>
                                <tr>
                                    <td><?php echo $news['updated_at']; ?></td>
                                    <td><?php echo $news['news_id']; ?></td>
                                    <td><?php echo $news['product_id']; ?></td>
                                    <td><?php echo $news['title']; ?></td>
                                    <td><?php echo $news['is_deleted'] ? '有効' : '無効'; ?></td>
                                    <td><?php echo $news['created_at']; ?></td>
                                    <td class="text-nowrap"><button onclick="location.href = 'edit_news.php?news_id=<?php echo $news['news_id']; ?>'">詳細・編集</button></td>
                                    <td class="text-nowrap"><?php if ($news['is_deleted'] === '0') : ?>
                                            <button class="delete" data-id="<?php echo $news['news_id']; ?>">削除</button>
                                        <?php elseif ($news['is_deleted'] === '1') : ?>
                                            <button class="cancel" data-id="<?php echo $news['news_id']; ?>">削除キャンセル</button>
                                        <?php endif; ?>
                                    </td>
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(".delete").click(function(){
                var news_id = this.dataset.id;
                if(confirm("ニュースID:"+news_id+"に削除フラグを有効にします。よろしいでしょうか？")) {
                    window.location.href = "delete_flag_news.php?news_id="+news_id;
                }else{
                    return false;
                }
            })
            $(".cancel").click(function(){
                var news_id = this.dataset.id;
                if(confirm("ニュースID:"+news_id+"の削除フラグを無効にします。よろしいでしょうか？")) {
                    window.location.href = "delete_flag_news.php?news_id="+news_id;
                }else{
                    return false;
                }
            })
        </script>
    </body>
</html>
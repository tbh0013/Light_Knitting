<?php

require_once '../initiallization.php';

if ($_SESSION['admin_login'] === false) {
    header("Location: ./../index.php");
    exit();
}

$errors = isset($_SESSION['flash']['errors'])
            ? $_SESSION['flash']['errors']
            : array();
unset($_SESSION['flash']['errors']);

$news_id = htmlspecialchars($_GET['news_id'], ENT_QUOTES, 'utf-8');

$news_st = $pdo->prepare("SELECT * FROM news WHERE news_id = $news_id");
$news_st->execute();
$news_list = $news_st->fetchAll(PDO::FETCH_ASSOC);

$product_st = $pdo->prepare("SELECT product_id, name FROM products");
$product_st->execute();
$products = $product_st->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <title>編集</title>
    </head>

    <body>
        <header>
            <div class="container">
                <h1 class="text-center">管理画面</h1>
            </div>
        </header>

        <main style="min-height: 100vh;">
            <div class="wrapper">
                <div class="container">
                    <h2 class="text-center mt-3">ニュース詳細・編集</h2>
                    <div class="container d-flex justify-content-between">
                        <button onclick="location.href = '../menu.php'" class="mt-3">メニューに戻る</button>
                        <button onclick="location.href = 'news_list.php'" class="mt-3">ニュース一覧に戻る</button>
                    </div>
                    <?php if (!empty($errors)) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <?php echo "<span class=\"error\" style=\"color: red;\">{$error}</span><br>"; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <form action="update_news.php" method="POST" enctype="multipart/form-data">
                        <?php foreach($news_list as $news) : ?>
                            <input type="hidden" name="news_id" value="<?php echo $news['news_id']; ?>">
                            <div class="form_item mb-3">
                                <p class="mb-0">お知らせ日</p>
                                <input type="date" name="date" class="w-100" value="<?php echo $news['date']; ?>" required>
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">タイトル</p>
                                <input type="text" name="title" class="w-100" value="<?php echo $news['title']; ?>" required>
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">本文</p>
                                <textarea name="text" class="w-100"><?php echo ($news['text']); ?></textarea>
                            </div>
                            <div class="main_img_edit d-flex flex-wrap my-3 text-break">
                                <div class="main_img_view">
                                    <p>現在登録しているメイン画像<br>
                                        <?php echo $news['image_path']; ?>
                                    </p>
                                    <img  class="col-6 col-sm-4 col-md-4" onerror="this.src='./../img/no_image.png'" src="<?php if (isset($news['image_path']) && $news['image_path'] !== "") : ?>
                                                                                    <?php echo "./../img/{$news['image_path']}"; ?>
                                                                                <?php else : ?>
                                                                                    <?php echo "./../img/no_image.png"; ?>
                                                                                <?php endif; ?>">
                                    <div><lavel><input type="checkbox" name="delete_main_file" value="delete">現在の画像を取り消す</lavel></div>
                                </div>
                                <div class="form_item mt-3">
                                    <p class="mb-0">画像パス</p>
                                    <input type="file" name="image_path" class="w-100 text-center" value="<?php echo $product['image_path']; ?>">
                                </div>
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">商品ID</p>
                                <select name="product_id" class="w-100">
                                    <option value="">0 : (なし)</option>
                                    <?php foreach($products as $product) : ?>
                                        <option value="<?php echo $product['product_id'] ?>" <?php if($product['product_id'] === $news['product_id']) { echo 'selected'; } ?>>
                                            <?php echo $product['product_id'].' : ('.$product['name'].')'; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">url</p>
                                <input type="url" name="url" class="w-100" value="<?php echo $news['url']; ?>" >
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">作成日</p>
                                <p><?php echo $news['created_at']; ?></p>
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">更新日</p>
                                <p><?php echo $news['updated_at']; ?></p>
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" class="mt-3">更新する</button>
                    </form>
                </div>
            </div>
        </main>

        <footer class="container-fluid d-flex justify-content-center align-items-center">
            <p class="m-0">(C)2021 Light Knitting.</p>
        </footer>
    </body>
</html>
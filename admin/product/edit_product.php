<?php

require_once '../initiallization.php';

$errors = isset($_SESSION['flash']['errors'])
            ? $_SESSION['flash']['errors']
            : array();
unset($_SESSION['flash']['errors']);

$product_id = htmlspecialchars($_GET['product_id'], ENT_QUOTES, 'utf-8');

$product_st = $pdo->prepare("SELECT * FROM products WHERE product_id = $product_id");
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
        <title>詳細・編集</title>
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
                    <h2 class="text-center mt-3">商品詳細・編集</h2>
                    <div class="container d-flex justify-content-between">
                        <button onclick="location.href = '../index.php'" class="mt-3">ページトップ</button>
                        <button onclick="location.href = 'product_list.php'" class="mt-3">商品一覧に戻る</button>
                    </div>
                    <?php if (!empty($errors)) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <?php echo "<span class=\"error\" style=\"color: red;\">{$error}</span><br>"; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <form action="update_product.php" method="POST">
                        <?php foreach($products as $product) : ?>
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <div class="form_item mb-3">
                                <p class="mb-0">商品名</p>
                                <input type="text" name="name" class="w-100" value="<?php echo $product['name']; ?>" required>
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">値段</p>
                                <input type="text" name="price" class="w-100" value="<?php echo $product['price']; ?>" required>
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">カテゴリーID</p>
                                <input type="text" name="category" class="w-100" value="<?php echo $product['category_id']; ?>" required>
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">画像パス</p>
                                <input type="text" name="image_path" class="w-100" value="<?php echo $product['image_path']; ?>">
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">サブ画像パス</p>
                                <input type="text" name="sub_image_path" class="w-100" value="<?php echo $product['sub_image_path']; ?>">
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">商品説明</p>
                                <textarea name="description" class="w-100"><?php echo ($product['description']); ?></textarea>
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">ラインナップフラグ(1=有効,0=無効)</p>
                                <input type="text" name="is_line_up" class="w-100" value="<?php echo $product['is_line_up']; ?>">
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">作成日</p>
                                <p><?php echo $product['created_at']; ?></p>
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">更新日</p>
                                <p><?php echo $product['updated_at']; ?></p>
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
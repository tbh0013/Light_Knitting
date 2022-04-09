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

$product_id = $_GET['product_id'];

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
                        <button onclick="location.href = '../menu.php'" class="mt-3">メニューに戻る</button>
                        <button onclick="location.href = 'product_list.php'" class="mt-3">商品一覧に戻る</button>
                    </div>
                    <?php if (!empty($errors)) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <?php echo "<span class=\"error\" style=\"color: red;\">{$error}</span><br>"; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <form action="update_product.php" method="POST" enctype="multipart/form-data">
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
                                <select name="category" class="w-100" required>
                                    <?php foreach($category_list as $category) : ?>
                                        <option value="<?php echo $category['category_id'] ?>" <?php if($category['category_id'] === $product['category_id']) { echo 'selected'; } ?>>
                                            <?php echo $category['category_id'].' : ('.$category['name'].')'; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="edit_img d-flex flex-column flex-md-row text-center text-break">
                                <div class="main_img_edit d-flex flex-wrap my-3">
                                    <div class="main_img_view">
                                        <p class="m-0">現在登録しているメイン画像<br>
                                            <?php echo $product['image_path']; ?>
                                        </p>
                                        <img  class="col-6 col-sm-4 col-md-5" onerror="this.src='./../img/no_image.png'" src="<?php if (isset($product['image_path']) && $product['image_path'] !== "") : ?>
                                                                                        <?php echo "./../img/{$product['image_path']}"; ?>
                                                                                    <?php else : ?>
                                                                                        <?php echo "./../img/no_image.png"; ?>
                                                                                    <?php endif; ?>">
                                    </div>
                                    <div class="form_item mt-3 mx-auto">
                                        <p class="mb-0">画像パス</p>
                                        <input type="file" name="image_path" class="w-100 text-center" value="<?php echo $product['image_path']; ?>">
                                    </div>
                                </div>
                                <div class="sub_img_edit d-flex flex-wrap my-3">
                                    <div class="sub_img_view">
                                        <p class="m-0">現在登録しているサブ画像<br>
                                            <?php echo $product['sub_image_path']; ?>
                                        </p>
                                        <img  class="col-6 col-sm-4 col-md-5" onerror="this.src='./../img/no_image.png'" src="<?php if (isset($product['sub_image_path']) && $product['sub_image_path'] !== "") : ?>
                                                                                        <?php echo "./../img/{$product['sub_image_path']}"; ?>
                                                                                    <?php else : ?>
                                                                                        <?php echo "./../img/no_image.png"; ?>
                                                                                    <?php endif; ?>">
                                    </div>
                                    <div class="form_item mt-3 mx-auto">
                                        <p class="mb-0">サブ画像パス</p>
                                        <input type="file" name="sub_image_path" class="w-100" value="<?php echo $product['sub_image_path']; ?>">
                                    </div>
                                </div>
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
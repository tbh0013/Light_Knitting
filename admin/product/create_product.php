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

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <title>商品追加</title>
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
                    <h2 class="text-center mt-3">商品追加</h2>
                    <div class="container d-flex justify-content-between">
                        <button onclick="location.href = '../menu.php'" class="mt-3">メニューに戻る</button>
                        <button onclick="location.href = 'product_list.php'" class="mt-3">商品一覧に戻る</button>
                    </div>
                    <?php if (!empty($errors)) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <?php echo "<span class=\"error\" style=\"color: red;\">{$error}</span><br>"; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <form action="storage_product.php" method="POST" enctype="multipart/form-data">
                        <div class="form_item mb-3">
                            <p class="mb-0">商品名</p>
                            <input type="text" name="name" placeholder="20文字以内で入力してください。" class="w-100" required>
                        </div>
                        <div class="form_item mb-3">
                            <p class="mb-0">値段</p>
                            <input type="text" name="price" class="w-100" required>
                        </div>
                        <div class="form_item mb-3">
                            <p class="mb-0">カテゴリーID</p>
                            <select name="category" class="w-100" required>
                                <?php foreach($category_list as $category) : ?>
                                    <option value="<?php echo $category['category_id'] ?>">
                                    <?php echo $category['category_id'].' : ('.$category['name'].')'; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form_item mb-3">
                            <p class="mb-0">メイン画像ファイル</p>
                            <input type="file" name="image_path" class="w-100">
                        </div>
                        <div class="form_item mb-3">
                            <p class="mb-0">サブ画像ファイル</p>
                            <input type="file" name="sub_image_path" class="w-100">
                        </div>
                        <div class="form_item mb-3">
                            <p class="mb-0">商品説明</p>
                            <textarea name="description" placeholder="50文字以内で入力してください。" class="w-100"></textarea>
                        </div>
                        <div class="form_item mb-3">
                            <p class="mb-0">ラインナップフラグ(1=有効,0=無効)</p>
                            <input type="text" placeholder="1=有効,0=無効" pattern="/^[0-1]{1})$/" name="is_line_up" class="w-100" required>
                        </div>
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

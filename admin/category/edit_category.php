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

$category_id = htmlspecialchars($_GET['category_id'], ENT_QUOTES, 'utf-8');

$category_st = $pdo->prepare("SELECT * FROM categories WHERE category_id = $category_id");
$category_st->execute();
$category_list = $category_st->fetchAll(PDO::FETCH_ASSOC);

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
                    <h2 class="text-center mt-3">カテゴリー編集</h2>
                    <div class="container d-flex justify-content-between">
                        <button onclick="location.href = '../menu.php'" class="mt-3">メニューに戻る</button>
                        <button onclick="location.href = 'category_list.php'" class="mt-3">カテゴリー一覧に戻る</button>
                    </div>
                    <?php if (!empty($errors)) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <?php echo "<span class=\"error\" style=\"color: red;\">{$error}</span><br>"; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <form action="update_category.php" method="POST">
                        <?php foreach($category_list as $category) : ?>
                            <input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>">
                            <input type="hidden" name="is_deleted" value="<?php echo $category['is_deleted']; ?>">
                            <div class="form_item mb-3">
                                <p class="mb-0">カテゴリー名</p>
                                <input type="text" name="name" class="w-100" value="<?php echo $category['name']; ?>" required>
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">作成日</p>
                                <p><?php echo $category['created_at']; ?></p>
                            </div>
                            <div class="form_item mb-3">
                                <p class="mb-0">更新日</p>
                                <p><?php echo $category['updated_at']; ?></p>
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
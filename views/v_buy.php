<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
        <title>購入者情報入力 - Light Knitting</title>
    </head>

    <body>
        <div id="wrapper">
            <header class="sticky-top">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <h1 class="d-flex align-items-center m-0 w-50"><a class="navbar-brand m-0" href="index.php"><img src="img/Light_Knitting_logo.png" alt="Light Knitting" class=" img-fluid"></a></h1>
                            <li class="list-unstyled d-flex flex-row-reverse"><a class="nav-link p-0 d-lg-none" href="cart.php"><img src="img/cart.png" class="rounded float-end m-2"></a>
                            <button class="navbar-toggler p-0" style="border: 0;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            </li>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav ms-auto align-items-center fs-4">
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.php">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="news.php">News</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.php">Contact</a>
                                    </li>
                                    <li class="nav-item dropdown align-items-center text-center">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Items
                                        </a>
                                        <ul class="dropdown-menu border-0 p-0 text-center fs-5" aria-labelledby="navbarDropdownMenuLink" style="background-color: #FFFFCC;">
                                            <li><a class="dropdown-item" href="items.php">ALL</a></li>
                                            <li><a class="dropdown-item" href="items.php?category_id=1">socks</a></li>
                                            <li><a class="dropdown-item" href="items.php?category_id=2">knit hat</a></li>
                                            <li><a class="dropdown-item" href="items.php?category_id=3">gloves</a></li>
                                            <li><a class="dropdown-item" href="items.php?category_id=4">bag</a></li>
                                            <li><a class="dropdown-item" href="items.php?category_id=5">stall</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">ログイン</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">会員登録</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <li class="list-unstyled"><a class="nav-link p-0 d-none d-lg-block" href="cart.php"><img src="img/cart.png"></a></li>
                    </nav>
                </div>
            </header><!--header-->
            
            <main style="min-height: calc(100vh - 100px);">
            <h2 id="item_heading" class="text-center p-3">
                <?php if ($page_check == 1) : ?>
                    入力内容確認
                <?php else : ?>
                    お客様情報入力
                <?php endif; ?>
                </h2>
                <div class="container">
                    <?php if(!empty($errors)) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <?php echo "<span class=\"error\" style=\"color: red;\">{$error}</span><br>"; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if ($page_check == 1) : ?>
                        <p class="text-center">下記の通り注文致します。よろしいでしょうか。</p>
                        <form action="buy.php" method="post" class="row d-flex flex-column">
                            <div class="table-responsive">
                                <table class="table border-dark mx-auto text-center">
                                    <thead class="table-light">
                                    <tr class="d-md-none" style="white-space: nowrap;"><td class="fs-4"><strong><u>合計</strong> ￥<?php echo $sum; ?> </u></td></tr>
                                        <tr style="white-space: nowrap;"><th scope="col">商品名</th><th scope="col">単価</th><th scope="col">数量</th><th scope="col">サイズ</th><th scope="col">小計</th></tr>
                                    </thead>
                                        <?php foreach ($cart_rows as $cart) : ?>
                                            <tr>
                                                <td><?php echo $cart['p_name']; ?></td>
                                                <input type="hidden" name="product_name" value="<?php echo $cart['p_name']; ?>">
                                                <td><?php echo $cart['price']; ?></td>
                                                <input type="hidden" name="price" value="<?php echo $cart['p_name']; ?>">
                                                <td><?php echo $cart['num']; ?></td>
                                                <input type="hidden" name="num" value="<?php echo $cart['num']; ?>">
                                                <td><?php if (isset($cart['size'])) : ?>
                                                        <?php echo $cart['size']; ?>
                                                        <input type="hidden" name="product_size_id" value="<?php echo $cart['product_size_id']; ?>">
                                                    <?php else : ?>
                                                        <?php echo 'FREE'; ?> 
                                                        <input type="hidden" name="size" value="FREE">
                                                    <?php endif; ?>
                                                </td>
                                                <td>￥<?php echo $cart['price'] * $cart['num']; ?> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <tr class="d-none d-md-table-row"><td colspan='4'> </td><td class="fs-4"><strong>合計</strong> ￥<?php echo $cart['sum']; ?> </td></tr>
                                </table>
                                <table class="table border-dark mx-auto mt-5">
                                    <tr>
                                        <td><?php echo 'お名前'; ?></td>
                                        <td><?php echo $posts['name']; ?></td>
                                        <input type="hidden" name="customer_name" value="<?php echo $posts['name']; ?>">
                                    </tr>
                                    <tr>
                                        <td><?php echo 'メールアドレス'; ?></td>
                                        <td><?php echo $posts['mail']; ?></td>
                                        <input type="hidden" name="mail" value="<?php echo $posts['mail']; ?>">
                                    </tr>
                                    <tr>
                                        <td><?php echo '郵便番号'; ?></td>
                                        <td><?php echo  $posts['code']; ?></td>
                                        <input type="hidden" name="code" value="<?php echo $posts['code']; ?>">
                                    </tr>
                                    <tr>
                                        <td><?php echo 'ご住所'; ?></td>
                                        <td><?php echo  $posts['address']; ?></td>
                                        <input type="hidden" name="address" value="<?php echo $posts['address']; ?>">
                                    </tr>
                                    <tr>
                                        <td><?php echo '電話番号'; ?></td>
                                        <td><?php echo  $posts['tel']; ?></td>
                                        <input type="hidden" name="tel" value="<?php echo $posts['tel']; ?>">
                                    </tr>
                                </table>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="submit_check" value="注文を確定">
                            </div>
                        </form>
                        <div class="move d-flex flex-md-row flex-column justify-content-center">
                            <a href="buy.php" class="btn btn-outline-dark text-decoration-none m-3">購入者情報入力に戻る</a>
                            <a href="items.php" class="btn btn-outline-dark text-decoration-none m-3">お買い物に戻る</a>
                            <a href="cart_empty.php" class="btn btn-outline-dark text-decoration-none m-3">カートに戻る</a>
                        </div>
                    <?php else : ?>
                        <form action="buy.php" method="post" class="row d-flex flex-column">
                            <p class= "col-md-7 mx-auto">
                                お名前<br>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
                            </p>
                            <p class= "col-md-7 mx-auto">
                                メールアドレス<br>
                                <input type="email" name="mail" class="form-control" value="<?php echo $email; ?>" required>
                            </p>
                            <p class= "col-md-7 mx-auto">
                                郵便番号<br>
                                <input type="text" name="code" class="form-control" value="<?php echo $code; ?>" required>
                            </p>
                            <p class= "col-md-7 mx-auto">
                                ご住所<br>
                                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" required>
                            </p>
                            <p class= "col-md-7 mx-auto">
                                電話番号<br>
                                <input type="text" name="tel" class="form-control" value="<?php echo $tel; ?>" required>
                            </p>
                            <p class="mx-auto text-center">
                                <input type="submit" name="submit" class="px-4" value="確認">
                            </p>
                        </form>
                        <div class="move text-center">
                            <a href="items.php" class="btn btn-outline-dark text-decoration-none m-3">お買い物に戻る</a>
                            <a href="cart.php" class="btn btn-outline-dark text-decoration-none m-3">カートに戻る</a>
                        </div>
                    <?php endif; ?>
                </div>
            </main>
            
            <footer class="container-fluid d-flex justify-content-center align-items-center">
                <p class="m-0">(C)2021 Light Knitting.</p>
            </footer>
        </div><!--#wrapper-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
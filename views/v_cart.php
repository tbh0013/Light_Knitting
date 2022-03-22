<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
        <title>カート - Light Knitting</title>
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
                        <li class="list-unstyled"><a class="nav-link p-0  d-none d-lg-block" href="cart.php"><img src="img/cart.png"></a></li>
                    </nav>
                </div>
            </header><!--header-->

        <main style="min-height: calc(100vh - 100px);">
            <div id="cart_main_container" class="text-center">
                <h2 id="item_heading" class="text-center p-3">カートを確認</h2>
                <div class="container">
                    <div class="table-responsive">
                        <table class="table border-dark mx-auto">
                            <thead class="table-light">
                                <tr class="d-md-none" style="white-space: nowrap;"><td class="fs-4"><strong><u>合計</strong> ￥<?php echo $sum; ?> </u></td></tr>
                                <tr style="white-space: nowrap;"><th scope="col">商品名</th><th scope="col">単価</th><th scope="col">数量</th><th scope="col">サイズ</th><th scope="col">小計</th></tr>
                            </thead>
                            <?php foreach ($cart_rows as $cart) : ?>
                                <tr>
                                    <td><?php echo $cart['name']; ?></td>
                                    <td>￥<?php echo $cart['price']; ?></td>
                                    <td><?php echo $cart['num']; ?></td>
                                    <td><?php if (isset($cart['size'])) : ?>
                                        <?php echo $cart['size']; ?>
                                        <?php else : ?>
                                            <?php echo 'FREE'; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>￥<?php echo "{$cart['price']}" * "{$cart['num']}"; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="d-none d-md-table-row"><td colspan="4"> </td><td class="fs-4"><strong>合計</strong> ￥<?php echo $sum; ?></td></tr>
                        </table>
                    </div>

                    <div class="move d-flex flex-column ms-auto col-md-4">
                        <?php if($can_buy) : ?>
                            <?php echo "<a href='buy.php' class='btn btn-outline-dark text-decoration-none m-3'>注文する</a>"; ?>
                        <?php endif; ?>
                        <a href="items.php" class="btn btn-outline-dark text-decoration-none m-3">お買い物に戻る</a>
                        <a href="cart_empty.php" class="btn btn-outline-dark text-decoration-none m-3">カートを空にする</a>
                    </div>
                </div>
            </div>
        </main>
    
        <footer class="container-fluid d-flex justify-content-center align-items-center">
            <p class="m-0">(C)2021 Light Knitting.</p>
        </footer>
        </div><!--#wrapper-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

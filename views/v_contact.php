<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
        <title>contact - Light Knitting</title>
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

            <main>
                <div id="contact_main_container" class="text-center">
                    <h2 id="contact_heading" class="text-decoration-underline">CONTACT</h2>
                    <div id="contact_form_container" class="container text-start p-lg-5">
                        <?php if($page_check == 1): ?>
                            <p class="text-center">下記の通り送信致します。よろしいでしょか。</p>
                            <form action="contact.php" method="post">
                                <dl class="row">
                                    <dt><label for="name">お名前</label></dt>
                                    <dd><p><?php echo $posts['name']; ?></dd>
                                    <input type="hidden" name="name" value="<?php echo $posts['name'] ?>">

                                    <dt><label for="tel">電話番号</label></dt>
                                    <dd><p><?php echo $posts['tel']; ?></dd>
                                    <input type="hidden" name="tel" value="<?php echo $posts['tel'] ?>">

                                    <dt><label for="email">メールアドレス</label></dt>
                                    <dd><p><?php echo $posts['mail']; ?></dd>
                                    <input type="hidden" name="mail" value="<?php echo $posts['mail'] ?>">

                                    <dt><label for="title">件名</label></dt>
                                    <dd><p><?php echo $posts['title']; ?></dd>
                                    <input type="hidden" name="title" value="<?php echo $posts['title'] ?>">

                                    <dt><label for="message">お問い合わせ内容</label></strong></dt>
                                    <dd><p><?php echo $posts['message']; ?></dd>
                                    <input type="hidden" name="message" value="<?php echo $posts['message'] ?>">
                                </dl>
                                <p class="send_button text-center" ><input type="submit" name="submit_check" value="送信する" class="p-2 bg-white border-light"></p>
                            </form>
                            <div class="move text-center">
                                <a href="contact.php" class="btn btn-outline-dark text-decoration-none m-3">contactページに戻る</a>
                            </div>
                        <?php else: ?>
                            <p>お問い合わせ内容をご入力ください。</p>
                                <form action="contact.php" method="post">
                                    <dl class="row">
                                        <dt><label for="name">お名前</label><strong>(必須)</strong></dt>
                                        <dd><input type="text" name="name" id="name" class="form-control" required></dd>

                                        <dt><label for="tel">電話番号</label></dt>
                                        <dd><input type="tel" name="tel" id="tel" class="form-control"></dd>

                                        <dt><label for="mail">メールアドレス</label><strong>(必須)</strong></dt>
                                        <dd><input type="email" name="mail" id="mail" class="form-control" required></dd>

                                        <dt><label for="subject">件名</label><strong>(必須)</strong></dt>
                                        <dd><input type="text" name="title" id="title" class="form-control" required></dd>

                                        <dt><label for="message">お問い合わせ内容</label><strong>(必須)</strong></dt>
                                        <dd><textarea name="message" id="message" class="form-control" required></textarea></dd>
                                    </dl>

                                    <p class="send_button text-center" ><input type="submit" name="submit" value="確認する" class="p-2 bg-white border-light"></p>
                                </form>
                        <?php endif; ?>

                    </div><!--#contact_form_container-->
                </div><!--#contact_main_container-->
            </main>

            <div id="icons_container" class="container-fluid p-0 text-center">
                <div id="icons">
                    <div class="row justify-content-center align-items-center m-0">
                        <div class="col-3 p-0 m-2">
                            <a href="#"><img src="img/instagram_logo.png" class="img-fluid p-0"></a>
                        </div>
                        <div class="col-3 p-0 m-2">
                            <a href="#"><img src="img/twitter_logo.png" class="img-fluid p-0"></a>
                        </div>
                    </div>
                    <h2 class="row mb-4 mx-0">
                        <div class="col p-0 m-0 fs-3 link-dark">
                            <a href="index.php" class="text-decoration-none text-dark">Light Knitting</a>
                        </div>
                        </h2>
                </div>
            </div><!--icons_container-->

            <footer class="container-fluid d-flex justify-content-center align-items-center">
                <p class="m-0">(C)2021 Light Knitting.</p>
            </footer>
        </div><!--#wrapper-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
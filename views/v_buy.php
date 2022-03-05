<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>購入者情報入力 - Light Knitting</title>
    </head>

    <body style="min-width: 300px;">
        <div id="wrapper">
            <header style="background-color: #FFFFCC;">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <h1 class="d-flex align-items-center m-0 w-50"><a class="navbar-brand m-0" href="index.php"><img src="img/Light_Knitting_logo.png" alt="Light Knitting" class="img-fluid"></a></h1>
                            <li class="list-unstyled d-flex flex-row-reverse"><a class="nav-link p-0 d-lg-none" href="#"><img src="img/cart.png" class="rounded float-end m-2"></a>
                            <button class="navbar-toggler p-0" style="border: 0;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            </li>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav ms-auto align-items-center">
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
                                        <ul class="dropdown-menu border-0 p-0 text-center" aria-labelledby="navbarDropdownMenuLink" style="background-color: #FFFFCC;">
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
                        <li class="list-unstyled"><a class="nav-link p-0  d-none d-lg-block" href="#"><img src="img/cart.png"></a></li>
                    </nav>
                </div>
            </header><!--header-->
            
            <main style="min-height: calc(100vh - 100px);">
                <div class="container">
                    <?php if(!empty($errors)) {
                        foreach($errors as $error) {
                            echo "<span class=\"error\" style=\"color: red;\">$error</span><br>";
                        }
                    } ?>

                    <form action="buy.php" method="post" class="row d-flex flex-column">
                        <p class="col-5 mx-auto">
                        お名前<br>
                        <input type="text" name="name" class="form-control" value="<?php echo $name ?>">
                        </p>
                        <p class="col-5 mx-auto">
                        メールアドレス<br>
                        <input type="text" name="email" class="form-control" value="<?php echo $email ?>">
                        </p>
                        <p class="col-5 mx-auto">
                        郵便番号<br>
                        <input type="text" name="code" class="form-control" value="<?php echo $code ?>">
                        </p>
                        <p class="col-5 mx-auto">
                        ご住所<br>
                        <input type="text" name="address" class="form-control" value="<?php echo $address ?>">
                        </p>
                        <p class="col-5 mx-auto">
                        電話番号<br>
                        <input type="text" name="tel" class="form-control" value="<?php echo $tel ?>">
                        </p>
                        <p class="col-5 mx-auto text-center">
                        <input type="submit" name="submit" class="px-4" value="確認">
                        </p>
                    </form>

                    <div class="move">
                        <a href="items.php">お買い物に戻る</a>
                        <a href="cart.php">カートに戻る</a>
                    </div>
                </div>

            </main> 

            <footer class="container-fluid" style="height:100px; background-color: #FFFFCC;">
                <div class="d-flex justify-content-center align-items-center" style="height: 100px">
                    <p class="m-0">(C)2021 Light Knitting.</p>
                </div>
            </footer>
        </div><!--#wrapper-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
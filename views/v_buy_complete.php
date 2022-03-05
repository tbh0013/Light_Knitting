<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>購入完了 - Light Knitting</title>
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
            
            <main>
                <div>
                    <p>注文完了しました。ありがとうございました。</p>
                </div>

                <div class="move">
                    <a href="items.php">お買い物に戻る</a>
                </div>
            </main> 

            <footer class="container-fluid" style="margin-top:auto; height:100px; background-color: #FFFFCC;">
                <div class="d-flex justify-content-center align-items-center" style="height: 100px">
                    <p class="m-0">(C)2021 Light Knitting.</p>
                </div>
            </footer>
        </div><!--#wrapper-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
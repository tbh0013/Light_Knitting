<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="css/slick-theme.css" rel="stylesheet">
        <link href="css/slick.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
        <script src="js/lazyload/lazyload.min.js"></script>
        <title>Light Knitting</title>
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

            <main>
                <div id="top_main_container">
                    <div class="top_visual container-fluid p-0">
                        <div class="top_slide slick-slider list-unstyle">
                            <div><img src="img/top_pic_sm1.jpg" class="d-block w-100" alt="Knitting_pic"></div>
                            <div><img src="img/top_pic_sm2.jpg" class="d-block w-100" alt="Knitting_pic"></div>
                            <div><img data-src="img/top_pic_sm3.jpg" class="d-block w-100 lazyload" alt="Knitting_pic"></div>
                            <div><img data-src="img/top_pic_sm4.jpg" class="d-block w-100 lazyload" alt="Knitting_pic"></div>
                            <div><img data-src="img/top_pic_sm5.jpg" class="d-block w-100 lazyload" alt="Knitting_pic"></div>
                            <div><img data-src="img/top_pic_sm6.jpg" class="d-block w-100 lazyload" alt="Knitting_pic"></div>
                        </div>
                    </div>
                    <h2 id="top_about" class="container text-center my-5 fs-4">
                        Light Knittingは編み物ハンドメイドの製品を紹介・販売しております。<br>
                        <div class="text-center"><a class="btn btn-outline-dark text-decoration-none m-3" href="about.php">詳しくはこちら</a></div>
                    </h2>


                    <div id="top_lineup_container" class="container-fluid my-5 p-0 text-center">
                        <div class="jumbotron py-3 align-items-center">
                            <h2 id="top_lineup" class="text-decoration-underline">LINE UP</h2>
                            <div class="lineup_slide slick-slider list-unstyle">
                                <?php foreach ($lineups as $lineup) { ?>
                                    <div class="lineup_product">
                                        <a href="item_detail.php?product_id=<?php echo $lineup['product_id']; ?>">
                                            <img class="img-fluid p-1" alt="画像" src="<?php echo $lineup['image_path']; ?>">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div><!--#top_lineUp_container-->


                    <div id="top_news_container" class="container text-center my-5">
                        <h2 id="top_news" class="text-decoration-underline">NEWS</h2>
                        <ul class="top_news_article list-unstyled">
                            <?php foreach ($top_news as $news) : ?>
                                <li class="top_news_list border-top border-bottom border-dark p-3 fs-5">
                                <a class="top_news_detail text-decoration-none" href="news_detail.php?news_id=<?php echo $news['news_id']; ?>">
                                        <?php
                                            echo ($news["t_date"]);
                                            echo ("<br>\n");
                                            echo ($news["text"]);
                                        ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <li class="list-unstyled p-3 fs-4"><a class="btn btn-outline-dark text-decoration-none m-3" href="news.php">詳しくはこちら</a></li>
                    </div><!--#top_news_container-->

                    <div id="top_movie_container" class="container-fluid p-0 text-center align-items-center">
                        <div class="py-3">
                            <video src="img/knitting_movie.mp4" loop autoplay muted class="container w-75"></video>
                        </div>
                    </div><!--#top_movie_container-->


                </div><!--#top_main_container-->

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
            </main>

            <footer class="container-fluid d-flex justify-content-center align-items-center">
                <p class="m-0">(C)2021 Light Knitting.</p>
            </footer>
        </div><!--#wrapper-->

        <script type="text/javascript" src="js/slick.min.js"></script>
        <script type="text/javascript" src="js/slide.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            lazyload();
        </script>
    </body>
</html>
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
        <title>Light Knitting</title>
    </head>

    <body>
        <div id="wrapper">
            <?php require_once("views/v_header.php"); ?>
            <main>
                <div id="top_main_container">
                    <div class="top_visual container-fluid p-0">
                        <div class="top_slide slick-slider list-unstyle">
                            <div><img src="img/top_pic_sm1.jpg" class="d-block w-100" alt="Knitting_pic"></div>
                            <div><img src="img/top_pic_sm2.jpg" class="d-block w-100" alt="Knitting_pic"></div>
                            <div><img src="img/top_pic_sm3.jpg" class="d-block w-100" alt="Knitting_pic"></div>
                            <div><img src="img/top_pic_sm4.jpg" class="d-block w-100" alt="Knitting_pic"></div>
                            <div><img src="img/top_pic_sm5.jpg" class="d-block w-100" alt="Knitting_pic"></div>
                            <div><img src="img/top_pic_sm6.jpg" class="d-block w-100" alt="Knitting_pic"></div>
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
                                            <img class="img-fluid p-1" alt="画像" src="<?php echo "./../admin/img/{$lineup['image_path']}"; ?>">
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
    </body>
</html>
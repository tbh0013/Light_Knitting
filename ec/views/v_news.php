<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
        <title>news - Light Knitting</title>
    </head>

    <body>
        <div id="wrapper">
            <?php require_once("views/v_header.php"); ?>
            <main>
                <div id="news_main_container">

                    <h2 id="news_heading" class="text-decoration-underline text-center p-3">NEWS</h2>

                    <div id="news_article_container" class="container mb-5">
                        <ul class="news_list list-unstyled fs-5 text-center col-6 mx-auto">
                            <?php foreach ($newslist as $news) { ?>
                                <li class="news_item my-3 text-start">
                                    <a class="news_detail d-inline-block text-decoration-none" href="news_detail.php?news_id=<?php echo $news['news_id']; ?>">
                                            <p class="d-inline-block fw-bold m-0"><?php echo $news['t_date']; ?></p>
                                            <p><?php echo $news['title']; ?></p>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div><!--#news_article_container-->

                </div><!--#news_main_container-->

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
                        <div class="row mb-4 mx-0">
                            <h2 class="col p-0 m-0 fs-3 link-dark">
                                <a href="index.php" class="text-decoration-none text-dark">Light Knitting</a>
                            </h2>
                        </div>
                    </div>
                </div><!--icons_container-->
            </main>

            <footer class="container-fluid d-flex justify-content-center align-items-center">
                <p class="m-0">(C)2021 Light Knitting.</p>
            </footer>
        </div><!--#wrapper-->
        <script type="text/javascript" src="js/paginathing.min.js"></script>
        <script type="text/javascript" src="js/paginathing_setting.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
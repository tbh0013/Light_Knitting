<?php
require_once 'initiallization.php';
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
        <title>詳細 - Light Knitting</title>
    </head>

    <body>
        <div id="wrapper">
            <?php require_once("views/v_header.php"); ?>
            <main>
                <div id="news_detail_main_container">

                    <h2 id="news_notice" class="text-decoration-underline text-center p-3">お知らせ</h2>


                    <div id="news_detail_container" class="container border-top border-bottom d-flex flex-column align-items-center ">
                        <?php foreach ($newslist as $news) : ?>
                            <h2 id="news_title" class="my-3"><?php echo $news['title']; ?></h2>
                            <div id="news_detail_pic_container" class="container row">
                                <div class="col-9 col-md-5 mx-auto">
                                    <img class="img-fluid" onerror="this.src='./admin/img/no_image.png'" src="<?php if (isset($news['image_path']) && $news['image_path'] !== "") : ?>
                                                                                <?php echo "./admin/img/{$news['image_path']}"; ?>
                                                                            <?php else : ?>
                                                                                <?php echo "./admin/img/no_image.png"; ?>
                                                                            <?php endif; ?>">
                                </div>
                            </div><!--#news_detail_pic_container-->

                            <p class="text-center"><?php echo $news['text']; ?></p>

                                <a class="btn btn-outline-dark text-decoration-none m-3"
                                    href="<?php if ($news['url'] !== "") : ?>
                                            <?php echo ($news['url']); ?>
                                        <?php else : ?>
                                            <?php echo "item_detail.php?product_id={$news['product_id']}"; ?>
                                        <?php endif; ?>">
                                    <?php echo "詳細ページへ"; ?>
                                </a>
                        <?php endforeach; ?>
                    </div><!--#news_detail_container-->

                    <div id="icons_container" class="container-fluid p-0 text-center">
                        <div id="icons">
                            <div class="row justify-content-center align-items-center m-0">
                                <div class="col-3 p-0 m-2">
                                    <a href="https://www.instagram.com/"><img src="img/instagram_logo.png" class="img-fluid p-0"></a>
                                </div>
                                <div class="col-3 p-0 m-2">
                                    <a href="https://twitter.com/"><img src="img/twitter_logo.png" class="img-fluid p-0"></a>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
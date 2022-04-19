<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
        <title>about - Light Knitting</title>
    </head>

    <body>
        <div id="wrapper">
            <?php require_once("views/v_header.php"); ?>
            <main>
                <div id="about_main_container">

                    <div id="about_visual" class="container-fluid row mx-auto p-0">
                        <div class="col p-0 h-25">
                            <img src="img/about_pic1.jpg" class="img-fluid p-0">
                        </div>
                        <div class="col p-0 d-md-block d-none">
                            <img src="img/about_pic2.jpg" class="img-fluid p-0">
                        </div>
                    </div>


                    <div class="container-fluid" style="background-image: url(img/top_bg.png);">
                        <h2 id="about_heading" class="text-center p-4">毛糸の個性を大切に。<br>一編み一編み丁寧に。</h2>
                        <div id="about_article_container" class="p-3">
                            <p class="text-center">この度はご閲覧いただきありがとうございます。<br>
                                手芸歴3年目のハンドメイド作家です。手芸が得意な母に影響で始めました。<br>
                                棒針、輪針、かぎ針等を使い分けて、毛糸の個性が生きるように、一編み一編み丁寧に編みこむことを意識して制作しています。<br>
                            </p>
                            <p class="p-5"></p>
                        </div><!--#about_article_container-->
                    </div>

                </div><!--#about_main_container-->

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
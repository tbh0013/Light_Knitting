<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
        <title>404 - Light Knitting</title>
    </head>

    <body>
        <div id="wrapper">
            <?php require_once("views/v_header.php"); ?>
            <main>
                <div class="container text-center">
                    <P class="fs-5 m-5">申し訳ございませんが、このページは存在しません。</p>
                    <div class="text-center"><a class="btn btn-outline-dark text-decoration-none m-3" href="index.php">TOPへ戻る</a></div>
                </div><!--container-->

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
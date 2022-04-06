<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <title>管理画面ログイン</title>
    </head>

    <body>
        <header>
            <div class="container">
                <h1 class="text-center">管理画面ログイン</h1>
            </div>
        </header>

        <main style="min-height: 100vh;">
            <div class="wrapper text-center">
                <form class="login-form mt-5" action="login_check.php" method="POST">
                    <div class="form-item mb-4">
                        <p class="m-0">メールアドレス</p>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-item">
                        <p class="m-0">パスワード</p>
                        <input type="password" name="password" required>
                    </div>
                    <button type="submit" class="button mt-4">ログイン</button>
                </form>
            </div>
        </main>

        <footer class="container-fluid d-flex justify-content-center align-items-center">
            <p class="m-0">(C)2021 Light Knitting.</p>
        </footer>
    </body>
</html>

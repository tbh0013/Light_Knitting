<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
        <title>購入者情報入力 - Light Knitting</title>
    </head>

    <body>
        <div id="wrapper">
            <?php require_once("views/v_header.php"); ?>
            <main style="min-height: calc(100vh - 100px);">
            <h2 id="item_heading" class="text-center p-3">
                <?php if ($page_check == 1) : ?>
                    入力内容確認
                <?php else : ?>
                    お客様情報入力
                <?php endif; ?>
                </h2>
                <div class="container">
                    <?php if(!empty($errors)) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <?php echo "<span class=\"error\" style=\"color: red;\">{$error}</span><br>"; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if ($page_check == 1) : ?>
                        <p class="text-center">下記の通り注文致します。よろしいでしょうか。</p>
                        <form action="buy.php" method="post" class="row d-flex flex-column">
                            <div class="table-responsive">
                                <table class="table border-dark mx-auto text-center">
                                    <thead class="table-light">
                                    <tr class="d-md-none" style="white-space: nowrap;"><td class="fs-4"><strong><u>合計</strong> ￥<?php echo $sum; ?> </u></td></tr>
                                        <tr style="white-space: nowrap;"><th scope="col">商品名</th><th scope="col">単価</th><th scope="col">数量</th><th scope="col">サイズ</th><th scope="col">小計</th></tr>
                                    </thead>
                                        <?php foreach ($cart_rows as $cart) : ?>
                                            <tr>
                                                <td><?php echo $cart['p_name']; ?></td>
                                                <input type="hidden" name="product_name" value="<?php echo $cart['p_name']; ?>">
                                                <td><?php echo $cart['price']; ?></td>
                                                <input type="hidden" name="price" value="<?php echo $cart['p_name']; ?>">
                                                <td><?php echo $cart['num']; ?></td>
                                                <input type="hidden" name="num" value="<?php echo $cart['num']; ?>">
                                                <td><?php if (isset($cart['size'])) : ?>
                                                        <?php echo $cart['size']; ?>
                                                        <input type="hidden" name="product_size_id" value="<?php echo $cart['product_size_id']; ?>">
                                                    <?php else : ?>
                                                        <?php echo 'FREE'; ?>
                                                        <input type="hidden" name="size" value="FREE">
                                                    <?php endif; ?>
                                                </td>
                                                <td>￥<?php echo $cart['price'] * $cart['num']; ?> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <tr class="d-none d-md-table-row"><td colspan='4'> </td><td class="fs-4"><strong>合計</strong> ￥<?php echo $cart['sum']; ?> </td></tr>
                                </table>
                                <table class="table border-dark mx-auto mt-5">
                                    <tr>
                                        <td><?php echo 'お名前'; ?></td>
                                        <td><?php echo $posts['name']; ?></td>
                                        <input type="hidden" name="customer_name" value="<?php echo $posts['name']; ?>">
                                    </tr>
                                    <tr>
                                        <td><?php echo 'メールアドレス'; ?></td>
                                        <td><?php echo $posts['mail']; ?></td>
                                        <input type="hidden" name="mail" value="<?php echo $posts['mail']; ?>">
                                    </tr>
                                    <tr>
                                        <td><?php echo '郵便番号'; ?></td>
                                        <td><?php echo $posts['code']; ?></td>
                                        <input type="hidden" name="code" value="<?php echo $posts['code']; ?>">
                                    </tr>
                                    <tr>
                                        <td><?php echo 'ご住所'; ?></td>
                                        <td><?php echo $posts['address'].$posts['address_after']; ?></td>
                                        <input type="hidden" name="address" value="<?php echo $posts['address']; ?>">
                                        <input type="hidden" name="address_after" value="<?php echo $posts['address_after']; ?>">
                                    </tr>
                                        <td><?php echo '電話番号'; ?></td>
                                        <td><?php echo $posts['tel']; ?></td>
                                        <input type="hidden" name="tel" value="<?php echo $posts['tel']; ?>">
                                    </tr>
                                </table>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="submit_check" class="btn btn-outline-dark text-decoration-none px-5 mb-4" value="注文を確定">
                            </div>
                        </form>
                        <div class="move d-flex flex-md-row flex-column justify-content-center">
                            <a href="buy.php" class="btn btn-outline-dark text-decoration-none m-3">購入者情報入力に戻る</a>
                            <a href="items.php" class="btn btn-outline-dark text-decoration-none m-3">お買い物に戻る</a>
                            <a href="cart.php" class="btn btn-outline-dark text-decoration-none m-3">カートに戻る</a>
                        </div>
                    <?php else : ?>
                        <form action="buy.php" method="post" class="row d-flex flex-column">
                            <p class= "col-md-7 mx-auto">
                                お名前<br>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
                            </p>
                            <p class= "col-md-7 mx-auto">
                                メールアドレス<br>
                                <input type="email" name="mail" class="form-control" value="<?php echo $email; ?>" required>
                            </p>
                            <p class= "col-md-7 mx-auto">
                                郵便番号 ※住所は郵便番号から自動検索されます。<br>
                                <input type="text" name="code" pattern="^\d{7}$" placeholder="ハイフンなし7文字の半角数字を入力して下さい。"
                                        class="form-control" value="<?php echo $code; ?>" onKeyUp="AjaxZip3.zip2addr(this,'','address','address_after');" required
                                >
                            </p>
                            <p class= "col-md-7 mx-auto">
                                ご住所（都道府県）<br>
                                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" required>
                            </p>
                            <p class= "col-md-7 mx-auto">
                                ご住所（都道府県以降）<br>
                                <input type="text" name="address_after" class="form-control" value="<?php echo $address; ?>" required>
                            </p>
                            <p class= "col-md-7 mx-auto">
                                電話番号<br>
                                <input type="tel" name="tel" pattern="^0\d{9,10}$" placeholder="ハイフンなし0から始まる半角数字10桁或いは11桁を入力して下さい。" class="form-control" value="<?php echo $tel; ?>" required>
                            </p>
                            <p class="mx-auto text-center">
                                <input type="submit" name="submit" class="btn btn-outline-dark text-decoration-none px-5" value="確認">
                            </p>
                        </form>
                        <div class="move text-center">
                            <a href="items.php" class="btn btn-outline-dark text-decoration-none m-3">お買い物に戻る</a>
                            <a href="cart.php" class="btn btn-outline-dark text-decoration-none m-3">カートに戻る</a>
                        </div>
                    <?php endif; ?>
                </div>
            </main>

            <footer class="container-fluid d-flex justify-content-center align-items-center">
                <p class="m-0">(C)2021 Light Knitting.</p>
            </footer>
        </div><!--#wrapper-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
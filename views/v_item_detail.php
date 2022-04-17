<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
        <title>商品詳細 - Light Knitting</title>
    </head>

    <body>
        <div id="wrapper">
            <?php require_once("views/v_header.php"); ?>
            <main>
                <div id="item_main_container">
                    <?php foreach ($products as $product) : ?>
                        <h2 id="item_heading" class="text-decoration-underline text-center p-3"><?php echo $product['c_name']; ?></h2>
                        <div id="item_detail_container" class="container border-top border-bottom mx-auto">
                            <h2 id="item_title" class="my-3 text-center"><?php echo $product['p_name']; ?></h2>
                            <div class="d-flex flex-md-row flex-column row">
                                <div class="pic_container text-center col">
                                    <div class="main_pic">
                                    <img class="img-fluid" onerror="this.src='./admin/img/no_image.png'" src="<?php if (isset($product['image_path']) && $product['image_path'] !== "") : ?>
                                                                                    <?php echo "./admin/img/{$product['image_path']}"; ?>
                                                                                <?php else : ?>
                                                                                    <?php echo "./admin/img/no_image.png"; ?>
                                                                                <?php endif; ?>">
                                    </div>
                                    <div class="sub_pic">
                                        <ul class="list-unstyled mt-3 d-flex justify-content-center">
                                            <li class="current w-25">
                                                <img class="img-thumbnail" onerror="this.src='./admin/img/no_image.png'" src="<?php if (isset($product['image_path']) && $product['image_path'] !== "") : ?>
                                                                                    <?php echo "./admin/img/{$product['image_path']}"; ?>
                                                                                <?php else : ?>
                                                                                    <?php echo "./admin/img/no_image.png"; ?>
                                                                                <?php endif; ?>">
                                            </li>
                                            <li class="current w-25">
                                                <img class="img-thumbnail" onerror="this.src='./admin/img/no_image.png'" src="<?php if (isset($product['sub_image_path']) && $product['sub_image_path'] !== "") : ?>
                                                                                    <?php echo "./admin/img/{$product['sub_image_path']}"; ?>
                                                                                <?php else : ?>
                                                                                    <?php echo "./admin/img/no_image.png"; ?>
                                                                                <?php endif; ?>">
                                            </li>
                                        </ul>
                                    </div><!--.sub_pic"-->
                                </div><!--.pic_container-->

                                <div class="detail_container col text-center">
                                    <p><?php echo $product['description']; ?></p>

                                    <div id="item_information">
                                        <div class="item_detail_place">
                                            <p class="fw-bold">￥<?php echo $product['price']; ?></p>
                                        </div>

                                        <?php if (!empty($errors)) : ?>
                                            <?php foreach ($errors as $error) : ?>
                                                <?php echo "<span class=\"error\" style=\"color: red;\">{$error}</span><br>"; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <form action ="item_check.php" method="post">
                                            <div class="item_detail_num mb-3">
                                                <span class="">数量</span>
                                                    <select name="num" class="num_option">
                                                        <option value="---">---</option>
                                                        <?php
                                                            for ($i = 1; $i <=5; $i++) {
                                                                echo "<option>{$i}</option>";
                                                            }
                                                        ?>
                                                    </select>
                                            </div>

                                            <div class="item_detail_size mb-3">
                                                <?php if (isset($size_array[0])) : ?>
                                                    <span class="size">サイズ</span>
                                                    <select name="size" class="size_option">
                                                        <option value="---">---</option>
                                                        <?php foreach ($size_array as $product_size) : ?>
                                                            <option><?php echo $product_size; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input type="hidden" name="size_exist" value="サイズ">
                                                <?php endif; ?>
                                            </div>
                                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                            <input type="submit" name="submit" class="cart_in_button mb-3 px-5" value="カートに入れる">
                                        </form>

                                    </div><!--#item_information-->
                                </div><!--.detail_container-->
                            </div><!--.row-->
                        </div><!--#item_detail_container-->
                        <?php break ?>
                    <?php endforeach; ?>
                    <div id="sub_category" class="container border-bottom mb-3">
                        <h2>Category</h2>
                        <ul class="sub_category_menu list-unstyled fs-5">
                            <?php foreach($category_list as $category) : ?>
                                <?php if($category['category_id'] === "All") : ?>
                                    <li><a class="sub_category_text text-decoration-none" href="items.php"><?php echo $category['name'] ?></a></li>
                                <?php else: ?>
                                    <li><a class="sub_category_text text-decoration-none" href="items.php?category_id=<?php echo $category['category_id'] ?>"><?php echo $category['name'] ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

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
                    </div> <!--#icons_container-->
                </div> <!--#item_main_container -->

            </main>

            <footer class="container-fluid d-flex justify-content-center align-items-center">
                <p class="m-0">(C)2021 Light Knitting.</p>
            </footer>
        </div><!--#wrapper-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/img_switching.js"></script>
    </body>
</html>
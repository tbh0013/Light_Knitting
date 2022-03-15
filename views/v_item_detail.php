<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
        <title>商品詳細 - Light Knitting</title>
    </head>

    <body>
        <div id="wrapper">
            <header>
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
                <div id="item_main_container">
                    <?php foreach($product_join_size as $product) { ?>
                        <h2 id="item_heading" class="text-decoration-underline text-center p-3"><?php echo $product['c_name'] ?></h2>

                        <div id="item_detail_container" class="container border-top border-bottom  d-flex flex-column align-items-center ">
                            <h2 id="item_title" class="my-3"><?php echo $product['p_name']; ?></h2>
                            <div id="item_pic_container">
                                <div class="main_pic d-flex align-items-center justify-content-center">
                                    <img class="img-fluid w-50" src="<?php echo $product['image_path']; ?>">
                                </div>
                                <div class="sub_pic">
                                    <ul class="list-unstyled d-flex align-items-center justify-content-center mt-3">
                                        <li class="d-flex w-25"><img src="<?php echo $product['image_path'] ?>" class="img-thumbnail"></li>
                                        <li class="d-flex w-25"><img src="<?php echo $product['sub_image_path'] ?>" class="img-thumbnail"></li>
                                    </ul>
                                </div><!--.sub_pic"-->
                            </div><!--#item_pic_container-->

                            <p><?php echo $product['description']; ?></p>

                            <div id="item_information">
                                <div class="item_detail_place text-center">
                                    <p class="fw-bold">￥<?php echo $product['price']; ?></p>
                                </div>

                                <?php if(!empty($errors)) { 
                                        foreach($errors as $error) {
                                            echo "<span class=\"error\" style=\"color: red;\">$error</span><br>";
                                        } 
                                    } ?>
                                <form action ="item_detail.php" method="post">
                                    <div class="item_detail_num mb-3">
                                        <span class="">数量</span>
                                            <select name="num" class="num_option">
                                                <option value="---">---</option>
                                                <?php 
                                                    for ($i = 1; $i <=5; $i++) {
                                                        echo "<option>$i</option>";
                                                    }
                                                ?>
                                            </select>
                                    </div>

                                    <div class="item_detail_size mb-3">
                                        <?php if (isset($size_array[0])) { ?> 
                                            <span class="size">サイズ</span>
                                            <select name="size" class="size_option">
                                                <option value="---">---</option>
                                                <?php foreach($size_array as $product_size) { ?>
                                                    <option><?php echo $product_size ?></option>
                                                <?php } ?>
                                            </select>
                                            <input type="hidden" name="size_exist" value="サイズ">
                                        <?php } ?>
                                    </div>
                                    <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                                    <input type="submit" name="submit" class="cart_in_button mb-3 px-5" value="カートに入れる">
                                </form>
                                
                            </div><!--#item_information-->
                        </div><!--#item_detail_container-->
                        <?php break ?>
                    <?php } ?>
                    <div id="sub_category" class="container border-bottom mb-3">
                        <h2>Category</h2>
                        <ul class="sub_category_menu list-unstyled fs-5">
                            <li><a class="text-decoration-none text-dark" href="items.php">All</a></li>
                            <li><a class="text-decoration-none text-dark" href="items.php?category_id=1">socks</a></li>
                            <li><a class="text-decoration-none text-dark" href="items.php?category_id=2">knit hat</a></li>
                            <li><a class="text-decoration-none text-dark" href="items.php?category_id=3">gloves</a></li>
                            <li><a class="text-decoration-none text-dark" href="items.php?category_id=4">bag</a></li>
                            <li><a class="text-decoration-none text-dark" href="items.php?category_id=5">stall</a></li>
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
    </body>
</html>
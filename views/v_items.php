<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>All Items - Light Knitting</title>
    </head>

    <body style="min-width: 300px;">
        <div id="wrapper">
            <header style="background-color: #FFFFCC;">
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
                        <li class="list-unstyled"><a class="nav-link p-0  d-none d-lg-block" href="cart.php"><img src="img/cart.png"></a></li>
                    </nav>
                </div>
            </header><!--header-->

            <main>
                <div id="item_main_container">

                    <h2 id="item_heading" class="text-decoration-underline text-center p-3"><?php echo $categories[0]['name'];?></h2>
                    <div id="category_menu" class="d-flex justify-content-center align-items-center">
                        <select name="category" onchange="location.href=value;">
                            <option value=""></option>
                            <option value="items.php">All</option>
                            <option value="items.php?category_id=1">socks</option>
                            <option value="items.php?category_id=2">knit hat</option>
                            <option value="items.php?category_id=3">gloves</option>
                            <option value="items.php?category_id=4">bag</option>
                            <option value="items.php?category_id=5">stall</option>
                        </select>
                    </div><!--#category_menu-->


                    <div id="item_article_container"  class="container border-top border-bottom my-3">
                        <ul class="item_list list-unstyled row my-2">
                            <!-- category_nameも渡す予定-->
                            <?php foreach($products as $product) { ?>
                                <li class="item_individual col-6 col-sm-3">
                                    <a href="item_detail.php?product_id=<?php echo $product['product_id'] ?>">
                                        <div class="item_pic"><img class="img-fluid" src="<?php echo $product['image_path']; ?>"></div>
                                    </a>
                                    <div class="item_name text-center"><?php echo ($product['name']); ?></div>
                                    <div class="item_price text-center"><?php echo "￥".($product['price']); ?></div>
                                </li>
                            <?php } ?>
                            
                            <!-- <li class="item_individual col-6 col-sm-3">
                                <a class="d-flex flex-column align-items-center text-decoration-none text-dark" href="item_detail.php">
                                    <div class="item_pic"><img class="img-fluid" src="img/red_socks.jpg"></div>
                                    <div class="item_name">red socks</div>
                                    <div class="item_price">￥3000</div>
                                </a>
                            </li>
                            <li class="item_individual col-6 col-sm-3">
                                <a class="d-flex flex-column align-items-center text-decoration-none text-dark" href="item_detail.php">
                                    <div class="news_pic"><img class="img-fluid" src="img/border_socks.jpg"></div>
                                    <div class="item_name">border socks</div>
                                    <div class="item_price">￥3000</div>
                                </a>
                            </li>
                            <li class="item_individual col-6 col-sm-3">
                                <a class="d-flex flex-column align-items-center text-decoration-none text-dark" href="item_detail.php">
                                    <div class="news_pic"><img class="img-fluid" src="img/orange_socks.jpg"></div>
                                    <div class="item_name">orange socks</div>
                                    <div class="item_price">￥3000</div>
                                </a>
                            </li>
                            <li class="item_individual col-6 col-sm-3">
                                <a class="d-flex flex-column align-items-center text-decoration-none text-dark" href="item_detail.php">
                                    <div class="news_pic"><img class="img-fluid" src="img/chameleon_socks.jpg"></div>
                                    <div class="item_name">chameleon socks</div>
                                    <div class="item_price">￥3000</div>
                                </a>
                            </li>
                            <li class="item_individual col-6 col-sm-3">
                                <a class="d-flex flex-column align-items-center text-decoration-none text-dark" href="item_detail.php">
                                    <div class="news_pic"><img class="img-fluid" src="img/blue_soks.jpg"></div>
                                    <div class="item_name">blue socks</div>
                                    <div class="item_price">￥3000</div>
                                </a>
                            </li>
                            <li class="item_individual col-6 col-sm-3">
                                <a class="d-flex flex-column align-items-center text-decoration-none text-dark" href="item_detail.php">
                                    <div class="news_pic"><img class="img-fluid" src="img/purple_socks.jpg"></div>
                                    <div class="item_name">purple socks</div>
                                    <div class="item_price">￥3000</div>
                                </a>
                            </li> -->
                        </ul>
                        <p class="more_item_button mt-5 text-center"><button type="button" class="bg-white border-3 px-5 py-2" style="border-radius: 5px;">more item</button></p>
                    </div><!--#item_article_containe-->

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
                </div><!--#item_main_container-->


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
                            <div class="col p-0 m-0 fs-3 link-dark">
                                <a href="index.php" class="text-decoration-none text-dark">Light Knitting</a>
                            </div>
                        </div>
                    </div>
                </div><!--icons_container-->
            </main>

            <footer class="container-fluid" style="height:100px; background-color: #FFFFCC;">
                <div class="d-flex justify-content-center align-items-center" style="height: 100px">
                    <p class="m-0">(C)2021 Light Knitting.</p>
                </div>
            </footer>

        </div><!--#wrapper-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
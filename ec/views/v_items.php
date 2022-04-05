<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width",initial-scale="1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
        <title>All Items - Light Knitting</title>
    </head>

    <body>
        <div id="wrapper">
            <?php require_once("views/v_header.php"); ?>
            <main>
                <div id="item_main_container">

                    <h2 id="item_heading" class="text-decoration-underline text-center p-3"><?php echo $categories[0]['name'];?></h2>
                    <div id="category_menu" class="d-flex justify-content-center align-items-center">
                        <select name="category" onchange="location.href=value;">
                            <?php foreach($category_list as $category) : ?>
                                <?php if($category['category_id'] === "All") : ?>
                                    <option value="items.php" <?php if($categories_id === null) { echo 'selected'; } ?>><?php echo $category['name'] ?></option>
                                <?php else : ?>
                                    <option value="items.php?category_id=<?php echo $category['category_id'] ?>" <?php if($categories_id === $category['category_id']) { echo 'selected'; } ?>>
                                        <?php echo $category['name'] ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div><!--#category_menu-->


                    <div id="item_article_container" class="container border-top border-bottom my-3">
                        <ul class="item_list list-unstyled row my-2">
                            <?php foreach ($products as $product) : ?>
                                <li class="item_individual col-6 col-sm-3">
                                    <a href="item_detail.php?product_id=<?php echo $product['product_id'] ?>">
                                        <div class="item_pic">
                                            <img class="img-fluid" onerror="this.src='./../admin/img/no_image.png'" src="<?php if (isset($product['image_path']) && $product['image_path'] !== "") : ?>
                                                                                <?php echo "./../admin/img/{$product['image_path']}"; ?>
                                                                            <?php else : ?>
                                                                                <?php echo "./../admin/img/no_image.png"; ?>
                                                                            <?php endif; ?>">
                                        </div>
                                    </a>
                                    <div class="item_name text-center"><?php echo ($product['name']); ?></div>
                                    <div class="item_price text-center"><?php echo "￥".($product['price']); ?></div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <p class="more_item_button mt-5 text-center"><button type="button" class="bg-white border-3 px-5 py-2" style="border-radius: 5px;">more item</button></p>
                    </div><!--#item_article_containe-->

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
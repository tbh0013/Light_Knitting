<header class="sticky-top">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light py-0">
            <div class="container-fluid">
                <h1 class="d-flex align-items-center m-0 w-50"><a class="navbar-brand m-0" href="index.php"><img src="img/Light_Knitting_logo.png" alt="Light Knitting" class=" img-fluid"></a></h1>
                <li class="list-unstyled d-flex flex-row-reverse"><a class="nav-link p-0 d-lg-none" href="cart.php"><img src="img/cart.png" class="rounded float-end m-2"></a>
                <button class="navbar-toggler p-0" style="border: 0;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </li>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto align-items-center fs-4">
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="news.php">News</a>
                        </li>
                        <li class="nav-item dropdown align-items-center text-center">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Items
                            </a>
                            <ul class="dropdown-menu border-0 p-0 text-center fs-5" aria-labelledby="navbarDropdownMenuLink" style="background-color: #FFFFCC;">
                                <?php foreach ($category_list as $category) : ?>
                                    <?php if ($category['category_id'] === "All") : ?>
                                        <li><a class="dropdown-item" href="items.php"><?php echo $category['name'] ?></a></li>
                                    <?php else: ?>
                                    <li><a class="dropdown-item" href="items.php?category_id=<?php echo $category['category_id'] ?>"><?php echo $category['name'] ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <li class="list-unstyled"><a class="nav-link p-0 d-none d-lg-block" href="cart.php"><img src="img/cart.png"></a></li>
        </nav>
    </div>
</header><!--header-->
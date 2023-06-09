<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- For ICON -->
    <link rel="icon" href="/assignment/assets/homepage/logo.png">
    <!-- LINK CSS -->
    <link rel="stylesheet" href="/assignment/styles/homepage/header.css">
    <link rel="stylesheet" href="/assignment/styles/homepage/content.css">
    <link rel="stylesheet" href="/assignment/styles/homepage/products.css">
    <link rel="stylesheet" href="/assignment/styles/homepage/footer.css">
    <link rel="stylesheet" href="/assignment/styles/reset/reset.css">
    <link rel="stylesheet" href="/assignment/styles/reset/general.css">
    <!-- For SLIDER -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- For ICON -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- For FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Home Page</title>
</head>
<body>
    <!-- HEADER -->
    <header class="header">
        <div class="wrapper">
            <div class="header-top flexbox">
                <a href="/frontend/index.html" class="logo">
                    <img src="/assignment/assets/homepage/logo.png" alt="">
                    <div class="logo-text">
                        <h2 class="logo-bk">BK</h2>
                        <h4 class="logo-small">Furniture</h4>
                    </div>
                </a>
                <div class="searchbox flexbox">
                    <div class="searchbox-form">
                        <form action="" class="search flexcol">
                            <span class="icon-small"><i class="ri-search-line"></i></span>
                            <input type="search" placeholder="Search for products, brands, ...">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                    <div class="searchbox-icon">
                        <a href="/frontend/userInfo/assignment/userInf.html"><i class="ri-user-line icon-large searchbox-item"></i></a>
                        <div class="cart-wrapper">
                            <a href="#" class="cart-button"><i class="ri-shopping-cart-line icon-large searchbox-item"></i></a>
                            <span class="qt">0</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <a href="#" class="trigger"><i class="ri-menu-line icon-large"></i></a>
                <div class="header-menu">
                    <ul class="menu-list flexcenter">
                        <li><a href="#" class="current"><i class="ri-home-line icon-small"></i> Home</a></li>
                        <li><a href="#">living room</a></li>
                        <li><a href="#">dining room</a></li>
                        <li><a href="#">bath room</a></li>
                        <li><a href="#">bedroom</a></li>
                        <li><a href="#">custom design</a></li>
                        <li class="on-mobile"><a href="#">your information</a></li>
                        <a href="#" class="close"><i class="ri-close-line"></i></a>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="main">
        <!-- slider -->
        <div class="slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                        include '../backend/connect.php';
                        $a=1;
                        $stmt = $conn->prepare("SELECT * FROM category");
                        $stmt->execute();
                        $categories = $stmt->fetchAll();
                        foreach($categories as $category)
                        {
                    ?>
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="<?php echo $category['CategoryImg']; ?>" alt="" class="object-cover">
                        </div>
                        <div class="text-content">
                            <h4>Decorate Your House</h4>
                            <h2><span>Come and Get it!</span><br><span>Brands New Shoes</span></h2>
                            <a href="#trending" class="primary-button">shop now</a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- cart -->
        <div class="product-cart">
            <h2 class="title">
                Your Cart
                <button class="close-menu"><i class="ri-close-fill"></i></button>
            </h2>
            <div class="products">
                <form action="" class="form-cart">
                    <div class="item">
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                        <div class="total-price">
                            <div class="cost-item">
                                <span>Price: </span>
                                <span class="item-cost"></span>
                            </div>
                            <div class="cost-item">
                                <span>Shipping: </span>
                                <span class="ship-cost"></span>
                            </div>
                            <div class="cost-item">
                                <span>Discount: </span>
                                <span class="sale-cost"></span>
                            </div>
                            <div class="cost-item">
                                <span>Total cost: </span>
                                <span class="total-cost"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>     
        
        <!-- treding product -->
        <div class="trending" id="trending">
            <div class="container">
                <div class="all-products">
                    <div class="product-title">
                        <h2><span class="circle"></span>Treding Products</h2>
                    </div>
                    <div class="column">
                        <div class="flexwrap">
                            <div class="product big best-seller">
                                <?php
                                    include '../backend/connect.php';
                                    $a=1;
                                    $stmt = $conn->prepare(
                                            "SELECT * FROM productinfo");
                                    $stmt->execute();
                                    $productinfos = $stmt->fetchAll();
                                    foreach(array_slice($productinfos, 12, 13) as $productinfo)
                                    {
                                ?>
                                <div class="product-item">
                                    <div class="best-title">
                                        <h2>Best Seller <i class="ri-fire-line"></i></h2>
                                    </div>
                                    <div class="media">
                                        <div class="image">
                                            <a href="#">
                                                <img src="<?php echo $productinfo['ProImg']; ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="hoverable">
                                            <ul>
                                                <li class="active"><a href="#"><i class="ri-heart-line"></i></a></li>
                                                <li><a href="#"><i class="ri-eye-line"></i></a></li>
                                                <li><a href="#"><i class="ri-shuffle-line"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="discount flexcenter">
                                            <span><?php echo round(((float)$productinfo['OriginPrice'] - (float)$productinfo['PriceDiscount'])/(float)$productinfo['OriginPrice']*100) . "%"; ?></span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="rating">
                                            <div class="stars"></div>
                                            <span>(3548)</span>
                                        </div>
                                        <h3 class="main-links"><a href="#"><?php echo $productinfo['ProName']; ?></a></h3>
                                        <div class="price">
                                            <span class="current">$<?php echo $productinfo['OriginPrice']; ?></span>
                                            <span class="normal">$<?php echo $productinfo['PriceDiscount']; ?></span>
                                        </div>
                                        <div class="stock">
                                            <div class="qty">
                                                <span>Stock: <strong class="qty-available">107</strong></span>
                                                <span>Sold: <strong class="qty-sold">3,458</strong></span>
                                            </div>
                                            <div class="bar">
                                                <div class="available"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    break;
                                    }
                                ?>
                            </div>
                            <div class="product mini">
                            <?php
                                include '../backend/connect.php';
                                $a=1;
                                $stmt = $conn->prepare(
                                        "SELECT * FROM productinfo");
                                $stmt->execute();
                                $productinfos = $stmt->fetchAll();
                                foreach(array_slice($productinfos, 40) as $productinfo)
                                {
                            ?>
                                <div class="item">
                                    <div class="media">
                                        <div class="thumnail">
                                            <a href="#">
                                                <img src="<?php echo $productinfo['ProImg']; ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="hoverable">
                                            <ul>
                                                <li class="active"><a href="#"><i class="ri-heart-line"></i></a></li>
                                                <li><a href="#"><i class="ri-eye-line"></i></a></li>
                                                <li><a href="#"><i class="ri-shuffle-line"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="discount flexcenter">
                                            <span><?php echo round(((float)$productinfo['OriginPrice'] - (float)$productinfo['PriceDiscount'])/(float)$productinfo['OriginPrice']*100) . "%"; ?></span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="main-links"><a href="#"><?php echo $productinfo['ProName']; ?></a></h3>
                                        <div class="rating">
                                            <div class="stars"></div>
                                            <span><?php echo "(" .rand(100,3000) . ")"; ?></span>
                                        </div>
                                        <span class="free-ship">Free Ship</span>
                                        <div class="price">
                                            <span class="current">$<?php echo $productinfo['OriginPrice']; ?></span>
                                            <span class="normal">$<?php echo $productinfo['PriceDiscount']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- featured product -->
        <div class="featured">
            <div class="container">
                <div class="all-products">
                    <div class="product-title">
                        <h2><span class="circle"></span>Featured Products</h2>
                    </div>
                </div>

                <div class="product main flexwrap">
                    <?php
                        include '../backend/connect.php';
                        $a=1;
                        $stmt = $conn->prepare(
                                "SELECT * FROM productinfo");
                        $stmt->execute();
                        $productinfos = $stmt->fetchAll();
                        foreach(array_slice($productinfos, 0, 12) as $productinfo)
                        {
                    ?>
                    <div class="item">
                        <div class="media">
                            <div class="thumbnail object-cover">
                                <a href="productDetail/assignment/productDetail.php?id=<?php echo $productinfo['ProID'];?>">
                                    <img src=" <?php echo $productinfo['ProImg']; ?>" alt="">
                                </a>
                            </div>
                            <div class="hoverable">
                                <ul>
                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a></li>
                                    <li><a href="#"><i class="ri-eye-line"></i></a></li>
                                    <li><a href="#"><i class="ri-shuffle-line"></i></a></li>
                                </ul>
                            </div>
                            <div class="discount flexcenter">
                                <span><?php echo round(((float)$productinfo['OriginPrice'] - (float)$productinfo['PriceDiscount'])/(float)$productinfo['OriginPrice']*100) . "%"; ?></span>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="rating">
                                <div class="stars"></div>
                                <span><?php echo "(" .rand(100,3000) . ")"; ?></span>
                            </div>
                            <h3 class="main-links"><a href="#"><?php echo $productinfo['ProName']; ?></a></h3>
                            <span class="free-ship">Top Sell Of Week</span>
                            <div class="price">
                                <span class="current">$<?php echo $productinfo['OriginPrice']; ?></span>
                                <span class="normal">$<?php echo $productinfo['PriceDiscount']; ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </main>

    <footer class="footer">
        <div class="wrapper wrap-footer flexrow">
            <div class="left">
                <div class="contact">
                    <h2>Contact us</h2>
                    <h4><i class="ri-phone-line icon-small icon"></i> 0123456789</h4>
                    <h4><i class="ri-mail-line icon-small icon"></i> bkfurniture@gmail.com</h4>
                </div>
                <div class="visit">
                    <h2>Visit our store</h2>
                    <h4><i class="ri-map-pin-line icon-small icon"></i>246 Ly Thuong Kiet, Quan 10, Ho Chi Minh City, Viet Nam</h4>
                    <h4 class="timer">
                        <i class="ri-time-line icon-small icon"></i>
                        <div class="time">
                            <span>Mon-Fri: 10am to 6pm</span>
                            <span>Sat-Sun: 11am to 5pm</span>
                        </div>
                    </h4>
                </div>
            </div>
            <div class="right">
                <div class="email">
                    <h2>FILL EMAIL FOR DEALS OR YOUR DESIGN</h2>
                    <form action="" class="enterEmail">
                        <input type="email" placeholder="Email Address">
                    </form>
                </div>
                <div class="connect">
                    <h2>Connect with us</h2>
                    <a href="https://www.facebook.com/"><i class="ri-facebook-circle-fill icon large-icon"></i></a>
                    <a href="https://www.instagram.com/"><i class="ri-instagram-line icon large-icon"></i></a>
                    <a href="https://twitter.com/?lang=vi"><i class="ri-twitter-fill icon large-icon"></i></a>
                </div>
            </div>
        </div>
    </footer>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="/assignment/scripts/homepage/homepage.js"></script>
    <script src="/assignment/scripts/cart/cart.js"></script>
    <script src="/assignment/scripts/general/general.js"></script>
</body>
</html>
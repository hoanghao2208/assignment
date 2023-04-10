<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- For ICON -->
    <link rel="icon" href="/assignment/assets/homepage/logo.png">
    <!-- LINK CSS -->
    <link rel="stylesheet" href="/assignment/styles/homepage/assignment/header.css">
    <link rel="stylesheet" href="/assignment/styles/homepage/assignment/footer.css">
    <link rel="stylesheet" href="/assignment/styles/productDetail/assignment/productDetail.css">
    <link rel="stylesheet" href="/assignment/styles/homepage/assignment/products.css">
    <link rel="stylesheet" href="/assignment/styles/productCart/assignment/productCart.css">
    <link rel="stylesheet" href="/assignment/styles/reset/assignment/general.css">
    <link rel="stylesheet" href="/assignment/styles/reset/assignment/reset.css">
    <!-- For SLIDER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/> 
    <!-- For ICON -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- For FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&family=Roboto+Condensed:wght@300;400;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Detail Product</title>
</head>
<body>
    <?php
        include '../../../backend/connect.php';
        global $product_id;
        global $prosID;
        if(isset($_GET['id'])){
            $product_id = $_GET['id'];
            $sql = $conn->prepare("SELECT * FROM productinfo WHERE ProID = '$product_id'");
            $sql->execute();
            $productinfo = $sql->fetch(PDO::FETCH_ASSOC);
            $prosID = $productinfo['ProsID'];
        }

    ?>
    <!-- HEADER -->
    <header class="header">
        <div class="wrapper">
            <div class="header-top flexbox">
                <a href="/assignment/frontend/index.html" class="logo">
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
                        <a href="/assignment/frontend/userInfo/assignment/userInf.html"><i class="ri-user-line icon-large searchbox-item"></i></a>
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
        <div class="detail-product">
            <div class="container">
                <div class="product-wrapper">
                    <h2 class="page-title">Product detail</h2>
                    <div class="flexwrap">
                        <div class="row">
                            <div class="item">
                                <span class="discount">
                                <?php echo round(((float)$productinfo['OriginPrice'] - (float)$productinfo['PriceDiscount'])/(float)$productinfo['OriginPrice']*100) . "%"; ?><br>OFF
                                </span>
                                <div class="big-image swiper">
                                    <div class="big-image-wrapper swiper-wrapper">
                                        <div class="image-show swiper-slide">
                                            <a data-fslightbox href="<?php echo $productinfo['ProImg']; ?>" class="picture"><img src="<?php echo $productinfo['ProImg']; ?>" alt=""></a>
                                        </div>
                                        <div class="image-show swiper-slide">
                                            <a data-fslightbox href="<?php echo $productinfo['ProImg']; ?>"><img src="<?php echo $productinfo['ProImg']; ?>" alt=""></a>
                                        </div>
                                        <div class="image-show swiper-slide">
                                            <a data-fslightbox href="<?php echo $productinfo['ProImg']; ?>"><img src="<?php echo $productinfo['ProImg']; ?>" alt=""></a>
                                        </div>
                                        <div class="image-show swiper-slide">
                                            <a data-fslightbox href="<?php echo $productinfo['ProImg']; ?>"><img src="<?php echo $productinfo['ProImg']; ?>" alt=""></a>
                                        </div>
                                    </div>

                                    <!-- If we need navigation buttons -->
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>

                                <div class="small-image">
                                    <ul class="small-image-wrapper swiper-wrapper">
                                        <li class="small-img swiper-slide">
                                            <img src="<?php echo $productinfo['ProImg']; ?>" alt="">
                                        </li>
                                        <li class="small-img swiper-slide">
                                            <img src="<?php echo $productinfo['ProImg']; ?>" alt="">
                                        </li>
                                        <li class="small-img swiper-slide">
                                            <img src="<?php echo $productinfo['ProImg']; ?>" alt="">
                                        </li>
                                        <li class="small-img swiper-slide">
                                            <img src="<?php echo $productinfo['ProImg']; ?>" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="item">
                                <h1 class="product-name">
                                    <?php echo $productinfo['ProName']; ?>
                                </h1>
                                <h3 class="product-desc">
                                    Glossy Cube
                                </h3>
                                <div class="content">
                                    <div class="stars"></div>
                                    <div class="price">
                                        <span class="current">$<?php echo $productinfo['OriginPrice']; ?></span>
                                        <span class="normal">$<?php echo $productinfo['PriceDiscount']; ?></span>
                                    </div>
                                    <div class="actions">
                                        <p class="title">Quantity</p>
                                        <div class="qty-control">
                                            <button class="minus">-</button>
                                            <input type="text" value="1" class="act-value">
                                            <button class="plus">+</button>
                                        </div>
                                    </div>
                                    <div class="origin">
                                        <span class="title">Origin: <span class="where"><?php echo $productinfo['Origin']; ?></span></span>
                                    </div>
                                    <div class="button-cart">
                                        <div class="wrap-button">
                                            <div class="button-add">
                                                <button class="button">Add to Cart <i class="ri-shopping-cart-line"></i></button>
                                            </div>
                                            <div class="button-buy">
                                                <button class="button">Buy now</button>
                                            </div>
                                        </div>
                                        <div class="wish-share">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <span class="icon-large"><i class="ri-heart-line"></i></span>
                                                        <span class="act">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="icon-large"><i class="ri-share-line"></i></span>
                                                        <span class="act">Share</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="description collapse">
                                        <ul>
                                            <li class="has-child">
                                                <a href="#" class="icon-small">Information</a>
                                                <ul class="content">
                                                    <li><span>Manufacture</span> <span>2022</span></li>
                                                    <li><span>Weight</span> <span>10kg</span></li>
                                                    <li><span>Material</span> <span>Wood</span></li>
                                                    <li><span>Warranty</span> <span>24 months</span></li>
                                                </ul>
                                            </li>

                                            <li class="has-child">
                                                <a href="#" class="icon-small">Description</a>
                                                <div class="content">
                                                    <p><?php echo $productinfo['ProDes']; ?></p>
                                                </div>
                                            </li>

                                            <li class="has-child expand">
                                                <a href="#" class="icon-small">Reviews</a>
                                                <div class="content">
                                                    <div class="reviews">
                                                        <h4>Customers Reviews</h4>
                                                        <div class="review-block">
                                                            <div class="review-block-head">
                                                                <a href="#review-form" class="secondary-button">Write Review</a>
                                                            </div>
                                                            <div class="review-block-body">
                                                                <ul>
                                                                    
                                                                </ul>
                                                            </div>
                                                            <div id="review-form" class="review-form">
                                                                <h4>Write a review</h4>
                                                                <form action="" autocomplete="off">
                                                                    <p>
                                                                        <div class="rating">
                                                                            <p>Are you satisfied enough?</p>
                                                                            <div class="rate-this">
                                                                                <input type="radio" name="rating" id="star1">
                                                                                <label for="star1"><i class="ri-star-fill"></i></label>
                                                                                
                                                                                <input type="radio" name="rating" id="star2">
                                                                                <label for="star2"><i class="ri-star-fill"></i></label>
                                                                                
                                                                                <input type="radio" name="rating" id="star3">
                                                                                <label for="star3"><i class="ri-star-fill"></i></label>
                                                                                
                                                                                <input type="radio" name="rating" id="star4">
                                                                                <label for="star4"><i class="ri-star-fill"></i></label>
                                                                                 
                                                                                <input type="radio" name="rating" id="star5">
                                                                                <label for="star5"><i class="ri-star-fill"></i></label>
                                                                            </div>
                                                                        </div>
                                                                    </p>
                                                                    <p>
                                                                        <label for="name">Name</label>
                                                                        <input type="text" id="name" required>
                                                                    </p>

                                                                    <p>
                                                                        <label for="sum">Summary</label>
                                                                        <input type="text" id="sum" required>
                                                                    </p>

                                                                    <p>
                                                                        <label for="review">Review</label>
                                                                        <textarea cols="30" rows="10" id="review"></textarea>
                                                                    </p>
                                                                    <p>
                                                                        <button type="submit" class="submit-button">Submit Review</button>
                                                                    </p>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

        <!-- related product -->
        <div class="featured">
            <div class="container">
                <div class="all-products">
                    <div class="product-title">
                        <h2><span class="circle"></span>Related Products</h2>
                    </div>
                </div>

                <div class="product main flexwrap">
                    <?php
                        include '../../../backend/connect.php';
                        $a=1;
                        $stmt = $conn->prepare(
                                "SELECT * FROM productinfo WHERE ProsID = $prosID AND ProID <> $product_id");
                        $stmt->execute();
                        $productinfos = $stmt->fetchAll();
                        foreach($productinfos as $productinfo)
                        {
                            
                    ?>
                    <div class="item">
                        <div class="media">
                            <div class="thumbnail object-cover">
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
                                <span>(2,548)</span>
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
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.4.1/index.js"></script>
    <script src="/assignment/scripts/cart/assignment/cart.js"></script>
    <script src="/assignment/scripts/general/assignment/general.js"></script>
</body>
</html>
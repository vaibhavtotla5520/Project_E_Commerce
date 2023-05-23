<?php
session_start();
if (isset($_SESSION['cart'])) {
    $cart = count($_SESSION['cart']);
} else {
    $cart = 0;
}
// print_r($_SESSION);
// die;
if(isset($_GET['alert'])) {
    echo "<script>window.alert('".$_GET['alert']."');</script>";
}
$signout_btn = false;
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $signout_btn = true;
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GoodWoodArts Wooden Handicrafts and more</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Wooden Handicrafts, Furniture Interior & Exterior Items and more" />
    <meta name="keywords" content="wood, wooden, handicraft, furniture, goodwoodarts, good wood arts, art, creativity, recycle, reusable, forest, wooden items, wooden kitchen items" />
    <meta name="author" content="bullox.tech" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

    <style>
        i {
            padding: 0px 3px 0px 3px;
        }

        #fh5co-product {
            padding-top: 0px;
        }

        .cart_control_btn {
            /* width: 100%; */
            float: right;
            margin-bottom: 10px;
            /* border: 1px solid black; */
        }

        .total_amount {
            font-weight: bold;
            font-size: larger;
            color: #000;
        }
    </style>

</head>

<body>

    <div class="fh5co-loader"></div>

    <div id="page">
        <nav class="fh5co-nav" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-2">
                        <div id="fh5co-logo"><a href="index.php"><img id="logo-img" src="images/logo.png" width="100%" /></a></div>
                    </div>
                    <div class="col-md-6 col-xs-6 text-center menu-1">
                        <ul>
                            <li class="has-dropdown">
                                <a href="product.php">Gallery</a>
                            </li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="customer.php">Customers</a></li>
                            <?php 
                                echo $signout_btn ? '<li><a href="backend/request_handler.php?sign_out=1">Sign Out</a></li>' : '';
                            ?>
                            <!-- <li class="has-dropdown">
							<a href="">FIlters</a>
							<ul class="dropdown">
								<li><a href="#">Price Low to High</a></li>
								<li><a href="#">Price High to Low</a></li>
								<li><a href="#">By Category</a></li>
								<li><a href="#">API</a></li>
							</ul>
						</li> -->
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
                        <ul>
                            <li class="search">
                                <div class="input-group">
                                    <input type="text" placeholder="Search..">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
                                    </span>
                                </div>
                            </li>
                            <li class="shopping-cart"><a href="cart.php" class="cart"><span><small><?php echo $cart; ?></small><i class="icon-shopping-cart"></i></span></a>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>
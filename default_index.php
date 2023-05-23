<?php
require "backend/Main.php";
$obj = new Main;
// die($obj->get_products(12));
$limit = isset($_GET['limit']) && !empty($_GET['limit']) ? $_GET['limit'] : 12;
$current_page = isset($_GET['limit']) && !empty($_GET['limit']) ? $_GET['limit'] : 1;
$data = $obj->get_products($limit);
include "header.php";
?>


        <div id="fh5co-product" style="padding-top:0px;">
            <div class="container">
                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <!--<h2>Products.</h2>-->
                    </div>
                </div>
                <div class="row">
                    <?php
                    if (!empty($data)) {
                        $data = json_decode($data, true);
                        foreach ($data as $value) {
                            $image_thumb = explode(",", $value['product_images']);
                            echo '
					<div class="col-md-4 text-center animate-box">
					<div class="product">
						<div class="product-grid" style="background-image:url(images/' . $image_thumb[0] . '.jpg);">
                        <!--<div class="inner">
                        <p>
                            <a href="" class="icon"><i class="icon-shopping-cart"></i></a>
                            <a href="" class="icon"><i class="icon-eye"></i></a>
                        </p>
                    </div>-->
						</div>
						<div class="desc">
						<h3>
                            <a href="single.php?p_id=' . $value['product_id'] . '">' . $value['product_name'] . '</a>
                        </h3>
							<span class="price">&#8377;' . $value['product_price'] . '</span>

                            <a href="backend/request_handler.php?add_to_cart=' . $value['product_id'] . '" class="icon"><i class="icon-shopping-cart"></i></a>

							<a href="single.php?p_id=' . $value['product_id'] . '" class="icon"><i class="icon-eye"></i></a>
						</div>
					</div>
				</div>';
                        }
                    } else {
                        echo "No products to show";
                    }
                    ?>
                    <nav aria-label="">
                        <ul class="nav nav-tabs " style="float:right;">
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Filters</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><b>&nbsp;Price High to Low</b></a><br>
                                    <a class="dropdown-item" href="#"><b>&nbsp;Price Low to High</b></a><br>
                                    <a class="dropdown-item" href="#"><b>&nbsp;By Category</b></a>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </li> -->
                        <!-- </ul>
                        <ul class="pagination"> -->
                            <li class="page-item" style="padding-left:5px;">
                                <a class="page-link" href="backend/request_handler.php?pagination=previous&limit=<?php echo $limit; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" id="current_page"><?php echo $current_page; ?></a></li>
                            <!-- <li class="page-item"><a class="page-link" href="#">2</a></li> -->
                            <!-- <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                            <li class="page-item">
                                <a class="page-link" href="backend/request_handler.php?pagination=next&limit=<?php echo $limit; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- <aside id="fh5co-hero" class="js-fullheight">
            <div class="flexslider js-fullheight">
                <ul class="slides">
                    <li style="background-image: url(images/img_bg_1.jpg);">
                        <div class="overlay-gradient"></div>
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <span class="price">$800</span>
                                        <h2>Alato Cabinet</h2>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
                                        <p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url(images/img_bg_2.jpg);">
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <span class="price">$530</span>
                                        <h2>The Haluz Rocking Chair</h2>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
                                        <p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url(images/img_bg_3.jpg);">
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <span class="price">$750</span>
                                        <h2>Alato Cabinet</h2>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
                                        <p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url(images/img_bg_4.jpg);">
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <span class="price">$540</span>
                                        <h2>The WW Chair</h2>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
                                        <p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>

        <div id="fh5co-services" class="fh5co-bg-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 text-center">
                        <div class="feature-center animate-box" data-animate-effect="fadeIn">
                            <span class="icon">
                                <i class="icon-credit-card"></i>
                            </span>
                            <h3>Credit Card</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
                            <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <div class="feature-center animate-box" data-animate-effect="fadeIn">
                            <span class="icon">
                                <i class="icon-wallet"></i>
                            </span>
                            <h3>Save Money</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
                            <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <div class="feature-center animate-box" data-animate-effect="fadeIn">
                            <span class="icon">
                                <i class="icon-paper-plane"></i>
                            </span>
                            <h3>Free Delivery</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
                            <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-testimonial" class="fh5co-bg-section">
            <div class="container">
                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <span>Testimony</span>
                        <h2>Happy Clients</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row animate-box">
                            <div class="owl-carousel owl-carousel-fullwidth">
                                <div class="item">
                                    <div class="testimony-slide active text-center">
                                        <figure>
                                            <img src="images/person1.jpg" alt="user">
                                        </figure>
                                        <span>Jean Doe, via <a href="#" class="twitter">Twitter</a></span>
                                        <blockquote>
                                            <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-slide active text-center">
                                        <figure>
                                            <img src="images/person2.jpg" alt="user">
                                        </figure>
                                        <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                        <blockquote>
                                            <p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-slide active text-center">
                                        <figure>
                                            <img src="images/person3.jpg" alt="user">
                                        </figure>
                                        <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                        <blockquote>
                                            <p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(images/img_bg_5.jpg);">
            <div class="container">
                <div class="row">
                    <div class="display-t">
                        <div class="display-tc">
                            <div class="col-md-3 col-sm-6 animate-box">
                                <div class="feature-center">
                                    <span class="icon">
                                        <i class="icon-eye"></i>
                                    </span>

                                    <span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
                                    <span class="counter-label">Creativity Fuel</span>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 animate-box">
                                <div class="feature-center">
                                    <span class="icon">
                                        <i class="icon-shopping-cart"></i>
                                    </span>

                                    <span class="counter js-counter" data-from="0" data-to="450" data-speed="5000" data-refresh-interval="50">1</span>
                                    <span class="counter-label">Happy Clients</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 animate-box">
                                <div class="feature-center">
                                    <span class="icon">
                                        <i class="icon-shop"></i>
                                    </span>
                                    <span class="counter js-counter" data-from="0" data-to="700" data-speed="5000" data-refresh-interval="50">1</span>
                                    <span class="counter-label">All Products</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 animate-box">
                                <div class="feature-center">
                                    <span class="icon">
                                        <i class="icon-clock"></i>
                                    </span>

                                    <span class="counter js-counter" data-from="0" data-to="5605" data-speed="5000" data-refresh-interval="50">1</span>
                                    <span class="counter-label">Hours Spent</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
<?php
include "footer.php";
?>
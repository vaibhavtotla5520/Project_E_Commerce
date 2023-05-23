<?php
require "backend/Main.php";
$obj = new Main;
// die($obj->get_products(12));
$limit = isset($_GET['limit']) && !empty($_GET['limit']) ? $_GET['limit'] : 0;
$current_page = isset($_GET['current_page']) && !empty($_GET['current_page']) ? $_GET['current_page'] : 1;
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
                            <li class="page-item" style="padding-left:5px;">
                                <a class="page-link" href="backend/request_handler.php?pagination=previous&limit=<?php echo $limit."&current_page=".$current_page; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" id="current_page"><?php echo $current_page; ?></a></li>
                            <li class="page-item">
                                <a class="page-link" href="backend/request_handler.php?pagination=next&limit=<?php echo $limit."&current_page=".$current_page; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
<?php
include "footer.php";
?>
<?php
include "header.php";
require "backend/Main.php";
$obj = new Main;
if(isset($_SESSION['cart'])) {
    $data = json_decode($obj->get_cart_items($_SESSION['cart']), true);
    $total_amount = $obj->get_total_amount($_SESSION['cart']);
} else {
    $data = [];
    $total_amount = 0;
}
// echo "<pre>";
// print_r($data);
// die;
?>
<div id="fh5co-product">
    <div class="container" id="cart_container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <!-- <span>Cool Stuff</span> -->
                <h2>Cart</h2>
                <p>Items</p>
            </div>
            <p class="total_amount btn">Items Worth : &#8377;<?php echo $total_amount; ?></p>
            <table class="cart_control_btn">
                <tr>
                    <td style="padding:15px 20px 0px 0px;">
                        
                    </td>
                    <td>
                        <a href="backend/request_handler.php?clear_cart=1"><button class="btn">Clear Cart</button></a>
                    </td>
                    <td>
                        <a href="checkout.php"><button class="btn">Check Out</button></a>
                    </td>
                </tr>
            </table>
        </div>
        <ul class="list-group list-group-flush">
            <?php
            if (count($data) == 0) {
                echo "<h3>Oops, It seems lonely here :)<br>Go to <a href='index.php'>Home</a> page to get some crowd</h3>";
            } else {
                foreach ($data as $items) {
                    $img = explode(",", $items['product_images']);
                    echo '<li class="list-group-item">
                        <span>
                            <img src="images/' . $img[0] . '.jpg" width="15%">
                        </span>
                        <span>
                            ' . $items['product_name'] . '&nbsp;&nbsp;&#8377;<b>' . $items['product_price'] . '</b>/Each
                        </span><br>
                        <span id="cart_element" style="padding-left:35%;">
                            <a class="btn" href="backend/request_handler.php?qty=minusOne&p_id=' . $items['product_id'] . '">-</a>
                            &nbsp;&nbsp;<b id="' . $items['product_id'] . '">' . $items['qty'] . '</b>&nbsp;&nbsp;
                            <a class="btn" href="backend/request_handler.php?qty=addOne&p_id=' . $items['product_id'] . '">+</a>
                        </span>
                    </li>';
                }
            }
            ?>

        </ul>
    </div>
</div>
<?php
include "footer.php";
?>
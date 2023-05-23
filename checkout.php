<?php
include "header.php";
require "backend/Main.php";
$obj = new Main;
if (isset($_SESSION['cart'])) {
    $data = json_decode($obj->get_cart_items($_SESSION['cart']), true);
    $total_amount = $obj->get_total_amount($_SESSION['cart']);
} else {
    $data = [];
    $total_amount = 0;
}
if(empty($data)) {
    echo "<script>window.alert('Sorry, but there is nothing to make checkout!');window.location = 'index.php';</script>";
}
?>
<div class="container" id="fh5co-product">
    <div class="row animate-box">
        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
            <!-- <span>Cool Stuff</span> -->
            <h2>Checkout</h2>
            <p style="color:red;">NOTE: Transportation/freight charges will be applicable separately, depending on your location, and payment link will be mailed to you.</p>
        </div>
        <!-- <p class="total_amount btn">Items Worth : &#8377;</p> -->
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
                foreach($data as $items) {
                    $count++;
                    echo '
                    <tr>
                    <th scope="row">'.$count.'</th>
                    <td>'.$items['product_id'].'</td>
                    <td>'.$items['product_name'].'</td>
                    <td>'.$items['qty'].'</td>
                    <td>&#8377; '.$items['product_price'].'</td>
                    </tr>
                    ';
                }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <th scope="row">GST 18%</th>
                <th scope="row">&#8377; <?php echo round($total_amount*0.18); ?></th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <th scope="row">Total</th>
                <th scope="row">&#8377; <?php echo round($total_amount + $total_amount*0.18); ?></th>
            </tr>
        </tbody>
    </table>
    <table class="cart_control_btn">
        <tr>
            <td>
                <a href="backend/request_handler.php?checkout=1"><button class="btn">Pay Amount</button></a>
                <a href="cart.php"><button class="btn">Edit</button></a>
            </td>
        </tr>
    </table>
</div>
<?php
include "footer.php";
?>
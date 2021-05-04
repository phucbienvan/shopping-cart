<?php
include "../App/Views/Home/layout/header.php";
//include "../App/Views/Home/layout/slider.php";
?>

<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2>Your Cart</h2>
                <table class="tblone">
                    <tr>
                        <th width="20%">Product Name</th>
                        <th width="10%">Image</th>
                        <th width="15%">Price</th>
                        <th width="25%">Quantity</th>
                        <th width="20%">Total Price</th>
                        <th width="10%">Action</th>
                    </tr>
                    <?php
                    $total_price = 0;
                    $sub_total = 0;
                    foreach ($cart as $item){
                        $total_price = $item['quantity'] * $item['unit_price'];
                        $sub_total += $total_price;
                    ?>
                    <tr>
                        <td><?php echo $item['name']?></td>
                        <td><img src="/uploads/<?php echo $item['image']?>" alt=""/></td>
                        <td><?php echo $item['unit_price']?></td>
                        <td>
                        <?php  echo $item['quantity']?>
                        </td>
                        <td>
                            <?php
                            echo $total_price
                            ?></td>
                        <td><a href="/cart/<?php echo $item['id_cart']?>">Delete</a></td>
                    </tr>
                    <?php } ?>
                </table>
                <table style="float:right;text-align:left;" width="40%">
                    <tr>
                        <th>Sub Total : </th>
                        <td><?php echo $sub_total?></td>
                    </tr>

                    <tr>
                        <th>Grand Total :</th>
                        <td>
                            <?php
                            echo $sub_total;
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="shopping">
                <div class="shopleft">
                    <a href="index"> <img src="images/shop.png" alt="" /></a>
                </div>
                <div class="shopright">
                    <a href="checkout"> <img src="images/check.png" alt="" /></a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php
include "../App/Views/Home/layout/footer.php";

?>
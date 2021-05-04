<?php
include "../App/Views/Home/layout/header.php";
//include "../App/Views/Home/layout/slider.php";
?>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
                        <img src="/uploads/<?php echo $productById['image']?>">
					</div>

				<div class="desc span_3_of_2">
					<h2><?php echo $productById['name']?></h2>
                    <p><?php echo $productById['description']?></p>
					<div class="price">
						<p>Price: <span><?php echo $productById['unit_price']?></span></p>
						<p>Category: <span><?php echo $category['name'] ?></span></p>

					</div>
				<div class="add-cart">
					<form method="post">
						<input type="number" name="quantity" value="1"/>
						<input type="submit"  name="submit" value="Buy Now"/>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
	    </div>
<!--	    --><?php //} ?>
				
	</div>

 		</div>
 	</div>

<?php
include "../App/Views/Home/layout/footer.php";

?>
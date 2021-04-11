<?php  include('includes/header.php') ?>
<hr>

<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <!-- <th>Total</th> -->
						      </tr>
						    </thead>
						    <tbody>

							<?php 
$sql = "SELECT * FROM carts JOIN products ON carts.product_id = products.product_id WHERE cart_number =  '{$_SESSION['cart_number']}' ORDER BY cart_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $product_id = $row["product_id"];
      $product_name = $row["product_name"];
      $product_features = $row["product_features"];
      $product_prize = $row["product_prize"];
      $product_image = $row["product_image"];
      $product_date = $row["product_date"];
  
?>


						      <tr class="text-center">
						        <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(images/<?php echo $product_image ?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $product_name ?></h3>
						        	<p><?php echo $product_features ?></p>
						        </td>   
						        <td class="price">$<?php echo $product_prize ?>.00</td>
<!-- 						        
						        <td class="total">$4.00</td> -->
						      </tr><!-- END TR-->
							  
							  <?php }
                            } else {
                              echo "0 results";
                            }
                            ?>
						    
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">


			<?php
$sql = "SELECT sum(1 * product_prize) As OrderTotal  FROM products JOIN carts ON products.product_id = carts.product_id
WHERE cart_number = '{$_SESSION['cart_number']}' ORDER BY cart_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //   $product_id = $row["product_id"];
    $OrderTotal = $row['OrderTotal'];
//    echo "$$OrderTotal.00";
}
}
?>
    	
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>$<?php echo $OrderTotal ?>.00</span>
    					</p>
    				</div>
    				<p><a href="checkout.php" class="btn btn-primary py-3 px-4">Proceed to Ordering</a></p>
    			</div>
    		</div>
			</div>
		</section>

	<?php  include('includes/footer.php') ?>
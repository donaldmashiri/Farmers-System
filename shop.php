<?php  include('includes/header.php') ?>
<hr>
    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-3 text-center">
    				<h2>Our Products</h2>
    			</div>
    		</div>
    		<div class="row">

			<?php 


$sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 5";
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


    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="product.php?check=<?php echo $product_id ?>" class="img-prod"><img class="img-fluid" src="images/<?php echo $product_image ?>" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?php echo $product_name ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale">$<?php echo $product_prize ?>.00</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    					
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>

				<?php }
                            } else {
                              echo "0 results";
                            }
                            ?>
			
    	
    		</div>
    	</div>
    </section>

	<?php  include('includes/footer.php') ?>
<?php  include('includes/header.php') ?>
<hr>


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

<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="" method="post" class="billing-form">
							<h3 class="mb-4 billing-heading">Ordering Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Full Name(s)</label>
	                  <input type="text" name="first_name" class="form-control" minLength="4" required placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
                  <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="text" name="customer_email" class="form-control" minLength="4" required placeholder="">
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Province</label>
		            	<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="customer_province" id="" class="form-control">
		                  	<option value="Midlands">Midlands</option>
		                    <option value="Harare">Harare</option>
		                    <option value="Bulawayo">Bulawayo</option>
		                    <option value="Manicaland">Manicaland</option>
		                    <option value="Matebeland">Matebeland</option>
		                    <option value="Chitungwiza">Chitungwiza</option>
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <input type="text" name="customer_address" class="form-control" minLength="4" required placeholder="House number and street name">
	                </div>
		            </div>
		            <div class="col-md-6">
                    <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" name="phone_number" class="form-control" minLength="4" required placeholder="">
	                </div>
		            </div>
		            
		        
                <div class="w-100"></div>
             
	            </div>
	          <!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>$0.0</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>$0.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>$0.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>


		    						<span>$<?php echo $OrderTotal ?>.00</span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment is done delivery</h3>
                                    <button name="ordering" class="btn btn-success btn-block" type="submit">Order</button>
								</div>
	          	</div>
                  </form>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

    <!-- `order_id`, `cart_number`, `first_name`, `customer_province`, `customer_email`, `phone_number`, `customer_address`, `order_date`, `order_status` FROM `orders` WHERE 1 -->

    <?php
        if(isset($_POST['ordering'])){

        $first_name = $_POST['first_name'];
        $customer_province = $_POST['customer_province'];
        $customer_email = $_POST['customer_email'];
        $customer_address = $_POST['customer_address'];
        $phone_number = $_POST['phone_number'];

		$sql = "SELECT * FROM subscribers WHERE sub_email = '{$customer_email}' ";
		$result = $conn->query($sql);

		if ($result->num_rows >= 1) {
			 $sql = "INSERT INTO orders (cart_number, first_name, customer_province, customer_email, phone_number, customer_address, order_date)
			VALUES ({$_SESSION['cart_number']}, '{$first_name}', '{$customer_province}', '{$customer_email}','{$phone_number}', '{$customer_address}', now())";

			if ($conn->query($sql) === TRUE) {
				
				header("Location: excellent.php" );
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			} 

		}else{
			$sql = "INSERT INTO orders (cart_number, first_name, customer_province, customer_email, phone_number, customer_address, order_date)
			VALUES ({$_SESSION['cart_number']}, '{$first_name}', '{$customer_province}', '{$customer_email}','{$phone_number}', '{$customer_address}', now())";

			if ($conn->query($sql) === TRUE) {
				
				header("Location: done.php" );
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			} 
		}


	
        
        // $sql = "INSERT INTO orders (cart_number, first_name, customer_province, customer_email, phone_number, customer_address, order_date)
        // VALUES ({$_SESSION['cart_number']}, '{$first_name}', '{$customer_province}', '{$customer_email}','{$phone_number}', '{$customer_address}', now())";

        
        // if ($conn->query($sql) === TRUE) {
			
        //     header("Location: done.php" );
        // echo "<p class='alert alert-success text-center'>Your Products was successfully order</p>";
        // } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        // } 
    }
        ?>












	<?php  include('includes/footer.php') ?>
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
      <h3 class="mb-4 billing-heading">Make Conversation With farmers</h3>
        <div class="row justify-content-center">
          <div class="col-xl-4 ftco-animate">
						<form action="" method="post" class="billing-form">
						
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Name:</label>
	                  <input type="text" name="chat_name" class="form-control" minLength="4" required placeholder="">
	                </div>
	              </div>
	              <div class="col-md-12">
                  <div class="form-group">
	                	<label for="emailaddress">Send Message</label>
                        <textarea name="chat_message" class="form-control" id="" cols="15" rows="3"></textarea>
	                  <!-- <input type="text" name="customer_email" class="form-control" minLength="4" required placeholder=""> -->
	                </div>
                </div>
                   
		            <div class="col-md-6">
                    <div class="form-group">
                    <button name="send" class="btn btn-success btn-block" type="submit">Send</button>
	                </div>
		            </div>
		            
		        
                <div class="w-100"></div>
             
	            </div>
	          <!-- END -->
					</div>
					<div class="bg-light col-xl-8">
	          <div class="row">
              <?php 


$sql = "SELECT * FROM chats ORDER BY chat_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $chat_id = $row["product_id"];
      $chat_name = $row["chat_name"];
      $chat_message = $row["chat_message"];
      $chat_reply = $row["chat_reply"];
      $chat_date = $row["chat_date"];
      
  
?>
	          	<div class="col-md-12 d-flex">
                    <div class="cart-detail cart-total p-md-4">
                        <p><?php echo $chat_name ?>: <small><?php echo $chat_message ?></small> </p>
                        <p class="text-right">Reply: <small><?php echo $chat_reply ?></small> </p>
                    </div>              
	          	</div>

                  <?php }
                            } else {
                              echo "0 results";
                            }
                            ?>

	          
                  </form>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

    <!-- `order_id`, `cart_number`, `first_name`, `customer_province`, `customer_email`, `phone_number`, `customer_address`, `order_date`, `order_status` FROM `orders` WHERE 1 -->

    <?php
        if(isset($_POST['send'])){

        $chat_name = $_POST['chat_name'];
        $chat_message = $_POST['chat_message'];
       
        
        $sql = "INSERT INTO chats (chat_name, chat_message, chat_date)
        VALUES ('{$chat_name}', '{$chat_message}', now())";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: done.php" );
        echo "<p class='alert alert-success text-center'>Your Products was successfully order</p>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        } 
    }
        ?>












	<?php  include('includes/footer.php') ?>
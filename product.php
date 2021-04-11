<?php  include('includes/header.php') ?>
<hr>

<?php 

$id = $_GET['check'];

$sql = "SELECT * FROM products WHERE product_id = $id";
$result = $conn->query($sql);

  // output data of each row
  while($row = $result->fetch_assoc()) {
      $product_id = $row["product_id"];
      $product_name = $row["product_name"];
      $product_features = $row["product_features"];
      $product_prize = $row["product_prize"];
      $product_image = $row["product_image"];
      $product_date = $row["product_date"];
  }
?>

<?php 


if (isset($_POST['add_to_cart'])) {
    
    if (empty($_SESSION['cart_number'])){



        $cart_number = rand();

        $_SESSION['cart_number'] = $cart_number;

        $sql = "INSERT INTO carts(product_id, cart_number) ";
        $sql.= "VALUES('{$id}','{$_SESSION['cart_number']}')";
            
        if ($conn->query($sql) === TRUE) {
            echo "<p class='alert alert-success text-center'>Your Product was successfully added</p>";
            header("Location: cart.php");
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
         
        
    }else{
      $sql = "INSERT INTO carts(product_id, cart_number) ";
      $sql.= "VALUES('{$id}','{$_SESSION['cart_number']}')";
            
        if ($conn->query($sql) === TRUE) {
            echo "<p class='alert alert-success text-center'>Your Product was successfully added</p>";
            header("Location: cart.php");
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
         
    } 
   }

?>


    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/<?php echo $product_image ?>" class="image-popup"><img src="images/<?php echo $product_image ?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $product_name ?></h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p>
						</div>
    				<p class="price"><span>$<?php echo $product_prize ?>.00</span></p>
    				<p><?php echo $product_features ?></p>
				
          <form action="" method="post">
              <button name="add_to_cart" type="submit"  class="btn btn-success btn-block text-dark">Add to cart</button>
            </form>
    			</div>
    		</div>
    	</div>
    </section>


    



	<?php  include('includes/footer.php') ?>
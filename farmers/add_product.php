<?php include('includes/header.php') ?>


    <main class="main">
        <!-- Sidebar Nav -->
      <?php include('includes/sidebar.php'); ?>
        <!-- End Sidebar Nav -->

        <div class="content">
            <div class="py-4 px-3 px-md-4">

                <div class="mb-3 mb-md-4 d-flex justify-content-between">
                    <div class="h3 mb-0">Add New Prodcuts</div>
                </div>

                <?php // include('dash.php') ?>

             

          
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3 mb-md-4">
                            <div class="card-header">
                                <h5 class="font-weight-semi-bold mb-0">Add New Prodcuts</h5>
                            </div>

                            <div class="card-body pt-0">
                            <form action="" method="POST" enctype="multipart/form-data">

                            <?php

if(isset($_POST['create'])){

$product_name = $_POST['product_name'];
$product_features = $_POST['product_features'];
$product_prize = $_POST['product_prize'];
$product_image = $_FILES['image']['name'];
$product_image_temp = $_FILES['image']['tmp_name'];

move_uploaded_file($product_image_temp, "../images/$product_image");

$sql = "INSERT INTO products (product_name, farmer_id, product_features, product_prize, product_image, product_date)
VALUES ('{$product_name}','{$_SESSION['farmer_id']}', '{$product_features}', '{$product_prize}', '{$product_image}', now())";

if ($conn->query($sql) === TRUE) {
  echo "<p class='alert alert-success text-center'>Your Product was successfully added</p>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

?>

                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Product Name</label>
                                    <input type="text" class="form-control" value="" id="name" name="product_name" placeholder="User Name">
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="email">Product Prize</label>
                                    <input type="number" class="form-control" value="" id="email" name="product_prize" placeholder="Product Price">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="password">Product Image</label>
                                    <input type="file" class="form-control" value="" id="password" name="image" >
                                </div>
                            
                                <div class="form-group col-12 col-md-6">
                                    <label for="password_confirm">Product features</label>
                                    <textarea name="product_features" id="" cols="30" rows="10" class="form-control" placeholder="Product Descriptions"></textarea>
                                </div>
                            </div>
                            <button type="submit" name="create" class="btn btn-primary float-right">Create</button>

                        </form>



                            </div>
                        </div>
                    </div>
                </div>


            </div>

        <?php include('includes/footer.php') ?>  
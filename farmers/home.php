<?php include('includes/header.php');

if(empty($_SESSION['farmer_id'])){
    header('location: index.php');
}

?>



    <main class="main">
        <!-- Sidebar Nav -->
      <?php include('includes/sidebar.php'); ?>
        <!-- End Sidebar Nav -->

        <div class="content">
            <div class="py-4 px-3 px-md-4">

                <div class="mb-3 mb-md-4 d-flex justify-content-between">
                    <div class="h3 mb-0">Dashboard</div>
                </div>

                <?php // include('dash.php') ?>

             

          
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3 mb-md-4">
                            <div class="card-header">
                                <h5 class="font-weight-semi-bold mb-0">Recent Prodcuts</h5>
                            </div>

                            <div class="card-body pt-0">
                                <div class="table-responsive-xl">
                                    <table class="table text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Product Name</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Description</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Amount</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Image</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 


$sql = "SELECT * FROM products JOIN farmers ON products.farmer_id = farmers.farmer_id WHERE products.farmer_id = '{$_SESSION['farmer_id']}' ORDER BY product_id DESC LIMIT 5";
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



                                            <tr>
                                                <td class="py-3"><?php echo $product_id ?></td>
                                                <td class="py-3">
                                                    <div><?php echo $product_name ?></div>
                                                    
                                                </td>
                                                <td class="py-3"><?php echo $product_features ?></td>
                                                <td class="py-3">$<?php echo $product_prize ?>.00</td>
                                                <td class="py-3">
                                                    <img src="../images/<?php echo $product_image ?>" width="100" height="50" alt="" srcset="">
                                                    <!-- <span class="badge badge-pill badge-warning">Pending</span> -->
                                                </td>
                                                <td class="py-3"><?php echo $product_date ?></td>
                                            </tr>

                                            <?php }
                            } else {
                              echo "0 results";
                            }
                            ?>

                                     
                                        </tbody>
                                    </table>
                                </div>

<a href="all.php" class="text-center">View All</a>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        <?php include('includes/footer.php') ?>  
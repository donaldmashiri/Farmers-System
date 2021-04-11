<?php include('includes/header.php');

?>



    <main class="main">
        <!-- Sidebar Nav -->
      <?php include('includes/sidebar.php'); ?>
        <!-- End Sidebar Nav -->

        <div class="content">
            <div class="py-4 px-3 px-md-4">

                <div class="mb-3 mb-md-4 d-flex justify-content-between">
                    <div class="h3 mb-0">Reports</div>
                </div>

                <?php  include('dash.php') ?>

                  
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3 mb-md-4">
                            <div class="card-header">
                                <h5 class="font-weight-semi-bold mb-0">Orders</h5>
                            </div>

                            <div class="card-body pt-0">
                                <div class="table-responsive-xl">
                                    <table class="table text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Reference #</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Customer Name</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Customer email</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Contact Number</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 


// $sql = "SELECT * FROM orders
// JOIN carts ON orders.cart_number = carts.cart_number 
// JOIN products ON products.product_id =  carts.product_id  ORDER BY order_id DESC";

$sql = "SELECT * FROM orders  ORDER BY order_id DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $order_id = $row["order_id"];
      $cart_number = $row["cart_number"];
      $customer_address = $row["customer_address"];
      $customer_province = $row["customer_province"];
      $phone_number = $row["phone_number"];
      $customer_email = $row["customer_email"];
      $first_name = $row["first_name"];
      $order_date = $row["order_date"];


  
?>



                                            <tr>
                                                <td class="py-3"><?php echo $order_id ?></td>
                                                <td class="py-3">
                                                    <div><?php echo $cart_number ?></div>
                                                    
                                                </td>
                                                <td class="py-3"><?php echo $first_name ?></td>
                                                <td class="py-3"><?php echo $customer_email ?></td>
                                                <td class="py-3"><?php echo $phone_number ?></td>
                                                <td class="py-3"><?php echo $order_date ?></td>
                                                <td class="py-3">
                                                    <a href="open.php?open=<?php echo $order_id ?>" class="btn btn-info">Order details</a>
                                                </td>
                                            </tr>

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
                    </div>
                </div>


            </div>

        <?php include('includes/footer.php') ?>  
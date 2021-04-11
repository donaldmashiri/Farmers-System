<div class="row">
                 
                    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
                        <!-- Widget --> <a href="all.php">
                        <div class="card flex-row align-items-center p-3 p-md-4">
                            <div class="icon icon-lg bg-soft-primary rounded-circle mr-3">
                                <i class="gd-bar-chart icon-text d-inline-block text-primary"></i>
                            </div>
                            <div>
                                <h4 class="lh-1 mb-1">
                                <?php

$query = "SELECT count(product_id) As pdtc FROM products";
$select_count = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($select_count)) {
    $count = $row['pdtc'];
    echo $count;
  
}

?>
                                </h4>
                                <h6 class="mb-0"> All Products</h6>
                            </div>
                            <i class="gd-arrow-up icon-text d-flex text-success ml-auto"></i>
                        </div></a>
                        <!-- End Widget -->
                    </div>

                    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
                        <!-- Widget --><a href="all.php">
                        <div class="card flex-row align-items-center p-3 p-md-4">
                            <div class="icon icon-lg bg-soft-secondary rounded-circle mr-3">
                                <i class="gd-wallet icon-text d-inline-block text-secondary"></i>
                            </div>
                            <div>
                                <h4 class="lh-1 mb-1">
                                <?php
$query = "SELECT count(farmer_id) As farmc FROM farmers";
$select_count = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($select_count)) {
    $count = $row['farmc'];
    echo $count; 
}
?>
                                </h4>
                                <h6 class="mb-0">Farmers</h6>
                            </div>
                            <i class="gd-arrow-down icon-text d-flex text-danger ml-auto"></i>
                        </div></a>
                        <!-- End Widget -->
                    </div>

                    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
                        <!-- Widget -->
                        <div class="card flex-row align-items-center p-3 p-md-4">
                            <div class="icon icon-lg bg-soft-warning rounded-circle mr-3">
                                <i class="gd-user icon-text d-inline-block text-warning"></i>
                            </div>
                            <div>
                                <h4 class="lh-1 mb-1">
                                <?php
$query = "SELECT count(sub_id) As subc FROM subscribers";
$select_count = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($select_count)) {
    $count = $row['subc'];
    echo $count; 
}
?>
                                </h4>
                                <h6 class="mb-0">Subscribers Users</h6>
                            </div>
                            <i class="gd-arrow-up icon-text d-flex text-success ml-auto"></i>
                        </div>
                        <!-- End Widget -->
                    </div>

                </div>
<?php include('includes/header.php') ?>



    <main class="main">
        <!-- Sidebar Nav -->
      <?php include('includes/sidebar.php'); ?>
        <!-- End Sidebar Nav -->

        <div class="content">
            <div class="py-4 px-3 px-md-4">

                <div class="mb-3 mb-md-4 d-flex justify-content-between">
                    <div class="h3 mb-0">All Farmers</div>
                </div>             
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3 mb-md-4">

                            <div class="card-body pt-0">
                                <div class="table-responsive-xl">
                                    <table class="table text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Farmer Name</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Email</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Phone</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 


$sql = "SELECT * FROM farmers ORDER BY farmer_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $farmer_id = $row["farmer_id"];
      $farmer_name = $row["farmer_name"];
      $farmer_email = $row["farmer_email"];
      $farmer_contact = $row["farmer_contact"];
     
  
?>


                                            <tr>
                                                <td class="py-3"><?php echo $farmer_id ?></td>
                                                <td class="py-3">
                                                    <div><?php echo $farmer_name ?></div>
                                                    
                                                </td>
                                                <td class="py-3"><?php echo $farmer_email ?></td>
                                                <td class="py-3"><?php echo $farmer_contact ?></td>
                                                <td class="py-3">
                                                    <a href="open.php" class="btn btn-outline-info">open products</a>
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
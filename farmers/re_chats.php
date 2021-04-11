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
                                <h5 class="font-weight-semi-bold mb-0">Recent Chats</h5>
                            </div>

                            <div class="card-body pt-0">
                                <div class="table-responsive-xl">
                                    <table class="table text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Customer Name</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Message</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Reply</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 


$sql = "SELECT * FROM chats ORDER BY chat_id DESC LIMIT 5";
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

                                            <tr>
                                                <td class="py-3"><?php echo $chat_id ?></td>
                                                <td class="py-3">
                                                    <div><?php echo $chat_name ?></div>
                                                    
                                                </td>
                                                <td class="py-3"><?php echo $chat_message ?></td>
                                                <form action="" method="post">
                                                <td class="py-3">
                                                   
                                                    <div class="form-group">
                                                    <textarea class="form-control" name="reply" id="" cols="15" rows="3"><?php echo $chat_reply ?></textarea>
                                                    
                                                    </div>
                                                   
                                                </td>

                                                <td class="py-3">
                                                <div class="form-group">
                                                        <button name="update" type="submit" class="form-control">Reply</button>
                                                    </div>
                                                </td>
                                                <td class="py-3"><?php echo $chat_date ?></td>
                                               
                                                </form>
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
<?php include('includes/header.php');?>

<?php 

$id =  $_GET['open'];
$sql = "SELECT * FROM orders
JOIN carts ON orders.cart_number = carts.cart_number 
JOIN products ON products.product_id =  carts.product_id WHERE order_id = $id ORDER BY order_id DESC";

// $sql = "SELECT * FROM orders  ORDER BY order_id DESC";

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

     $product_id = $row["product_id"];
     $product_name = $row["product_name"];
     $product_features = $row["product_features"];
     $product_prize = $row["product_prize"];
     $product_image = $row["product_image"];


    }
} else {
  echo "0 results";
}
 
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
                                <h5 class="font-weight-semi-bold mb-0"><?php echo $first_name; ?></h5>
                                <h5 class="font-weight-semi-bold mb-0"><?php echo $customer_email; ?></h5>
                            </div>

                            <div class="card-body pt-0">
                                <div class="table-responsive-xl">
                                    <table class="table text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Reference #</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Product Name</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Description</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Prize</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Farmer #</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">order Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>




                                            <tr>
                                                <td class="py-3"><?php echo $order_id ?></td>
                                                <td class="py-3">
                                                    <div><?php echo $cart_number ?></div>
                                                    
                                                </td>
                                                <td class="py-3"><?php echo $product_name ?></td>
                                                <td class="py-3"><?php echo $product_features ?></td>
                                                <td class="py-3"><?php echo $product_prize ?></td>
                                                <td class="py-3">  </td>
                                                <td class="py-3"><?php echo $order_date ?></td>    
                                            </tr>

                       

                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
<hr>
                            <div class="container">
                                <div class="row">

                                <form method="post" action="" class="form-inline">

<?php

if(isset($_POST['send'])){

    $message = $_POST['message'];
    $title = $_POST['title'];

    

// include phpmailer files
require 'phpmailer/PHPMailerAutoload.php';

// define name spaces 
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//create an instance of phpmailer
$mail= new PHPMailer();
//define smtp host
$mail->Host= "smtp.gmail.com";
//set port to connect smtp
$mail->Port="587";
//enable smtp aunthentication
$mail->SMTPAuth=true;
//set type of smtp encription
$mail->SMTPSecure ="tls";

//set mailer to use smtp
$mail->isSMTP();



//set gmail user
$mail->Username ="kwirychivende@gmail.com";
// set gamil password
$mail->Password = "11june2000";
//set email subject
$mail->Subject ="Message From Prepaid Farmers";
//set sender mail
$mail->setFrom("kwirychivende@gmail.com");
$mail->isHTML(true);
//set mail body
$mail->Body = "$message";
//add recipient
$mail->addAddress("$customer_email");
//finally sent asn email
$mail->Send();

echo "<p class='alert alert-success'>Email has been sent</p>";

}

?>


                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputPassword2" class="sr-only">Password</label>
                                    <textarea name="message"  class="form-control" placeholder="Enter Message" id="" cols="30" rows="10"></textarea>
                                    <!-- <input type="text" class="form-control" id="inputPassword2" placeholder="Enter Message"> -->
                                </div>
                                <button type="submit" name="send" class="btn btn-primary mb-2">Send an Email</button>
                                </form>

                                  
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>




        <?php include('includes/footer.php') ?>  
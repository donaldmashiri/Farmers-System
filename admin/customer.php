<?php include('includes/header.php') ?>



    <main class="main">
        <!-- Sidebar Nav -->
      <?php include('includes/sidebar.php'); ?>
        <!-- End Sidebar Nav -->

        <div class="content">
            <div class="py-4 px-3 px-md-4">

                <div class="mb-3 mb-md-4 d-flex justify-content-between">
                    <div class="h3 mb-0">Subscribed Customers</div>
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
                                                <th class="font-weight-semi-bold border-top-0 py-2">Email</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2">Subscribed Date</th>
                                                <th class="font-weight-semi-bold border-top-0 py-2"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 


$sql = "SELECT * FROM subscribers ORDER BY sub_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $sub_id = $row["sub_id"];
      $sub_email = $row["sub_email"];
      $sub_date = $row["sub_date"];
    //   $farmer_contact = $row["farmer_contact"];
     
  
?>


                                            <tr>
                                                <td class="py-3"><?php echo $sub_id ?></td>
                                                <td class="py-3">
                                                    <div><?php echo $sub_email ?></div>
                                                    
                                                </td>
                                                <td class="py-3"><?php echo $sub_date ?></td>
                                                <td class="py-3">
                                                <form method="post" action="" class="form-inline">

<?php

if(isset($_POST['send'])){

    $message = $_POST['message'];
    $semail = $_POST['semail'];

    

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
$mail->addAddress("$sub_email");
//finally sent asn email
$mail->Send();

echo "<p class='alert alert-success'>Email has been sent</p>";

}

?>


                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputPassword2" class="sr-only">Password</label>
                                    <textarea name="message"  class="form-control" placeholder="Enter Message" id="" cols="15" rows="5"></textarea>
                                    <input type="hidden" class="form-control" id="inputPassword2" value="<?php echo $sub_email ?>">
                                </div>
                                <button type="submit" name="send" class="btn btn-primary mb-2">Send an Email</button>
                                </form>

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
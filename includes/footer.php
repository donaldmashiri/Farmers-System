<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Products</h2>
          	<span>Get e-mail updates about our latest products and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" method="post" class="subscribe-form">

            <?php
        if(isset($_POST['sub'])){

        $sub_email = $_POST['sub_email'];


        $sql = "SELECT * FROM subscribers WHERE sub_email = '{$sub_email}' ";
		$result = $conn->query($sql);

		if ($result->num_rows >= 1) {
		  
      echo "<p class='alert alert-warning'>You are already a Subscriber</p>";

		}else{
      $sql = "INSERT INTO subscribers (sub_email, sub_date)
      VALUES ('{$sub_email}', now())";
      
      if ($conn->query($sql) === TRUE) {
      echo "<p class='alert alert-success text-center'>Thank you subscribing to us</p>";
      } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      } 
    }







        
       
    }
        ?>





              <div class="form-group d-flex">
                <input type="email" name="sub_email" class="form-control" placeholder="Enter email address">
                <input type="submit" name="sub" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


    <footer class="ftco-footer ftco-section">
      <div class="container">
   
      
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This project was developed by Lloyd Mangisi
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
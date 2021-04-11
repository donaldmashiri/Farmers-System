<?php include('includes/header.php') ?>

  <body class="">

    <main class="main">

      <div class="content">

			<div class="container-fluid pb-5">

				<div class="row justify-content-md-center">
					<div class="card-wrapper col-12 col-md-4 mt-5">
						<div class="brand text-center mb-3">
							<a href="/"><img src="public/img/logo.png"></a>
							<h2>Farmers</h2>
						</div>
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Create new account</h4>

								<?php 
									if(isset($_POST['register'])){
										$farmer_name = $_POST['farmer_name'];
										$farmer_email = $_POST['farmer_email'];
										$farmer_contact = $_POST['farmer_contact'];
										$farmer_password = $_POST['farmer_password'];
										$password_confirmation = $_POST['password_confirmation'];

										if($password_confirmation === $farmer_password){
												$sql = "INSERT INTO farmers (farmer_name, farmer_email, farmer_contact, farmer_password)
											VALUES ('{$farmer_name}', '{$farmer_email}', '{$farmer_contact}', '{$farmer_password}')";
											
											if ($conn->query($sql) === TRUE) {
											echo "<p class='alert alert-success text-center'>Account was successfully registered</p>";
											} else {
											echo "Error: " . $sql . "<br>" . $conn->error;
											}
										}else{
											echo "<p class='alert alert-danger text-center'>Password didnt Match</p>";
										}
									
									
										
										
									  }
									
								?>



<form action="" method="post">
			
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" name="farmer_name"  minLength="4" required>
			</div>

			<div class="form-group">
				<label for="email">E-Mail Address</label>
				<input id="email" type="email" class="form-control" name="farmer_email" minLength="4" required>
			</div>
			<div class="form-group">
				<label for="contact">Contact Number</label>
				<input id="contact" type="number" class="form-control" name="farmer_contact" minLength="4" required>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="password">Password
					</label>
					<input id="password" type="password" class="form-control" name="farmer_password" minLength="4" required>
				</div>
				<div class="form-group col-md-6">
					<label for="password-confirm">Confirm Password
					</label>
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" minLength="4" required>
				</div>
			</div>


			<div class="form-group no-margin">
				<button name="register" type="submit" class="btn btn-primary btn-block">
					Register
				</button>
			</div>
			<div class="text-center mt-3 small">
				Already have an account? <a href="index.php">Sign In</a>
			</div>
		</form>
							</div>
						</div>
						<footer class="footer mt-3">
							<div class="container-fluid">
								<div class="footer-content text-center small">
									<span class="text-muted">&copy; 2019 Graindashboard. All Rights Reserved.</span>
								</div>
							</div>
						</footer>
					</div>
				</div>



			</div>

      </div>
    </main>


	<script src="public/graindashboard/js/graindashboard.js"></script>
    <script src="public/graindashboard/js/graindashboard.vendor.js"></script>
    
  </body>
</html>